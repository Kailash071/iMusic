<?php
require('../phpDatabase/database.php');
require('config.php');

session_start();

require('razorpay-php/Razorpay.php');

use Razorpay\Api\Api;
use Razorpay\Api\Errors\SignatureVerificationError;

$success = true;

$error = "Payment Failed";

if (empty($_POST['razorpay_payment_id']) === false) {
    $api = new Api($keyId, $keySecret);

    try {
        // Please note that the razorpay order ID must
        // come from a trusted source (session here, but
        // could be database or something else)
        $attributes = array(
            'razorpay_order_id' => $_SESSION['razorpay_order_id'],
            'razorpay_payment_id' => $_POST['razorpay_payment_id'],
            'razorpay_signature' => $_POST['razorpay_signature']
        );

        $api->utility->verifyPaymentSignature($attributes);
    } catch (SignatureVerificationError $e) {
        $success = false;
        $error = 'Razorpay Error : ' . $e->getMessage();
    }
}

if ($success === true) {
    $html = "<p>Your payment was successful</p>
             <p>Payment ID: {$_POST['razorpay_payment_id']}</p>
             <a href='../home.php'><button>Back to Home</button></a>
             ";
    // $_SESSION["premiumAcc"] = $_POST['razorpay_payment_id'];

} else {
    $html = "<p>Your payment failed</p>
             <p>{$error}</p>";
}

echo $html;
?>

<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-app.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-firestore.js"></script>
<script src="https://www.gstatic.com/firebasejs/7.21.0/firebase-auth.js"></script>
<script src="../firebase/firebaseSetting.js"></script>
<script>
    const auth = firebase.auth()
    const database = firebase.firestore()

    const premiumaccounts = () => {
        const email = <?php echo json_encode($_SESSION["Uemail"]) ?>;
        const phone = <?php echo json_encode($_SESSION["Uphone"]) ?>;
        const paymentId = <?php echo json_encode($_POST['razorpay_payment_id']) ?>;

        let currentDate = new Date()
        let cDay = currentDate.getDate()
        let cMonth = currentDate.getMonth() + 1
        let cYear = currentDate.getFullYear()
        const cDate = cDay + "-" + cMonth + "-" + cYear

        const usersCollection = database.collection("premiumAccounts")
        const ID = usersCollection
            .add({
                email: email,
                phone: phone,
                paymentId: paymentId,
                createdAt: cDate,
            })
            .then(() => {
                console.log("account is set to premium.")
            })
            .catch((error) => {
                console.error(error)
            })
    }
    premiumaccounts()
</script>



<!-- <?php
        $uemail = $_SESSION["Uemail"];
        $uphone = $_SESSION["Uphone"];
        $paymentId = $_POST['razorpay_payment_id'];
        $sql = "INSERT INTO `premiumaccounts` (email,phone,paymentId) VALUES ('$uemail','$uphone','$paymentId')";
        if (mysqli_query($conn, $sql)) {
            echo '<script>alert("Premium Paid");</script>';
        } else {
            echo '<script>alert("Something Went Wrong....!");</script>';
        }
        ?> -->