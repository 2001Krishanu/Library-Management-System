<?php
//connection_built
$con=mysqli_connect('localhost','root');
mysqli_select_db($con,'lms');
// Check connection
if($con === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
?>