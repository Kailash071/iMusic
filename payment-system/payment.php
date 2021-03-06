<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>iMusic Payment</title>
    <link rel="stylesheet" href="./payment.css">
    <link rel="shortcut icon" href="../assets/logos/voice-chat.png" type="image/x-icon">
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
</head>

<body>
    <div class="container">
        <div class="content">
            <div class="heading"><span>GET YOUR PREMIUM</span></div>
            <div class="form">
                <form id="checkout-selection" action="pay.php?checkout=automatic" method="POST">
                    <div class="form-input">
                        <div>Amount</div>
                        <div><input type="text" value="<?php echo $_REQUEST['amount']?>" name="Pamount"  id="Pamount" readonly></div>
                    </div>
                    <div class="form-input">
                        <div>Name</div>
                        <div><input type="text" name="Uname" id="Uname" autofocus placeholder="Enter name"></div>
                    </div>
                    <div class="form-input">
                        <div>Email</div>
                        <div><input type="email" name="Uemail" id="Uemail" required placeholder="Enter valid e-mail to receive Invoice"></div>
                    </div>
                    <div class="form-input">
                        <div>Phone</div>
                        <div><input type="tel" name="Uphone"  id="Uphone" placeholder="Enter valid number to receive Invoice"></div>
                    </div>
                    <div class="form-input-btn">
                        <div><input type="submit" value="PAY" name="submit"></div>
                        <div><input type="reset" value="RESET" name="reset"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>
<script>
    const Uemail = document.querySelector('#Uemail')
    const Uphone = document.querySelector('#Uphone')

    const session_email = sessionStorage.getItem("sessionEmail")
    const session_phone = sessionStorage.getItem("sessionPhone")
  //  console.log(session_email)
   // console.log(session_phone)

    if(session_phone != null && session_email == null){
        Uphone.value = session_phone
        console.log(session_phone)
    }else if(session_email != null && session_phone == null){
        Uemail.value = session_email
        console.log(session_email)
    }
    else{
        Uemail.value = ""
        Uphone.value = ""
    }
</script>
<!-- <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
<script>
    jQuery(document).ready(function($) {
        // $('#submit').click(); 
        // var form = $('#checkout-selection');
        // var radio = $('input[name="checkout"]');
        // var choice = '';

        // radio.change(function(e) 
        // {
        //     choice = this.value;
        //     if (choice === 'automatic') 
        //     {
        //         form.attr('action', 'pay.php?checkout=automatic');
        //     } 
        //     else 
        //     {
        //         form.attr('action', 'pay.php?checkout=manual');
        //     }
        // });

    });
</script> -->