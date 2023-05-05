<!DOCTYPE html>
<?php
include './connection.php';
session_start();
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
                <a class="navbar-brand" href="index.php">Art <span>Gallery</span></a>
                

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
                                        class="fa fa-chevron-right"></i></a></span> <span>About us <i
                                    class="fa fa-chevron-right"></i></span></p>
                        <h2 class="mb-0 bread">About Us</h2>
                    </div>
                </div>
            </div>
        </section>



        <section class="ftco-section ftco-no-pb">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 img img-3 d-flex justify-content-center align-items-center"
                         style="background-image: url(images/bg_1.jpg);">
                    </div>
                    <div class="col-md-6 wrap-about pl-md-5 ftco-animate py-5">
                        <div class="heading-section">
                            <span class="subheading">Since 2001</span>
                            <h2 class="mb-4">Desire meets a new ART</h2>

                            <p>This system is made by Pankti Manavar and Saumil modi.</p>
                            <p>We made this system to give a huge opportunity to sell and grow their business online in ART.
                                Using this system they will get huge platform to sell their unique art among the huge customer circle.</p>
<!--                            <p class="year">
                                <strong class="number" data-number="2">0</strong>
                                <span>Years of Experience In Business</span>
                            </p>-->
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-counter ftco-section ftco-no-pt ftco-no-pb img bg-light" id="section-counter">
            <div class="container">
                <div class="row">
                    <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 py-4 mb-4">
                            <div class="text align-items-center">
                                <strong class="number" data-number="<?php if( $querycut= mysqli_query($con,"select * from tblregistration where mode='C'"));
                                                $ccnt= mysqli_num_rows($querycut);
                                                echo $ccnt;
                                ?>">0</strong>
                                <span>Our Satisfied Customers</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 py-4 mb-4">
                            <div class="text align-items-center">
                                <strong class="number" data-number="2">0</strong>
                                <span>Years of Experience</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 py-4 mb-4">
                            <div class="text align-items-center">
                                <strong class="number" data-number="<?php if( $qucount= mysqli_query($con,"select * from tblcategory"));
                                                $qcnt= mysqli_num_rows($qucount);
                                                echo $qcnt;
                                ?>">0</strong>
                                <span>Categories of ART'S</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6 col-lg-3 justify-content-center counter-wrap ftco-animate">
                        <div class="block-18 py-4 mb-4">
                            <div class="text align-items-center">
                                <strong class="number" data-number="<?php 
                                               if( $queryartist= mysqli_query($con,"select * from tblregistration where mode='A'"));
                                                $acnt= mysqli_num_rows($queryartist);
                                                echo $acnt;
                                            ?>">0</strong>
                                <span>Our satisfied Artists</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
       
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
        <script src="js/main.js"></script>

    </body>

</html>