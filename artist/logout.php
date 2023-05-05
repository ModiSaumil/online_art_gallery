<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
session_start();
unset($_SESSION["login"]);
unset($_SESSION["indexname"]);
session_destroy();
header('Location:../mainrg.php');
?>