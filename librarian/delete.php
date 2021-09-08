<?php
require_once '../db_connect.php';
if (isset($_GET['bookdelete'])){
    $ISBN=base64_decode($_GET['bookdelete']);
  mysqli_query($con,"DELETE FROM `books` WHERE `ISBN`='$ISBN'");
  header('location: manage_book.php');

}
?>



