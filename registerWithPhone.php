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
                <img src="./assets/logos/voice-chat.png" alt="logo not found">
                <span>iMusic</span>
            </div>
            <div class="btn">
                <button class="loginBtn" name="loginBtn" id="loginBtn"><a href="./login.php">Login</a></button>
            </div>
        </div>
        <div class="form">
            <form method="post" id="registerPhoneForm">
                <div class="formCard">
                    <div class="form-label">
                        <span>Register for free to start listening.</span>
                    </div>
                    <div class="form-controls">
                        <label for="name">Enter your name</label>
                        <input type="text" name="name" id="name" placeholder="Name" autofocus>

                    </div>

                    <div class="num-form-controls">
                        <div class="label"> <label for="phone">Enter Valid number</label>
                        </div>
                        <div class="phone">
                            <div class="phoneCode">
                                <select name="code" id="phoneCode" class="code">
                                    <option value="+20" lable="EG">+20</option>
                                    <option value="+212" lable="MA">+212</option>
                                    <option value="+213" lable="DZ">+213</option>
                                    <option value="+233" lable="GH">+233</option>
                                    <option value="+234" lable="NG">+234</option>
                                    <option value="+254" lable="KE">+254</option>
                                    <option value="+255" lable="TZ">+255</option>
                                    <option value="+256" lable="UG">+256</option>
                                    <option value="+27" lable="ZA">+27</option>
                                    <option value="+51" lable="PE">+51</option>
                                    <option value="+52" lable="MX">+52</option>
                                    <option value="+54" lable="AR">+54</option>
                                    <option value="+55" lable="BR">+55</option>
                                    <option value="+56" lable="CL">+56</option>
                                    <option value="+57" lable="CO">+57</option>
                                    <option value="+593" lable="EC">+593</option>
                                    <option value="+62" lable="ID">+62</option>
                                    <option value="+66" lable="TH">+66</option>
                                    <option value="+84" lable="VN">+84</option>
                                    <option value="+852" lable="HK">+852</option>
                                    <option value="+91" lable="IN" selected="selected">+91</option>
                                    <option value="+966" lable="SA">+966</option>
                                    <option value="+971" lable="AE">+971</option>
                                </select>
                            </div>
                            <div class="number">
                                <input type="tel" name="phoneNumber" id="phoneNumber" placeholder="Phone number" required>
                            </div>
                        </div>
                    </div>
                    <div class="form-controls-captcha-code">
                        <div id="recaptcha-container"></div>
                        <button name="getCode" id="getCode">Get Code</button>
                    </div>


                    <div class="form-controls">
                        <input type="tel" name="otp" id="otp" autocomplete="off" placeholder="6-digit code">
                    </div>

                    <div class="form-submit-phone">
                        <input type="submit" value="Register" name="RegisterNumber" id="registerNumber">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-firestore.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-auth.js"></script>
    <script src="./firebase/firebaseSetting.js"></script>
    <script src="./registerWithPhone.js"></script>
</body>

</html>