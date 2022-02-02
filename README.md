# iMusic
`iMusic` a web music application with firebase authentication like Google,email and Phone number (otp and recaptcha) which plays music via javascript fetching music data from mysqli server .

# add config.php file to `payment-system` folder and adS below code to it.

<?php
$keyId = '<your razorpay api key>';
$keySecret = '<your razorpay secret key>';
$displayCurrency = 'INR';

//These should be commented out in production
// This is for error reporting
// Add it to config.php to report any errors
error_reporting(E_ALL);
ini_set('display_errors', 1);
?>
