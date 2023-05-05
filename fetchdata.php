<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
include './connection.php';

if (isset($_REQUEST['country_id'])) {
    $name = $_REQUEST['country_id'];
    $query = "select * from tblstate where cid='$name'";
    //$query = "select * from tblcountry where cname='$name'";
    $r = mysqli_query($con, $query);


    while ($row = mysqli_fetch_array($r)) {

        //  echo "<option>" . $row['sname'] . "</option>";
        //$_SESSION['stateid']=$row['sid'];
        echo "<option value=$row[0]>$row[1]></option>";
    }
}
if (isset($_REQUEST['City'])) {
    $n = $_REQUEST['City'];
    $query = "select * from tblcity where sid='$n'";
   
    $ra = mysqli_query($con, $query);

    
    while ($row = mysqli_fetch_array($ra))
    {
        echo "<option value=$row[0]>$row[1]></option>";
    }
}
