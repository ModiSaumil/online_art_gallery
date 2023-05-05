<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<?php
include './connection.php';
?>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


        <form action="#" method="post">
            <h1>Log in</h1>
            <!--            <div class="social-container">
                            <a href=" https://www.facebook.com/" class="social"><i class="fab fa-facebook-f"></i></a>
                            <a href="https://www.google.com/" class="social"><i class="fab fa-google-plus-g"></i></a>
                            <a href="https://www.linkdin.com/" class="social"><i class="fab fa-linkedin-in"></i></a>
            
                        </div>-->
                        <!--<span>or use your account</span>-->
            <input type="email" required name="lmail" placeholder="Email" >
            <input type="password" required name="lpass" placeholder="Password" >
            <a href="forgotpass.php">Forgot your password?</a>
            <button name="btnln">Log In</button>

        </form>
        <?php
        $status = 0;
        $valid = 0;
        if (isset($_POST["btnln"])) {

            $lgmail = $_POST['lmail'];
            $lgpass = $_POST['lpass'];

            $sql = "select r.id, r.password, r.mode, rd.status from tblregistration r inner join tblartistdetails rd where r.email='$lgmail'";
//"select r.id, r.password, r.mode, rd.status from tblregistration r inner join tblartistdetails rd on rd.aid=r.id where r.email='$lgmail'"
            $lquery = mysqli_query($con, $sql);

//                print_r($sql);
//                exit();

            $lresult = mysqli_fetch_assoc($lquery);
            $c = $lresult['password'];
            $rol = $lresult['mode'];
            $as = $lresult['status'];
            //print_r($rol);
            //exit();
            $decp = password_verify($lgpass, $c);

            if ($decp) {

                $_SESSION["login"] = 1;
                $_SESSION["indexname"] = $lgmail;

                if (mysqli_num_rows($lquery)) {

                    if ($rol == "C") {
                        $_SESSION["role"] = "C";
                        header("Location:./index.php");
                    } else if ($rol == "A") {
                       
                        if ($as == "pendding") {
                            echo "<script>
                                alert('your request are not accepted please wait to accept a request!!!!');
                            </script>";
                        } else {
                            header("Location:./artist/artist_dashbord.php");
                        }
                    } else if ($rol == "a") {
                        header("Location:./admin/admin_dashbord.php");
                    } else {
                        $status = 1;
                    }
                }
            } else {
                $valid = 1;
            }
        }

        if ($status == 1) {
            echo "You are not eligible!!";
        } else {
            
        }

        if ($valid == 1) {
//                echo "Please enter valid username or password!!";
            ?>
            <script>
                alert("please enter valid username or password!!!");
            </script>
            <?php
        } else {
            
        }
        ?>


    </body>
</html>
