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
        <title>Admin Dashboard </title>
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

            <div class="content-body">
                <div class="container-fluid">
                    <div class="col-lg-12">

                        <!--                        <div class="card">
                                                    <div class="card-body">
                                                        <a href="add_category.php"><button type="button" class="btn btn-rounded btn-info" name="add">
                                                                <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                                                </span>Add Category</button></a>
                        <?php
//                                if (isset($_POST["add"])) {
//                                    header("location:add_category.php");
//                                }
                        ?>
                                                    </div>
                                                </div>-->
                        <div class="card">


                            <form action="" method="post">
                                <input type="text" name="category" placeholder="Add category name">
                                <button name="sub" class='btn btn-primary'>Submit</button>
                            </form>


                            <?php
                            // put your code here
                            if (isset($_POST["sub"])) {
                                $in = "INSERT INTO tblcategory(name) VALUES ('" . $_POST['category'] . "')";
                                $result = mysqli_query($con, $in);

                                if ($result) {
                                    echo "Inserted";
                                } else {
                                    echo "no inserted";
                                }
                            }
                            $fetch = mysqli_query($con, "select * from tblcategory");

                            echo "<table class='table table-bordered verticle-middle table-responsive-sm'> <tr> <th>id </th> <th>name </th></tr>";
                            while ($s = mysqli_fetch_assoc($fetch)) {
                                echo "<tr> <td> " . $s['id'] . "</td> ";
                                echo "<td> " . $s['name'] . "</td></tr>";
                            }
                            ?>
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

        <script src="./vendor/chartist/js/chartist.min.js"></script>

        <script src="./vendor/moment/moment.min.js"></script>
        <script src="./vendor/pg-calendar/js/pignose.calendar.min.js"></script>


        <script src="./js/dashboard/dashboard-2.js"></script>
        <!-- Circle progress -->
    </body>
</html>
