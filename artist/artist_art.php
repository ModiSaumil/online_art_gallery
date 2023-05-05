<!DOCTYPE html>
<?php
include '../connection.php';
ob_start();
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


            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                <div class="container-fluid">
                    <div class="col-lg-12">

                        <div class="card">
                            <div class="card-body">
                                <a href="addart.php"><button type="button" class="btn btn-rounded btn-info" name="add">
                                    <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                    </span>Add</button></a>
                           
                            </div>
                        </div>
                        <div class="card">
                            <div class="card-header">
                                <h4 class="card-title">Bordered Table</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Artist Name </th>
                                                <th scope="col">Art name</th>
                                                <th scope="col">Art image</th>
                                                <th scope="col">price</th>
                                                <th scope="col">details</th>

                                            </tr>
                                        
                                        </thead>
                                        <tbody>
                                            <?php
//                                            aid	cid	name	image	price	details
                                            
                                            $sel = "select r.fname,r.lname,a.* from tblregistration r inner join tblart a on r.id=a.aid where r.email='".$_SESSION['indexname']."'";
                                            $result = mysqli_query($con, $sel);
                                            while ($R = mysqli_fetch_assoc($result)) {
                                                    echo "<tr>";
                                                    echo "<td>" . $R['fname'] ."\t".$R['lname']. "</td>";
                                                    echo "<td> " . $R['name'] . "</td>";
                                                    //echo "<td>" .$R['image']."</td>";
                                                    echo "<td><img src=" . $R['image'] . " width=50% height=50% alt='".$R['image']."'></td>";
                                                    echo "<td>" . $R['price'] . "</td>";
                                                    echo "<td>" . $R['details'] . "</td>";
                                                    ?>
                                                <td>
                                                    <span>
                                                      <?php echo " <a href='editartdetails.php?arteid=".$R['id']."' class='mr-4' data-toggle='tooltip' data-placement='top' title='Edit' name='pencil'><i class='fa fa-pencil color-muted'></i> </a>" ?>
                                                    </span>
                                                </td>
                                                </tr>
                                                <?php
//                                       
                                        }
                                        ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--Content body end-->
                </div>
            </div>
        </div>
        <!--Main wrapper end-->
        <!--**********************************
            Scripts
        ***********************************-->
        <!-- Required vendors -->
        <script src="./vendor/global/global.min.js"></script>
        <script src="./js/quixnav-init.js"></script>
        <script src="./js/custom.min.js"></script>




    </body>

</html>
<?php
ob_flush();
?>