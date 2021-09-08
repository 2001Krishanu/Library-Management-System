<?php
session_start();

session_destroy();
header('location:lib_sign-in.php');