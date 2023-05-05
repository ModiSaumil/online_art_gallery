<!DOCTYPE html>
<?php
include './connection.php';
session_start();
ob_start();
?>
<?php
include './mail/function.php';
include './mail/smtp/PHPMailerAutoload.php';
include './mail/smtp/class.phpmailer.php';
?>
<html lang="en">

    <head>
        <meta charset="UTF-8" >
        <title>Login/Registration form</title>
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
        <link rel="stylesheet" href="./style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <!--<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>-->
    </head>

    <body>
        <div class="container" id="container">
            <div class="form-container sign-up-container">
                <form action="#" method="POST" name='form1' >
                    <h1>Create Account</h1>
                    <!--                    <div class="social-container">
                                            <a href="https://www.facebook.com/" class="social"><i class="fab fa-facebook-f"></i></a>
                                            <a href="https://www.google.com/" class="social"><i class="fab fa-google-plus-g"></i></a>
                                            <a href="https://www.linkdin.com/" class="social"><i class="fab fa-linkedin-in"></i></a>
                                        </div>-->
                                        <!--<span>or use your email for registration</span>-->

                    <input type="text" placeholder="First Name" pattern="[A-Za-z]+$" name="fname" size="30" required>
                    <input type="text" placeholder="Last Name" pattern="[A-Za-z]+$" name="lname" required >
                    <select name="gnderbtn" required>
                        <option>Select Gender</option>
                        <option value="M">Male</option>
                        <option value="F">Female</option>
                        <option value="O">Other</option>
                    </select>
                    <input type="tel" pattern="[6789][0-9]{9}" placeholder="Mobile number" name="mobileno" required/>
                    <textarea cols="36.5px" rows="3px" placeholder="Address" name="add" required></textarea>

                    <select id="country-dropdown">
                        <option value="">Select Country</option>
                        <?php
                        require_once "connection.php";
                        $result = mysqli_query($con, "SELECT * FROM tblcountry");
                        while ($row = mysqli_fetch_array($result)) {
                            ?>
                            <option value="<?php echo $row['id']; ?>"><?php echo $row["name"]; ?></option>
                            <?php
                        }
                        ?>
                    </select>
                    <select id="state-dropdown">
                    </select>
                    <select id="city-dropdown" name="city">
                    </select>

                    <script>
                        $(document).ready(function () {
                            $('#country-dropdown').on('change', function () {
                                var country_id = this.value;
                                $.ajax({
                                    url: "states-by-country.php",
                                    type: "POST",
                                    data: {
                                        country_id: country_id
                                    },
                                    cache: false,
                                    success: function (result) {
                                        $("#state-dropdown").html(result);
                                        $('#city-dropdown').html('<option value="">Select State First</option>');
                                    }
                                });
                            });
                            $('#state-dropdown').on('change', function () {
                                var state_id = this.value;
                                $.ajax({
                                    url: "cities-by-state.php",
                                    type: "POST",
                                    data: {
                                        state_id: state_id
                                    },
                                    cache: false,
                                    success: function (result) {
                                        $("#city-dropdown").html(result);
                                    }
                                });
                            });
                        });
                    </script>




                    <input type="text" pattern="[0-9]{6}"  placeholder="Pincode" name="pincode" required/>
                    <input type="email" placeholder="Email" name="mail" required/>

                    <input name="password" required type="password" id="psw" onChange="onChange()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="password"/>
                    <input name="confirm" required type="password" onChange="onChange()" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" placeholder="re-enter password"/> 

                    <div id="message">
                        <h5>Password must contain the following:</h5>
                        <p id="letter" class="invalid">A <b>lowercase</b> letter</p>
                        <p id="capital" class="invalid">A <b>capital (uppercase)</b> letter</p>
                        <p id="number" class="invalid">A <b>number</b></p>
                        <p id="length" class="invalid">Minimum <b>8 characters</b></p>
                    </div>

                    <script>
                        var myInput = document.getElementById("psw");
                        var letter = document.getElementById("letter");
                        var capital = document.getElementById("capital");
                        var number = document.getElementById("number");
                        var length = document.getElementById("length");

                        // When the user clicks on the password field, show the message box
                        myInput.onfocus = function () {
                            document.getElementById("message").style.display = "block";
                        }

                        // When the user clicks outside of the password field, hide the message box
                        myInput.onblur = function () {
                            document.getElementById("message").style.display = "none";
                        }

                        // When the user starts to type something inside the password field
                        myInput.onkeyup = function () {
                            // Validate lowercase letters
                            var lowerCaseLetters = /[a-z]/g;
                            if (myInput.value.match(lowerCaseLetters)) {
                                letter.classList.remove("invalid");
                                letter.classList.add("valid");
                            } else {
                                letter.classList.remove("valid");
                                letter.classList.add("invalid");
                            }

                            // Validate capital letters
                            var upperCaseLetters = /[A-Z]/g;
                            if (myInput.value.match(upperCaseLetters)) {
                                capital.classList.remove("invalid");
                                capital.classList.add("valid");

                            } else {
                                capital.classList.remove("valid");
                                capital.classList.add("invalid");
                            }

                            // Validate numbers
                            var numbers = /[0-9]/g;
                            if (myInput.value.match(numbers)) {
                                number.classList.remove("invalid");
                                number.classList.add("valid");
                            } else {
                                number.classList.remove("valid");
                                number.classList.add("invalid");
                            }

                            // Validate length
                            if (myInput.value.length >= 8) {
                                length.classList.remove("invalid");
                                length.classList.add("valid");
                            } else {
                                length.classList.remove("valid");
                                length.classList.add("invalid");
                            }
                        }
                    </script>

                    <select name="regtype" required>
                        <option>Select Registration type </option>
                        <option value="Artist">Artist</option>
                        <option value="Customer">Customer</option>

                    </select>


                    <button name="Register">Register</button>
                </form>
            </div>
            <div class="form-container sign-in-container">
                <?php
                include './login.php';
                ?>
            </div>

            <?php
            if (isset($_POST["Register"])) {
                $cityva = $_POST["district"];
                $_SESSION["role"] = $_POST["regtype"];
                $hash = password_hash($_POST['password'], PASSWORD_DEFAULT);

                $in = "INSERT INTO tblregistration(fname,lname,gender,mobileNo,address,cid,pincode,email,password,mode) VALUES ('" . $_POST['fname'] . "','" . $_POST['lname'] . "','" . $_POST['gnderbtn'] . "','" . $_POST['mobileno'] . "','" . $_POST['add'] . "','".$_POST['city']."','" . $_POST['pincode'] . "','" . $_POST['mail'] . "','" . $hash . "','" . $_POST['regtype'] . "')";
                $result = mysqli_query($con, $in);
                $_SESSION["mail"] = $_POST['mail'];

                if ($result) {
                    if (isset($_POST['Register'])) {

                        $to = $_POST['mail'];
                        $subject = "OTP";
                        $otp = rand(1000, 9999);

                        $msg = "$otp";

                        $_SESSION['otp'] = $msg;
                        send_email($to, $msg, $subject);

                        header("location:rgotp.php");
                    }
                } else {
                    echo "no inserted";
                }
            }
            ?>
            <div class="overlay-container">
                <a href="index.php"><span>Home</span></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="contact.php"><span>Contect us</span></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="about.php"><span>About us</span></a>
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a href="product.php"><span>Products</span></a>

                <div class="overlay">
                    <div class="overlay-panel overlay-left">
                        <h1>Welcome Back!</h1>
                        <p>To keep connected with us please login with your personal info</p>
                        <button class="ghost" id="signIn">Log In</button>
                    </div>
                    <div class="overlay-panel overlay-right">
                        <h1>Hello, Friend!</h1>
                        <p>Enter your personal details and start journey with us</p>
                        <button class="ghost" id="signUp">Sign up</button>
                    </div>
                </div>
            </div>
        </div>

        <script src="./script.js"></script>
        <script src="./checkpass.js"></script>  

    </body>

</html>
<?php
ob_flush();
?>