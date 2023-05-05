<?php
ob_start();
include './connection.php';
session_start();

if (!($_REQUEST['idgv'])) {
    header("location:./product.php");
}
//$_REQUEST['idgv']=6;
?>
<!DOCTYPE html>
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
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="dropdown04" data-toggle="dropdown"
                               aria-haspopup="true" aria-expanded="false">Products</a>
                            <div class="dropdown-menu" aria-labelledby="dropdown04">
                                <a class="dropdown-item" href="product.php">Products</a>
                                <!--<a class="dropdown-item" href="product-single.php">Single Product</a>-->
                                <a class="dropdown-item" href="cart.php">Cart</a>
                                <!--<a class="dropdown-item" href="checkout.php">Checkout</a>-->
                            </div>
                        </li>
                        <!--<li class="nav-item"><a href="blog.php" class="nav-link">Blog</a></li>-->
                        <li class="nav-item"><a href="contact.php" class="nav-link">Contact</a></li>
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
                                        class="fa fa-chevron-right"></i></a></span> <span><a href="product.html">Products <i
                                        class="fa fa-chevron-right"></i></a></span>Feedback<span><i
                                    class="fa fa-chevron-right"></i></span></p>
                        <h2 class="mb-0 bread">Comment</h2>
                    </div>
                </div>
            </div>
        </section>
   
        <section class="ftco-section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-10 ftco-animate">
                        <form action="#" class="billing-form" method="post">
                            <h3 class="mb-4 billing-heading">Give Feedback</h3>
                            <div class="row align-items-end">

                                <div class="w-100"></div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <!--<label for="Give Feedback">Give Feedback :-</label>-->
                                        <input type="text" class="form-control" placeholder="Enter your Feedback..." name="feedback">
                                    </div>
                                </div>
                       

                            </div>
                             <input type="submit" name="submit" value="submit">
                        </form><!-- END -->



<!--                        <p><a class="btn btn-primary py-3 px-5 mr-2" name="submit" value="submit">Submit</a></p>-->
                        <!--<input type="submit" name="submit" value="submit">-->
                        <!--<button name="sub">Submit</button>-->
                    </div>
                </div>
            </div>
        </div> <!-- .col-md-8 -->
    </div>
</div>
</section>
<?php
//if(isset($_POST["submit"])){

if(isset($_POST['submit'])) {
     $select= mysqli_query($con, "select id from tblregistration where email='".$_SESSION['indexname']."'");
    $re= mysqli_fetch_assoc($select);
   
    $insert= mysqli_query($con,"insert into tblcustomerartfeedback (cid,aid,comment) value ('".$re["id"]."','".$_REQUEST['idgv']."','".$_POST['feedback']."')");
     
    if (!($insert)) {
        echo " not Inserted";
        header("location:./custgivefeedback.php");
    } else {
        echo "inserted";
        header("location:./product.php");
    }

//    header("location:./cart.php"); 
}
// else {
//echo "<script> alert('page not working') </script>";

//}

?>
        

<?php
include 'footer.php';
?>


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
<script
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBVWaKrjvy3MaE7SQ74_uJiULgl1JY0H2s&sensor=false"></script>
<script src="js/google-map.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
<script src="js/main.js"></script>

<script>
                            $(document).ready(function () {

                                var quantitiy = 0;
                                $('.quantity-right-plus').click(function (e) {

                                    // Stop acting like a button
                                    e.preventDefault();
                                    // Get the field name
                                    var quantity = parseInt($('#quantity').val());

                                    // If is not undefined

                                    $('#quantity').val(quantity + 1);


                                    // Increment

                                });

                                $('.quantity-left-minus').click(function (e) {
                                    // Stop acting like a button
                                    e.preventDefault();
                                    // Get the field name
                                    var quantity = parseInt($('#quantity').val());

                                    // If is not undefined

                                    // Increment
                                    if (quantity > 0) {
                                        $('#quantity').val(quantity - 1);
                                    }
                                });

                            });
</script>

</body>

</html>
<?php
ob_end_flush();
?>