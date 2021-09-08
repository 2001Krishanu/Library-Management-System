<?php
require_once '../db_connect.php';

$username= base64_decode($_GET['username']);

mysqli_query($con,"UPDATE `students_reg` SET `STATUS` ='1' WHERE `username`='$username'");
header('location:students.php');
?>