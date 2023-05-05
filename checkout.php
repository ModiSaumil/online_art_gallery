<!DOCTYPE html>
<?php
include './connection.php';
session_start();
ob_start();
if (!isset($_SESSION['indexname'])) {
    header('location:index.php');
}
if (!($_SESSION["Total"])) {
    header("location:./cart.php");
}
?>

<?php
$paypalUrl = 'https://www.sandbox.paypal.com/cgi-bin/webscr';
$paypalId = 'kvs3944-facilitator@gmail.com';
?>
<html lang="en">

    <head>
        <title>Art Gallery</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <link href="https://fonts.googleapis.com/css2?family=Spectral:ital,wght@0,200;0,300;0,400;0,500;0,700;0,800;1,200;1,300;1,400;1,500;1,700&display=swap" rel="stylesheet">

        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">

        <link rel="stylesheet" href="css/animate.css">

        <link rel="stylesheet" href="css/owl.carousel.min.css">
        <link rel="stylesheet" href="css/owl.theme.default.min.css">
        <link rel="stylesheet" href="css/magnific-popup.css">

        <link rel="stylesheet" href="css/flaticon.css">
        <link rel="stylesheet" href="css/style.css">
    </head>

    <body>
        <?php
        include './header.php';
        ?>

        <nav class="navbar navbar-expand-lg navbar-dark ftco_navbar bg-dark ftco-navbar-light" id="ftco-navbar">
            <div class="container">
                <a class="navbar-brand" href="index.php">Art <span>gallery</span></a>


                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#ftco-nav"
                        aria-controls="ftco-nav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="oi oi-menu"></span> Menu
                </button>

                <div class="collapse navbar-collapse" id="ftco-nav">
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item active"><a href="index.php" class="nav-link">Home</a></li>
                        <li class="nav-item"><a href="about.php" class="nav-link">About</a></li>


                        <li class="nav-item"><a href="product.php" class="nav-link">Products</a></li>
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
                        <li class="nav-item"><a href="" class="nav-link"><i class="fa fa-search" aria-hidden="true"></i></a></li>

                        <li class="nav-item"><a href="cart.php" class="nav-link"><i class="fa fa-shopping-bag" aria-hidden="true"></i></a></li>

                    </ul>
                </div>
            </div>
        </nav>
        <!-- END nav -->
        <!-- END nav -->

        <section class="hero-wrap hero-wrap-2" style="background-image: url('images/bg_2.jpg');"
                 data-stellar-background-ratio="0.5">
            <div class="overlay"></div>
            <div class="container">
                <div class="row no-gutters slider-text align-items-end justify-content-center">
                    <div class="col-md-9 ftco-animate mb-5 text-center">
                        <p class="breadcrumbs mb-0"><span class="mr-2"><a href="index.html">Home <i
                                        class="fa fa-chevron-right"></i></a></span> <span>Checkout <i
                                    class="fa fa-chevron-right"></i></span></p>
                        <h2 class="mb-0 bread">Checkout</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 ftco-animate">
                        <form action="#" class="billing-form" method="post" >
                            <?php
                            $rgf = mysqli_query($con, "select * from tblregistration where email='" . $_SESSION['indexname'] . "'");
                            while ($frg = mysqli_fetch_assoc($rgf)) {
                                $cid = $frg["id"];
                                ?>
                                <h3 class="mb-4 billing-heading">Billing Details</h3>
                                <div class="row align-items-end">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="firstname">First Name</label>
                                            <input type="text" class="form-control" name="fname" placeholder="First name" value="<?php echo $frg["fname"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="lastname">Last Name</label>
                                            <input type="text" class="form-control" name="lname" placeholder="Last name" value="<?php echo $frg["lname"]; ?>">
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">Country</label>
                                            <input type="text" class="form-control" placeholder="country">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="country">State</label>
                                            <input type="text" class="form-control" placeholder="state">
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="streetaddress">Address</label>
                                            <input type="text" name="add" class="form-control" placeholder="Address" value="<?php echo $frg["address"]; ?>">
                                        </div>
                                    </div>

                                    <div class="w-100"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="towncity">City</label>
                                            <input type="text" class="form-control" name="city" placeholder="city" value="<?php echo $frg["cid"]; ?>">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="postcodezip">Pincode</label>
                                            <input type="text" class="form-control" name="pin" placeholder="pincode" value="<?php echo $frg["pincode"]; ?>">
                                        </div>
                                    </div>
                                    <div class="w-100"></div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="phone">Mobile number</label>
                                            <input type="text" class="form-control" name="mn" placeholder="Mobile number" value="<?php
                                            echo $frg["mobileNo"];
                                        }
                                        ?>">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="emailaddress">Email Address</label>
                                        <input type="text" class="form-control" name="mail" placeholder="<?php echo $_SESSION['indexname']; ?>">
                                    </div>
                                </div>
                                <div class="w-100"></div>

                            </div>
                            <!--                        </form> END -->



                            <div class="row mt-5 pt-3 d-flex">
                                <div class="col-md-6 d-flex">
                                    <div class="cart-detail cart-total p-3 p-md-4">
                                        <h3 class="billing-heading mb-4">Cart Total</h3>

                                        <p class="d-flex total-price">
                                            <span>Total</span>
                                            <span><?php echo $_SESSION["Total"]; ?></span>
                                        </p>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="cart-detail p-3 p-md-4">
                                        <h3 class="billing-heading mb-4">Payment Method</h3>
                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                    <label><input type="radio" name="pyment" class="mr-2" value="cod">Cash on delivery</label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <div class="col-md-12">
                                                <div class="radio">
                                                    <label><input type="radio" name="pyment" class="mr-2" value="onl"> Razorpay</label>
                                                </div>
                                            </div>
                                        </div>

