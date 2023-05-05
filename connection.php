<?php
$host='localhost';
$usname='root';
$pass='';
$database='artgallery';
$con= mysqli_connect("$host","$usname","","$database");
//$con = mysqli_connect("localhost", "root", "root", "studentdatabase");

if (!$con) {
    die("no connection");
}
?>