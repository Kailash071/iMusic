<?php require("../phpDatabase/database.php"); ?>
<?php
error_reporting(E_ALL & ~E_WARNING & ~E_NOTICE);
define('KB', 1024);
define('MB', 1048576);
define('GB', 1073741824);
define('TB', 1099511627776);

$target_dir = "../uploadedMusics/";
// name in files(database table)- uploads/Screenshot (3).png
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$upload_ok = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

//check if image is a actual image or fake image
if (isset($_POST['upload'])) {
    $title = $_POST['title'];
    $artistName =$_POST['artistName'];
    $genre =$_POST['genre'];
    //To see below output of fileName go to ./readme folder 

    //  $fileName = $_FILES['fileToUpload']['tmp_name']; // name in files(database table)- C:xampp	mpphp509A.tmp // this doesn't work while downloading

    $fileName = $_FILES['fileToUpload']['name'];    // name in files(database table)- Screenshot (2).png 
    $fileSize = $_FILES['fileToUpload']['size'];

 //   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);

    //if you want to uplaod only image write below code.
    // if ($check !== false) {
    //     echo "File is an image-" . $check["mime"] . ".";
    //     $upload_ok = 1;
    // } else {
    //     echo "File is not an image";
    //     $upload_ok = 0;
    // }

    //check if file already exists.
    if (file_exists($target_file)) {
        echo '<script>alert("Sorry, file already exists.");</script>';
        $upload_ok = 0;
    }

    //check file size
    if ($_FILES["fileToUpload"]["size"] > 10 * MB) { //byte- 5000000 = 5mb,byte-5000000 = 5000kb,
        echo '<script>alert("Sorry, Your file is too large");</script>';
        $upload_ok = 0;
    }

    //allow certain file formats
    if ($imageFileType != "mp3" && $imageFileType != "mp4" && $imageFileType != "wav" ) {
        echo '<script>alert("Sorry, only MP3, MP4, WAV files are allowed.");</script>';
        $upload_ok = 0;
    }

    //check if $upload_ok is set to 0 by an error
    if ($upload_ok == 0) {
        echo '<script>alert("Sorry, Your file was not uploaded.");</script>';
       
    } else {
        //if everything is ok , try to upload file
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo '<script>alert("The file " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . "has been uploaded.");</script>';
            $sql = "INSERT INTO `musics` (title,genre,artistName,songFilePath) VALUES('$title','$genre','$artistName','$fileName')";

            if (mysqli_query($conn, $sql)) {
                echo '<script>alert("File Uploaded to database.");</script>';              
            } else {
               echo '<script>alert("File failed to upload in database");</script>';
            }
        } else {
           echo '<script>alert("Sorry, there was an error uploading your file.");</script>';
        }
    }
}
?>
<!-- <script src="./uploadMusic.js"></script> -->
<!-- <script>
    document.querySelector("#uploadMusicForm").addEventListener("submit", (e) => {
  e.preventDefault()
})
</script> -->
 <!-- echo '<script>
            // const messageCardError = document.querySelector("#messageCardError")          
            // messageCardError.style.display = "flex" 
            // setTimeout(()=>{
            //     window.location.reload()
            //   },2000) 
            // </script>'; -->
          