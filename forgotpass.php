<!DOCTYPE html>
<?php
include './mail/function.php';
include './mail/smtp/PHPMailerAutoload.php';
include './mail/smtp/class.phpmailer.php';
include './connection.php';
session_start();
?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>Login/Registration form</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
        <link rel="stylesheet" href="./forgotstyle.css">

    </head>

    <body>
        <!-- partial:index.partial.html -->
        <div class="forgotcontainer" id="forgotcontainer">
            <div class="form-forgot-container for-container">

                <form action="#" method="POST">


                    <h1>Forgot Password</h1>
                    <span>Enter Register Email-id to get OTP.</span>
                    <input type="email" name="email" placeholder="Email" />


                    <button name="btnsubmit" value="submit">Send OTP</button>
                    <?php
                    if (isset($_POST['btnsubmit'])) {

//                        $email=$_POST['email'];
                        $to = $_POST['email'];
                        $subject = "Reset Password";
                        $otp = rand(1000, 9999);

                        $msg = "$otp";

                        $_SESSION['fmail'] = $to;
                        $_SESSION['otp'] = $msg;

                        $query = mysqli_query($con, "select * from tblregistration");
                        while ($fqu = mysqli_fetch_assoc($query)){
                        if (!($fqu["email"] == $to)) {
                            ?>
                            <script>
                                alert("please enter valid username or password!!!")
                            </script><?php
                        } else {
                            send_email($to, $msg, $subject);
                            header("location:enterotp.php");
                        }
                        }
                    }
                    ?>
                </form>
            </div>
        </div>

        <footer>
<!--            <p>
                Created with <i class="fa fa-heart"></i>
            </p>-->
        </footer>
        <!-- partial -->
        <script src="./script.js"></script>

    </body>

</html>