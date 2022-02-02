<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>RazorPay</title>
    <link rel="stylesheet" href="./payment.css">
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
                        <div><input type="text" value="<?php echo $_REQUEST['amount']?>" name="Pamount" readonly></div>
                    </div>
                    <div class="form-input">
                        <div>Name</div>
                        <div><input type="text" name="Uname" autofocus placeholder="Enter name"></div>
                    </div>
                    <div class="form-input">
                        <div>Email</div>
                        <div><input type="email" name="Uemail" required placeholder="Enter valid e-mail to receive Invoice"></div>
                    </div>
                    <div class="form-input">
                        <div>Phone</div>
                        <div><input type="tel" name="Uphone" placeholder="Enter valid number to receive Invoice"></div>
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