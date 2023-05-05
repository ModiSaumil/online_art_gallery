<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './connection.php';

if(isset($_REQUEST['adid']))
{
    $adel = "delete from tblcustomerartfeedback where id='".$_REQUEST['did']."'";
    $result = mysqli_query($con, $adel);
                                                    
    header("location:./artist/artist_viewfeedback.php");
}

if(isset($_REQUEST['did']))
{
    $del = "delete from tblfeedback where id='".$_REQUEST['did']."'";
    $result = mysqli_query($con, $del);

    header("location:./admin/admin_feedback.php");
}

if($_REQUEST['cartaid'] && $_REQUEST['cartciid'])
{
    $delca = "delete from tblcart where aid='".$_REQUEST['cartaid']."' and id='".$_REQUEST['cartciid']."'";
    $result = mysqli_query($con, $delca);

    header("location:./cart.php");
}