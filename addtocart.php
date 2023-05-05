<?php
ob_start();
require './connection.php';
session_start();
if(!($_SESSION['indexname']))
{
    header("location:./mainrg.php");
}
?>
<?php
//fetch the id and name is product.php index.php and singleproduct.php
$ids=$_REQUEST['id'];
if(!($ids))
{
    header("location:./product.php");
}
//$aname=$_REQUEST["name"];

$s= mysqli_query($con, "select * from tblcart where aid='$ids'");

if(mysqli_num_rows($s)==0)
{  
    $select= mysqli_query($con, "select id from tblregistration where email='".$_SESSION['indexname']."'");
    $re= mysqli_fetch_assoc($select);
    
    $incart= mysqli_query($con,"insert into tblcart (cid,aid) value('".$re['id']."',$ids)");
    $_SESSION["cid"]=$re["id"];
    if($incart)
    {
        header("location:./product.php");
    }
    else
    {
         echo '<script> alert("this product are allready add in cart"); </script>';
    }
        
}
else
{
    echo '<script> alert("this product are allready add in cart"); </script>';
    header("location:./product.php");
}
ob_flush();
?>