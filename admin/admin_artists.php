<!--example of employee_view.php status pending or accept update query and table name is 
tblartistdetails add one column status in table-->     
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
                                            <span class="ml-2">Logout</span>
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


            <!--**********************************
                Content body start
            ***********************************-->
            <div class="content-body">
                <div class="container-fluid">
                    <div class="col-lg-12">

<!--                        <div class="card">
                            <div class="card-body">
                                <a href="addart.php"><button type="button" class="btn btn-rounded btn-info" name="add">
                                        <span class="btn-icon-left text-info"><i class="fa fa-plus color-info"></i>
                                        </span>Add</button></a>
                                <?php
                                ?>

                            </div>
                        </div>-->
                        <div class="card">
<!--                            <div class="card-header">
                                <h4 class="card-title">Bordered Table</h4>
                            </div>-->
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table class="table table-bordered verticle-middle table-responsive-sm">
                                        <thead>
                                            <tr>
                                                <th scope="col">Customer id </th>
                                                <th scope="col">Customer First Name </th>
                                                <th scope="col">Customer Last Name </th>
                                                <th scope="col">Gender</th>
                                                <th scope="col">Mobile Number</th>
                                                <th scope="col">Address</th>
                                                <th scope="col">City</th>
                                                <th scope="col">Pincode</th>
                                                <th scope="col">Email-Id</th>
                                                <th scope="col">Descripation</th>                                                
                                                <th scope="col">Status</th>



                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php
                                            $sel = "select tblregistration.*,tblartistdetails.Descripation,tblartistdetails.status from tblregistration inner join tblartistdetails on tblregistration.id=tblartistdetails.aid";
                                            $result = mysqli_query($con, $sel);

                                            //echo "<table> <tr> <th>Customer id </th> <th>Customer First Name </th> <th>Customer Last Name </th> <th>Gender </th> <th>Mobile Number</th> <th>Address</th> <th>City</th> <th>Pincode</th> <th>Email-Id</th> <th>Descripation</th> <th>Status</th> <th>action</th></tr>";

                                            while ($R = mysqli_fetch_assoc($result)) {
                                                if ($R['mode'] == "A") {
                                                    echo "<tr> <td> " . $R['id'] . "</td> ";
                                                    echo "<td> " . $R['fname'] . "</td>";
                                                    echo "<td> " . $R['lname'] . "</td>";
                                                    echo "<td> " . $R['gender'] . "</td>";
                                                    echo "<td>" . $R['mobileNo'] . "</td>";
                                                    echo "<td>" . $R['address'] . "</td>";
                                                    echo "<td>" . $R['cid'] . "</td>";
                                                    echo "<td>" . $R['pincode'] . "</td>";
                                                    echo "<td>" . $R['email'] . "</td>";
                                                    echo "<td>" . $R['Descripation'] . "</td>";
                                                    echo "<td><button type='button' class='btn btn-primary'><a href='admin_artists.php?asid=" . $R["id"] . "'>" . $R['status'] . "</button></td>";
                                                }
                                            }

                                            if (isset($_REQUEST["asid"])) {
                                                $sql = "update tblartistdetails set status='accepted' where aid='" . $_REQUEST['asid'] . "'";
                                                $results = mysqli_query($con, $sql);

                                                if ($results) {
                                                   // echo "Updated Successfully";
                                                   // header("location:admin_artists.php");
                                                } else {
                                                    echo "Not updated";
                                                }
                                            }
                                            ?>

<!--                                        <td>
                                            <span>
                                                <a href="javascript:void()" class="mr-4" data-toggle="tooltip"
                                                   data-placement="top" title="Edit" name="pencil"><i
                                                        class="fa fa-pencil color-muted"></i> </a>
                                                <a href="javascript:void()" data-toggle="tooltip"
                                                   data-placement="top" title="Close" name="close"><i
                                                        class="fa fa-close color-danger"></i></a>
                                            </span>
                                        </td>-->
                                            </tr>
                                            <?php
//}
// }
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