<!--                                        <input type="hidden" name="business" value="<?php echo $paypalId; ?>">
                                        <input type="hidden" name="cmd" value="_xclick">
                                        <input type="hidden" name="item_name" value="It Solution Stuff">
                                        <input type="hidden" name="item_number" value="2">
                                        <input type="hidden" name="amount" value="20">
                                        <input type="hidden" name="no_shipping" value="1">
                                        <input type="hidden" name="currency_code" value="INR">
                                        <input type="hidden" name="cancel_return" value="http://demo.itsolutionstuff.com/paypal/cancel.php">
                                        <input type="hidden" name="return" value="http://demo.itsolutionstuff.com/paypal/success.php">  -->

                                      <?php  //include './paypalbutton.php';?>
                                        <!--<script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_IOiqAYi3gW84pT" async> </script>--> 
                                        <button name="but" class="btn btn-primary py-3 px-4">Place an order</button>
                                        <!--  <script src="https://checkout.razorpay.com/v1/payment-button.js" data-payment_button_id="pl_IOiAWlZq0rTz3U" async> </script>--> 
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div> <!-- .col-md-8 -->
                </div>
            </div>
        </section>
        <?php
        if (isset($_REQUEST['but'])) {
            $Date = date("d-m-y");
//            echo $Date;
            date_default_timezone_set("Asia/Kolkata");
            $Time = date("h:i:s");
//             echo $Time;

            mysqli_query($con, "insert into tblorder (cid,odate,time,amount,payment) values('$cid','$Date','$Time','" . $_SESSION['Total'] . "','" . $_POST['pyment'] . "')");
            $rgupdate = mysqli_query($con, "update tblregistration set fname='" . $_POST['fname'] . "',lname='" . $_POST['lname'] . "',moblieNo='" . $_POST['mn'] . "',address='" . $_POST["add"] . "',cid='" . $_POST['city'] . "',pincode='" . $_POST['pin'] . "' where email='" . $_SESSION['indexname'] . "'");

            $S = mysqli_query($con, "select * from tblorder where cid='$cid' and odate='$Date' and time='$Time'");
            $list = mysqli_fetch_assoc($S);
            $oid = $list['id'];
            $_SESSION['order_id'] = $oid;

            $sql = mysqli_query($con, "select * from tblcart");
            while ($row = mysqli_fetch_assoc($sql)) {
                $artprice= mysqli_query($con,"select price from tblart where id='".$row['aid']."'");
                $p=mysqli_fetch_assoc($artprice);
                $orderitem = mysqli_query($con, "insert into tblorderitem(oid,aid,price) values('$oid','" . $row['aid'] . "','" . $p["price"] . "')");
            }
            mysqli_query($con, "truncate table tblcart");

            if ($_POST["pyment"]=="onl") {
                header("location:https://rzp.io/l/9HFW98zS");
            }
            else{
                echo "order is conform";
                header("location:./index.php");
            }
//           header("location:../paytmkit/pgRedirect.php");
        }
        ?>
        <?php
        include 'footer.php';
        ?>

        <!--end footer-->


        <!-- loader -->
        <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10"
                    stroke="#F96D00" />
            </svg></div>


        <script src="js/jquery.min.js"></script>
        <script src="js/jquery-migrate-3.0.1.min.js"></script>
        <script src="js/popper.min.js"></script>
        <script src="js/bootstrap.min.js"></script>
        <script src="js/jquery.easing.1.3.js"></script>
        <script src="js/jquery.waypoints.min.js"></script>
        <script src="js/jquery.stellar.min.js"></script>
        <script src="js/owl.carousel.min.js"></script>
        <script src="js/jquery.magnific-popup.min.js"></script>
        <script src="js/jquery.animateNumber.min.js"></script>
        <script src="js/scrollax.min.js"></script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
        <script src="js/google-map.js"></script>
        <script src="js/main.js"></script>

    </body>
</html>
<?php
ob_end_flush();
?>