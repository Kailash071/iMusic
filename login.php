<!-- <?php session_start(); ?> -->

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="./assets/logos/voice-chat.png" type="image/x-icon">
    <link rel="stylesheet" href="login.css">
    <title>Login</title>
</head>

<body>
    <div class="container">
        <div class="nav">
            <div class="logo">
                <img src="./assets//logos/voice-chat.png" alt="logo not found">
                <span>iMusic</span>
            </div>
            <div class="btn">
                <button class="registerBtn" name="registerBtn" id="registerBtn"><a href="./register.php">Register</a></button>
            </div>
        </div>
        <div class="form" id="formDiv">
            <form method="post" id="loginForm">
                <div class="formCard">
                    <div class="form-label">
                        <span>Login to iMusic</span>
                    </div>
                    <div class="login-option-google" id="login-option-google">
                        <img src="./assets/logos/icons8-google-24.png" alt="not found">
                        <span>CONTINUE WITH GOOGLE</span>
                    </div>
                    <div class="login-option-phone" id="login-option-phone">
                        <span> CONTINUE WITH PHONE NUMBER</span>
                    </div>
                    <div class="blank">
                        <hr>OR
                        <hr>
                    </div>
                    <div class="form-controls">
                        <label for="email">Enter your email</label>
                        <input type="email" name="email" id="email" placeholder="Email" autofocus required>
                    </div>
                    <div class="form-controls">
                        <label for="password">Enter your password</label>
                        <input type="password" name="password" id="password" placeholder="Password" required>
                        <div class="forgetPassword" id="forgetPassword">
                            <a class="passwordLink" id="passwordLink" title="Enter valid registered email id first then click here">Forget Password</a>
                        </div>
                    </div>

                    <div class="form-submit">
                        <input type="submit" value="Login" name="login" id="login">
                    </div>

                    <div class="messageCardSuccess" id="messageCardSuccess">
                        <div class="card">
                            <img src="./assets/logos/checked.png" alt="not found">
                            <!-- 128px -->
                            <span class="successMessage" id="successMessage">Error message here</span>
                        </div>
                    </div>
                    <div class="messageCardLoading" id="messageCardLoading">
                        <div class="card">
                            <img src="./assets/logos/icons8-loading-circle-bgr.gif" alt="not found">
                            <!-- 128px -->
                        </div>
                    </div>
                    <div class="messageCardError" id="messageCardError">
                        <div class="card">
                            <img src="./assets/logos/warning (2).png" alt="not found">
                            <!-- 128px -->
                            <span class="errorMessage" id="errorMessage">Error message here</span>
                        </div>
                    </div>
                    <!-- <div class="messageCardFailure" id="messageCardFailure">
                        <div class="card">
                            <img src="../assets/logos/cancel (2).png" alt="not found">
                        </div>
                    </div> -->
            </form>
        </div>
    </div>
    </div>

    <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-auth.js"></script>
    <script src="./firebase/firebaseSetting.js"></script>
    <script src="./login.js"></script>
</body>

</html>
<!-- <?php
        if (isset($_POST["login"])) {
            $sessionEmail = $_POST["sessionEmail"];
            $_SESSION["user-email"] = $sessionEmail;
            print_r($_SESSION["user-email"]);
        }
        ?>

 <?php
    if ($_SESSION["user-email"] != null) {
        header("Location:http://localhost/iMusic/home.php");
    }
    ?>  -->