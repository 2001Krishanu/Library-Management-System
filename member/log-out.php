<?php
session_start();

session_destroy();
header('location:Mem_sign-in.php');