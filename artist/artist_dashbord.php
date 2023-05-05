<!DOCTYPE html>
<?php
ob_start();
include '../connection.php';

session_start();
if(!($_SESSION["login"]))
{
    header("location:../mainrg.php");
}

?>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width,initial-scale=1">
        <title>Artist Dashboard </title>
        <link rel="icon" type="image/png" sizes="16x16" href="./images/favicon.png">
        <link href="./vendor/pg-calendar/css/pignose.calendar.min.css" rel="stylesheet">
        <link href="./vendor/chartist/css/chartist.min.css" rel="stylesheet">
        <link href="./css/style.css" rel="stylesheet">

    </head>

    <body>
        <!--Main wrapper start-->
        <div id="main-wrapper">

            <!--Nav header start-->
            <div class="nav-header">
                <a href="artist_dashbord.php" class="brand-logo">
                    <img class="logo-abbr" src="./images/logo.png" alt="">
                    <img class="logo-compact" src="./images/logo-text.png" alt="">
                    <img class="brand-title" src="./images/logo-text.png" alt="">
                </a>

                <div class="nav-control">
                    <div class="hamburger">
                        <span class="line"></span><span class="line"></span><span class="line"></span>
                    </div>
                </div>
            </div>
            <!--Nav header end-->

            <!--Header start-->
            <div class="header">
                <div class="header-content">
                    <nav class="navbar navbar-expand">
                        <div class="collapse navbar-collapse justify-content-between">
                            <div class="header-left">

                            </div>
                            <ul class="navbar-nav header-right">
                                <li class="nav-item dropdown header-profile">
                                    <a class="nav-link" href="#" role="button" data-toggle="dropdown">
                                        <i class="mdi mdi-account"></i>
                                    </a>
                                    <div class="dropdown-menu dropdown-menu-right">
                                        <a href="profile.php" class="dropdown-item">
                                            <i class="icon-user"></i>
                                            <span class="ml-2">Profile </span>
                                        </a>
                                        <a href="logout.php" class="dropdown-item">
                                            <i class="icon-key"></i>
                                            <span class="ml-2">Logout </span>
                                        </a>
                                        <a href="../resetpass.php" class="dropdown-item">
                                            <i class="icon-key"></i>
                                            <span class="ml-2">Change Password </span>
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </nav>
                </div>
            </div>
            <!--Header end ti-comment-alt-->

            <!--Sidebar start-->
            <div class="quixnav">
                <div class="quixnav-scroll">
                    <ul class="metismenu" id="menu">
                        <li class="nav-label first">Main Menu</li>
                        <li><a href="artist_dashbord.php">
                                <i class="icon icon-home"></i>
                                <span class="nav-text" name="shome">Home</span>
                            </a>
                        </li>
                        <li><a href="artist_art.php">
                                <i class="icon icon-single-04"></i>
                                <span class="nav-text" name="sarts">Manage Arts</span>
                            </a>
                        </li>
                        <li><a href="artist_customerdetails.php">
                                <i class="icon icon-layout-25"></i>
                                <span class="nav-text" name="scust">Manage Customer </span>
                            </a>
                        </li>
                        <li><a href="artist_viewfeedback.php">
                                <i class="icon icon-form"></i>
                                <span class="nav-text" name="svfeed">View Feedbacks</span>
                            </a>
                        </li>
                        <li><a href="artist_givefeedback.php">
                                <i class="icon icon-layout-25"></i>
                                <span class="nav-text" name="sgfeed">Give Feedbacks</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
            <!--Sidebar end-->

            <!--Content body start-->
            <div class="content-body">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="stat-widget-one card-body">
                                    <div class="stat-icon d-inline-block">
                                        <i class="ti-money text-success border-success"></i>
                                    </div>
                                    <div class="stat-content d-inline-block">
                                        <a href="artist_art.php">
                                        <div class="stat-text">Total Arts</div>
                                         <?php 
//                                         $sel = "select r.fname,r.lname,a.* from tblregistration r inner join tblart a on r.id=a.aid where r.email='".$_SESSION['indexname']."'";
                                           $sel= mysqli_query($con,"select * from tblregistration where email='".$_SESSION["indexname"]."'");
                                           $a=mysqli_fetch_assoc($sel);
                                               if( $queryart= mysqli_query($con,"select * from tblart where aid='".$a["id"]."'"));
                                                $cnt= mysqli_num_rows($queryart);
                                                echo "<div class='stat-digit'>".$cnt."</div>";
                                            ?>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="stat-widget-one card-body">
                                    <div class="stat-icon d-inline-block">
                                        <i class="ti-user text-primary border-primary"></i>
                                    </div>
                                    <div class="stat-content d-inline-block">
                                        <div class="stat-text">Customer</div>
                                        <?php 
                                               if( $querycut= mysqli_query($con,"select * from tblregistration where mode='C'"));
                                                $ccnt= mysqli_num_rows($querycut);
                                                echo "<div class='stat-digit'>".$ccnt."</div>";
                                            ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                       
                        <div class="col-lg-3 col-sm-6">
                            <div class="card">
                                <div class="stat-widget-one card-body">
                                    <div class="stat-icon d-inline-block">
                                        <i class="ti-link text-danger border-danger"></i>
                                    </div>
                                    <div class="stat-content d-inline-block">
                                        <div class="stat-text">Feedback</div>
                                        <?php 
                                               if( $queryart= mysqli_query($con,"select * from tblcustomerartfeedback"));
                                                $cnt= mysqli_num_rows($queryart);
                                                echo "<div class='stat-digit'>".$cnt."</div>";
                                            ?>                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--calender-->
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="card">
                                <div class="card-body">
                                    <div class="year-calendar">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--calender end-->
                </div>
            </div>
        </div>

        <!--Content body end-->
    </div>
    <!--Main wrapper end-->

    <!--**********************************
        Scripts
    ***********************************-->
    <!-- Required vendors -->
    <script src="./vendor/global/global.min.js"></script>
    <script src="./js/quixnav-init.js"></script>
    <script src="./js/custom.min.js"></script>

    <script src="./vendor/chartist/js/chartist.min.js"></script>

    <script src="./vendor/moment/moment.min.js"></script>
    <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


    <script src="./js/dashboard/dashboard-2.js"></script>
    <!-- Circle progress -->

</body>

</html>
<?php
                                    ob_flush();
?>