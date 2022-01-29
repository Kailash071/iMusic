<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/logos/voice-chat.png" type="image/x-icon">
    <!-- <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css" integrity="sha384-B4dIYHKNBt8Bc12p+WXckhzcICo0wtJAoU8YZTY5qE0Id1GSseTk6S+L3BlXeVIU" crossorigin="anonymous"> -->
    <link rel="stylesheet" href="register.css">
    <title>Register</title>
</head>

<body>
    <div class="container">
        <div class="nav">
            <div class="logo">
                <img src="./assets//logos/voice-chat.png" alt="logo not found">
                <span>iMusic</span>
            </div>
            <div class="btn">
                <button class="loginBtn" name="loginBtn" id="loginBtn"><a href="./login.php">Login</a></button>
            </div>
        </div>
        <div class="form">
            <form method="post" id="registerForm">
                <div class="formCard">
                    <div class="form-label">
                        <span>Register for free to start listening.</span>
                    </div>
                    <div class="form-controls">
                        <label for="name">Enter your name</label>
                        <input type="text" name="name" id="name" placeholder="Name" autofocus>

                    </div>

                    <div class="form-controls">
                        <label for="email">Enter valid email</label>
                        <input type="email" name="email" id="email" placeholder="Email" required>
                        <span><a href="./registerWithPhone.php">Use phone number instead</a></span>
                    </div>
                    <div class="form-controls">
                        <label for="password">Create a password</label>
                        <input type="password" name="password" id="password" placeholder="Password">
                    </div>
                    <!-- <div class="form-controls">
                        <label for="conf-password">Confirm your password</label>
                        <input type="password" name="conf-password" id="conf-password" placeholder="Confirm Password">
                    </div> -->
                    <div class="form-controls">
                        <label for="dob">What's your date of birth?</label>
                        <div class="date" id="date">
                            <div class="day">
                                <label for="day">Day</label>
                                <input type="text" name="day" id="day" placeholder="Day-DD">
                            </div>
                            <div class="month">
                                <label for="month">Month</label>
                                <select name="month" id="month">
                                    <option selected="" disabled="" value="">Month</option>
                                    <option value="01">January</option>
                                    <option value="02">February</option>
                                    <option value="03">March</option>
                                    <option value="04">April</option>
                                    <option value="05">May</option>
                                    <option value="06">June</option>
                                    <option value="07">July</option>
                                    <option value="08">August</option>
                                    <option value="09">September</option>
                                    <option value="10">October</option>
                                    <option value="11">November</option>
                                    <option value="12">December</option>
                                </select>
                            </div>
                            <div class="year">
                                <label for="year">Year</label>
                                <input type="text" name="year" id="year" placeholder="Year-YYYY">
                            </div>
                        </div>
                    </div>
                    <div class="form-submit">
                        <input type="submit" value="Register" name="register" id="register">

                    </div>

            </form>
        </div>
    </div>
    
    <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-auth.js"></script>
    <script src="./firebase/firebaseSetting.js"></script>
    <script src="./register.js"></script>
</body>
</html>
  <!-- <?php
if (isset($_POST["register"])) {
    $name = $_POST["name"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $day = $_POST["day"];
    $month = $_POST["month"];
    $year = $_POST["year"];
    $dob = $day . "-" . $month . "-" . $year;

    $sqlCheck = "SELECT * from `usersWemail` WHERE email='$email'";
    $query = mysqli_query($conn,$sqlCheck);
    if(mysqli_num_rows($query)>0){
        echo "<script >alert('already');</script>";
    } else {
        $sql = "INSERT INTO `usersWemail` (name,email,password,dob) VALUES('$name','$email','$password','$dob')";

        if (mysqli_query($conn, $sql)) {
            header("Location:http://localhost/iMusic/login.php");
        } else {
            echo "<script >alert('Message Sent..');</script>";
        }
        
    }
}
?> -->