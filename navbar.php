<?php require('./phpDatabase/database.php');?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMusic</title>
    <link type="text/css" rel="stylesheet" href="magicscroll/magicscroll.css" />
    <script type="text/javascript" src="magicscroll/magicscroll.js"></script>

    <link rel="shortcut icon" href="./assets/logos/voice-chat.png" type="image/x-icon">
    <link rel="stylesheet" href="navbar.css">
    <link rel="stylesheet" href="home.css">
    <link rel="stylesheet" href="album.css">
    <link rel="stylesheet" href="genre.css">
    <link rel="stylesheet" href="artists.css">
    <link rel="stylesheet" href="footer.css">
    <link rel="stylesheet" href="playSongs.css">
    <link rel="stylesheet" href="premiumPlans.css">
</head>

<body>
    <div class="container">
        <div class="navbar">
            <div class="logo">
                <a href="./home.php"> <img src="./assets/logos/voice-chat.png" alt="logo not found"> <span>iMusic</span></a>
            </div>
            <div class="navLeft">
                <ul class="links">
                    <li class="link"><a href="./home.php">Home</a></li>
                    <li class="link"><a href="./album.php">Albums</a></li>
                    <li class="link"><a href="./genre.php">Genres</a></li>
                    <li class="link"><a href="./artists.php">Artists</a></li>
                    <li class="link"><a href="./playlists.php">PlayLists</a></li>
                </ul>
            </div>
            <div class="navRight">
                <!-- <div class="searchDiv">
                    <input type="searchBar" name="search" id="searchBar" placeholder="Search music">
                    <button name="searchBtn" id="searchBtn">Search</button>
                </div> -->
                <div class="premiumPlans" id="premiumPlans">
                    <button class="premiumBtn" id="premiumBtn">UPGRADE</button>
                </div>
                <div class="actionBtn" id="actionBtn">
                    <button class="loginBtn" name="loginBtn" id="loginBtn"><a href="./login.php">Login</a></button>
                    <button class="registerBtn" name="registerBtn" id="registerBtn"><a href="./register.php">Register</a></button>
                </div>
                <div class="userProfile" id="userProfile">
                    <img src="./assets/logos/icons8-username-48.png" alt="Profile logo not found">
                    <span>Hi, <a href="#" id="userName"></a></span>
                </div>
                <div class="logOutDiv" id="logOutDiv">
                    <button class="logOut" id="logOut">Log Out</button>
                </div>
            </div>
        </div>
        <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-firestore.js"></script>
        <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-auth.js"></script>
        <script src="./firebase/firebaseSetting.js"></script>
        <script src="./navbar.js"></script>



<!-- <?php
$sql = "SELECT * FROM `premiumaccounts`";
$accounts = array();
$result = mysqli_query($conn,$sql);
while($row = mysqli_fetch_assoc($result)){
    $accounts[] = $row;
}
foreach($accounts as $account){
    //if($account["email"] == )
}
?> -->
