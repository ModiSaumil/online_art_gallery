<!DOCTYPE html>
<?php
session_start();
if (!($_SESSION["role"])) {
    header("location:mainrg.php");
}
?>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <title>OTP form</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
        <link rel="stylesheet" href="./enterotp.css">

    </head>

    <body>
        <!-- partial:index.partial.html -->
        <div class="forgotcontainer" id="forgotcontainer">
            <div class="form-forgot-container for-container">

                <form action="" method="POST">


                    <h1>OTP</h1>
                    <span>Enter OTP.</span>
                    <input name="text" type="text" placeholder="OTP" />


                    <button name="submit">Submit</button>
                    <?php
                    if (isset($_POST['submit'])) {
                        $check = $_POST['text'];
                        if ($check == $_SESSION['otp']) {
                            echo "success";
                            if ($_SESSION["role"] == "Artist") {
                                header("location:artist_resume.php");
                            } else {
                                header("Location:mainrg.php");
                            }
                        } else {
                            echo 'wrong otp';
                        }
                    }
                    ?>
                </form>

            </div>

        </div>

        <footer>
    <!--        <p>
                Created with <i class="fa fa-heart"></i>
            </p>-->
        </footer>
        <!-- partial -->
        <script src="./script.js"></script>

    </body>

</html>