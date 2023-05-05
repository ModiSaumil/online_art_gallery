<!DOCTYPE html>
<?php
include './connection.php';
session_start();
if(!($_SESSION["mail"]))
{
    header("location:mainrg.php");
}
?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Artist Resume Form</title>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.14.0/css/all.min.css'>
    <link rel="stylesheet" href="./artist_resume.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <div class="forgotcontainer" id="forgotcontainer">
        <div class="form-forgot-container for-container">

            <form action="#" method="POST" enctype="multipart/form-data">


                <h1>Upload Resume</h1>
                <span>upload your resume here :- </span>
                <input type="file" name="flp"/>
                <button name="sub">Submit</button>
            </form>
        </div>
    </div>
 <?php
        // put your code here
       
        if(isset($_POST["sub"]))
        {
            $src=$_FILES['flp']['tmp_name'];
            $des="./resumeupload/".$_FILES['flp']['name'];
            
//            echo $_SESSION['mail'];
//            exit();
           $artistid = mysqli_query($con, "select id from tblregistration where email='" . $_SESSION["mail"] . "'");
           $arresult = mysqli_fetch_assoc($artistid);
           $ar = $arresult["id"];
            
            $sta="pendding";
      //      $s="select id from tblartistdetails where email=".$_SESSION["mail"];
            $insert= mysqli_query($con,"insert into tblartistdetails(aid,Descripation,status) values ('$ar','".$des."','".$sta."')");
            
            if($insert)
            {
                echo "Inserted";
                move_uploaded_file($src, $des);  
                header("location:mainrg.php");
            }
            else {
                echo "Not inserted";
//                 header("location:index.php");
            }
        }
        
        ?>
    <footer>
<!--        <p>
            Created with <i class="fa fa-heart"></i>
        </p>-->
    </footer>
    <!-- partial -->
    <script src="./script.js"></script>

</body>
</html>