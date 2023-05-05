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
                                        class="fa fa-chevron-right"></i></a></span> <span>Products <i
                                    class="fa fa-chevron-right"></i></span></p>
                        <h2 class="mb-0 bread">Products</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="col-md-9">

                        <div style="display: flex;flex-wrap: wrap;margin-right: -150px">
                            <?php
                            $fetchaa = mysqli_query($con, "select * from tblart");
                            while ($r = mysqli_fetch_assoc($fetchaa)) {
                                $a = $r["id"];
                                // echo $a;
                                ?>
                                <div class="col-md-4 d-flex">
                                    <div class="product ftco-animate">
                                        <div class="img d-flex align-items-center justify-content-center"
                                             style="background-image:url(<?php echo "artist/" . $r["image"] ?>) ">
                                            <div class="desc">
                                                <p class="meta-prod d-flex">

                                                    <a href="addtocart.php?id=<?php echo $r['id'] ?>" class="d-flex align-items-center justify-content-center"><span class="flaticon-shopping-bag" name="cart"></span></a>
                                                    <a href="custgivefeedback.php?idgv=<?php echo $r['id'] ?>" class="d-flex align-items-center justify-content-center"><span class="flaticon-support" name="feedback"></span></a>
                                                    <a href="product-single.php?idps=<?php echo $r['id'] ?>" class="d-flex align-items-center justify-content-center"><span class="flaticon-visibility"></span></a>

                                                </p>

                                            </div>
                                        </div>
                                        <div class="text text-center">
                                            <!--<span class="sale"></span>-->
                                            <span class="category"></span>
                                            <h2><?php echo $r["name"] ?></h2>
                                            <!--<p class="mb-0"><span class="price price-sale"></span>--> 
                                            <span class="price">$<?php echo $r["price"] ?></span>
                                            <br>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <?php
                            }
                            ?>

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
        <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.13.1/js/bootstrap-select.min.js"></script>
        <script src="js/main.js"></script>

    </body>

</html>