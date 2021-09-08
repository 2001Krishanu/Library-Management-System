<?php
require_once '../db_connect.php';
if (isset($_GET['account_delete'])){
    $id=base64_decode($_GET['account_delete']);
  mysqli_query($con,"DELETE FROM `member` WHERE `id`='$id'");
  header('location: stu_profile.php');

}
?>



