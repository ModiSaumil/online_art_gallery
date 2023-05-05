<!DOCTYPE html>
<?php
ob_start();
include './connection.php';
session_start();
if (!($_SESSION["login"])) {
    header("location:./mainrg.php");
}
$total = 0;
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
                                        class="fa fa-chevron-right"></i></a></span> <span>Cart <i
                                    class="fa fa-chevron-right"></i></span></p>
                        <h2 class="mb-0 bread">My Cart</h2>
                    </div>
                </div>
            </div>
        </section>

        <section class="ftco-section">
            <div class="container">
                <div class="row">
                    <div class="table-wrap">
                        <table class="table">
                            <thead class="thead-primary">
                                <tr>

                                    <th>Product</th>
                                    <th>&nbsp;</th>

                                    <th>Price</th>
<!--                                    <th>Quantity</th>
                                    <th>total</th>-->
                                    <th>&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="alert" role="alert">
                                    <?php
                                    $select = mysqli_query($con, "select id from tblregistration where email='" . $_SESSION['indexname'] . "'");
                                    $re = mysqli_fetch_assoc($select);
                                    $sql = mysqli_query($con, "select id,aid from tblcart where cid='" . $re['id'] . "'");

                                    if (mysqli_num_rows($sql) == 0) {
                                        echo '<h2><CENTER>YOUR CART IS EMPTY</CENTER></h2>';
                                    }

                                    while ($row = mysqli_fetch_assoc($sql)) {
                                        $qu = mysqli_query($con, "select * from tblart where id='" . $row['aid'] . "'");
                                        $fet = mysqli_fetch_assoc($qu);
                                        ?>

                                        <td>
                                            <div class="img"><img class="img-fluid" src="./artist/<?php echo $fet['image']; ?>" alt=""></div>
                                        </td>
                                        <td>
                                            <div class="email">
                                                <span><?php echo $fet['name'] ?></span>
                                                <span><?php echo $fet['details'] ?></span>
                                            </div>
                                        </td>

                                        <td><?php echo $fet['price'] ?></td>
                                        <td>
                                            <?php echo " <a href='./deleterecord.php?cartaid=" . $row['aid'] . "&cartciid=" . $row['id'] . "' data-toggle='tooltip' data-placement='top' title='Close' name='close'><i class='fa fa-close color-danger'></i> </a>" ?>

            <!--                                        <a href="deleterecord.php?cartdid="<?php // echo $row['aid']    ?>" data-toggle="tooltip" data-placement="top" title="Close" name="close"><i class="fa fa-close color-danger"></i></a>-->
                                            <!--                                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                                                        <span aria-hidden="true"><i class="fa fa-close"></i></span>
                                                                                    </button>-->
                                        </td>
                                    </tr>
                                    <?php
                                    $total = $total + $fet['price'];
                                }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
                <div class="row justify-content-end">
                    <div class="col col-lg-5 col-md-6 mt-5 cart-wrap ftco-animate">
                        <div class="cart-total mb-3">
                            <h3>Cart Totals</h3>

                            <p class="d-flex total-price">
                                <span>Total</span>
                                <span><?php echo $total ?></span>
                                <?php
                                $_SESSION['Total']=$total;
                                ?>
                                
                            </p>
                        </div>
                        <form action="checkout.php" method="post">
                            <!--./PaytmKit/pgRedirect.php-->
                            <!--<p class="text-center"><a href="checkout.php" class="btn btn-primary py-3 px-4">Proceed to Checkout</a></p>-->
                            <input type="submit" name="submit" value="submit">
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php
//        if(isset($_POST['submit'])) {
//            header("location:checkout.php");
//        }
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

    </body>

</html>
<?php
ob_end_flush();
?>