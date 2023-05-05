<!DOCTYPE html>
<?php
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
        <link href="./css/style.css" rel="stylesheet">

    </head>

    <body>


        <div id="main-wrapper">

            <div class="nav-header">
                <a href="admin_dashbord.php" class="brand-logo">
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
            <!--**********************************
                Nav header end
            ***********************************-->

            <!--**********************************
                Header start
            ***********************************-->
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
            <!--**********************************
                Header end ti-comment-alt
            ***********************************-->

            <!--**********************************
                Sidebar start
            ***********************************-->
           <!--Sidebar start-->
            <div class="quixnav">
                <div class="quixnav-scroll">
                    <ul class="metismenu" id="menu">
                        <li class="nav-label first">Main Menu</li>
                        <li><a href="./admin_dashbord.php">
                                <i class="icon icon-home"></i>
                                <span class="nav-text" name="shome">Home</span>
                            </a>
                        </li>
                        <li><a href="admin_artists.php">
                                <i class="icon icon-layout-25"></i>
                                <span class="nav-text" name="sgfeed">Manage Artists</span>
                            </a>
                        </li>
                        <li><a href="admin_arts.php">
                                <i class="icon icon-single-04"></i>
                                <span class="nav-text" name="sarts">Manage Arts</span>
                            </a>
                        </li>
                        <li><a href="admin_customerdetails.php">
                                <i class="icon icon-layout-25"></i>
                                <span class="nav-text" name="scust">Manage Customer </span>
                            </a>
                        </li>
                        <li><a href="admin_feedback.php">
                                <i class="icon icon-form"></i>
                                <span class="nav-text" name="svfeed">View Feedbacks</span>
                            </a>
                        </li>

                    </ul>
                </div>
            </div>
            <!--Sidebar end-->

            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                <div class="container-fluid">
                    <!-- row -->
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="profile">
                                <div class="profile-head">
                                    <div class="photo-content">
                                        <div class="cover-photo"></div>
                                        <div class="profile-photo">
                                            <img src="images/profile/profile.png" class="img-fluid rounded-circle" alt="">
                                        </div>
                                    </div>
                                    <div class="profile-info">
                                        <div class="row justify-content-center">
                                            <div class="col-xl-8">
                                                <div class="row">
                                                    </br>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                   
                        $fa= mysqli_query($con,"select * from tblregistration where email='".$_SESSION['indexname']."'");
                        $my= mysqli_fetch_assoc($fa);
                        
                    ?>
                    <h4 class="text-primary mb-4">Personal Information</h4>
                    <div class="row mb-4">
                        <div class="col-3">
                            <h5 class="f-w-500">Name <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-9"><span><?php echo $my["fname"]."\t" .$my["lname"];?></span>
                        </div>
                    </div>
                    <div class="row mb-4">
                        <div class="col-3">
                            <h5 class="f-w-500">Email <span class="pull-right">:</span>
                            </h5>
                        </div>
                        <div class="col-9"><span><?php echo $my["email"]?></span>
                        </div>
                    </div>
                    
                    <div class="row mb-4">
                        <div class="col-3">
                            <h5 class="f-w-500">Location <span class="pull-right">:</span></h5>
                        </div>
                        <div class="col-9"><span><?php echo $my["address"] ?></span>
                        </div>
                    </div>
                    

                </div>
            </div>
        </div>

        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="./vendor/global/global.min.js"></script>
        <script src="./js/quixnav-init.js"></script>
        <script src="./js/custom.min.js"></script>


    </body>

</html>