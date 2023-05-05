<!DOCTYPE html>
<?php
ob_start();
include '../connection.php';
//ob_start();
session_start();
if(!($_REQUEST["arteid"]))
{
    header("location:./artist_art.php");
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
                            <div class="card-header">
                                <h4 class="card-title">Edit Art Details</h4>
                            </div>
                            <div class="card-body">
                                <div class="table-responsive">
                                    <div class="card">
                                        <div class="card-body">
                                            <div class="basic-form">
                                                <form action="" method="post" enctype="multipart/form-data">
                                                    <div class="form-group row">
                                                        <?php 
                                                         $sel= mysqli_query($con,"select * from tblart where id='".$_REQUEST["arteid"]."'");
                                                         $re= mysqli_fetch_assoc($sel);
                                                        ?>
                                                        <label class="col-sm-2 col-form-label">Art Name :- </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" value="<?php echo $re["name"]; ?>" name="name">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Art Image :- </label>
                                                        <div class="col-sm-10">
                                                            <input type="file" class="form-control" name="imag">
                                                        </div>
                                                    </div>
                                                    
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Category :- </label>
                                                        <div class="col-sm-10">
                                                            <select id="inputState" class="form-control" name="cat">
                                                                <option selected><?php $res= mysqli_query($con,"select * from tblcategory where id='".$re["cid"]."'");
                                                                                       $ress= mysqli_fetch_assoc($res);
                                                                                       
                                                                                       echo $ress["name"];
                                                                ?></option>
                                                                <?php
                                                                $r = mysqli_query($con, "select *  from tblcategory");

                                                                while ($row = mysqli_fetch_row($r)) {
                                                                    echo "<option value=" . $row[0] . ">" . $row[1] . "</option>";
                                                                }
                                                                ?>
                                                            </select>
                                                        </div>
                                                    </div>

                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Price :- </label>
                                                        <div class="col-sm-10">
                                                            <input type="text" class="form-control" value="<?php echo $re["price"]; ?>" name="price">
                                                        </div>
                                                    </div>
                                                    <div class="form-group row">
                                                        <label class="col-sm-2 col-form-label">Details :- </label>
                                                        <div class="col-sm-10">
                                                            <textarea type="text" class="form-control" value="" name="details"><?php echo $re["details"]; ?></textarea>
                                                        </div>
                                                    </div>


                                                    <div class="form-group row">
                                                        <div class="card-body">
                                                            <!--<input type="submit" class="btn btn-rounded btn-dark" name="submit" value="submit">-->
                                                            <button class="btn btn-rounded btn-dark" name="submit" value="submit">submit    </button>
                                                        </div>
                                                    </div>
                                                    <?php
                                                    if (isset($_POST['submit'])) {
                                                       
                                                        $src = $_FILES['imag']['tmp_name'];
                                                        $des = "image/" . $_FILES['imag']['name'];
                                                        $ext = explode(".", $des)[1];
                                                        if ($ext == 'jpg' || 'png' || 'jpeg') {
                                                            $update="update tblart set cid='".$_REQUEST["cat"]."',name='".$_REQUEST["name"]."',image='".$des."',price='".$_REQUEST["price"]."',details='".$_REQUEST["details"]."' where id='".$_REQUEST["arteid"]."'";
                                                            $result = mysqli_query($con, $update);
//                                                            echo $update;
//                                                            exit();

                                                            if (!($result)) {
                                                                  ?>
                                                            <script>
                                                                alert("not updateed.......");
                                                            </script>
                                                            <?php
//                                                                echo " not updateed........";
                                                                header("location:./editartdetails.php");
                                                            } else {
                                                                echo "update details";
                                                                move_uploaded_file($src, $des);
                                                                header("location:./artist_art.php");
                                                            }
                                                        } else {
                                                            ?>
                                                            <script>
                                                                alert("input image is not a png or jpg or jpeg");
                                                            </script>
                                                            <?php
                                                        }
                                                    }
//                                                  
                                                    ?>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
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