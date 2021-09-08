<?php
require_once '../db_connect.php';
if (isset($_GET['account_delete'])){
    $ID=base64_decode($_GET['account_delete']);
  mysqli_query($con,"DELETE FROM `students_reg` WHERE `ID`='$ID'");
  header('location: stu_profile.php');

}
?>



