<?php include("./upload.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Upload Music</title>
    <link rel="stylesheet" href="./uploadMusic.css">
</head>

<body>
    <div class="container">
        <form method="post" enctype="multipart/form-data" id="uploadMusicForm">
            <div class="formContent">
                <div class="form-label">
                    <h1>iMusic - Admin Control</h1>
                    <span>Upload Music</span>
                </div>
                <div class="form-controls">
                    <label for="Title">Song Title</label>
                    <input type="text" name="title" id="title">
                </div>
                <div class="form-controls">
                    <label for="artistsName">Artist Name</label>
                    <input type="text" name="artistName" id="artistName">
                </div>
                <div class="form-controls">
                    <label for="genre">Genre</label>
                    <input type="text" name="genre" id="genre">
                </div>
                <div class="form-controls">
                    <label for="file">Song File</label>
                    <input type="file" name="fileToUpload" id="fileToUpload">
                </div>
                <div class="form-buttons">
                    <input type="submit" value="Upload" name="upload" id="upload">
                    <button name="reset" id="reset">Reset</button>
                </div>
            </div>
        </form>
    </div>
    <!-- <script src="./uploadMusic.js"></script> -->
</body>
</html>
    <!-- <div class="messageCardSuccess" id="messageCardSuccess">
                <div class="card">
                    <img src="../assets/logos/checked.png" alt="not found">
                </div>
            </div>
            <div class="messageCardFailure" id="messageCardFailure">
                <div class="card">
                    <img src="../assets/logos/cancel (2).png" alt="not found">
                </div>
            </div>
            <div class="messageCardError" id="messageCardError">
                <div class="card">
                    <img src="../assets/logos/warning (2).png" alt="not found">
                </div>
            </div> -->