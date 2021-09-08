
<?php
require_once '../db_connect.php';
session_start();
if(isset($_SESSION['student_login'])){
    header('location:index.php');
}
if (isset($_POST['register'])) {

$fname=$_POST['fname'];
$lname=$_POST['lname'];
$email=$_POST['email'];
$password=$_POST['password'];
$username=$_POST['username'];
$roll=$_POST['roll'];
$phone=$_POST['phone'];
    

$input_error=array();
if(empty($fname)){
    $input_error['fname']="First name is required!";
}

if(empty($lname)){
    $input_error['lname']="Last name is required!";
}

if(empty($email)){
    $input_error['email']="Email field is required!";
}

if(empty($password)){
    $input_error['password']="password is required!";
}

if(empty($username)){
    $input_error['username']="Username is required!";
}

if(empty($roll)){
    $input_error['roll']="Roll number is required!";
}

if(empty($phone)){
    $input_error['phone']="Phone number is required!";
}


if (count($input_error)==0) {
$email_check=mysqli_query($con,"SELECT * FROM `students_reg` WHERE `email`='$email'");
$email_check_rows=mysqli_num_rows($email_check);

if ($email_check_rows==0){

    $username_check=mysqli_query($con,"SELECT * FROM `students_reg` WHERE `username`='$username'");
    $username_check_rows=mysqli_num_rows($username_check);

    if ($username_check_rows==0) {
        //query
        $q=mysqli_query($con,"INSERT INTO students_reg (fname,lname,email,password,username,roll,phone,status) VALUES ('$fname','$lname','$email','$password','$username',$roll,$phone,'0')");
        if( $q){
       

            $success="Registration Successfully!";
        } else{
            $error="Registration Unsuccessfully!";
        }

    }else{
        $username_exist="This username already exists";
    }
}else{
    $email_exist="This email already exists";
}



}

}




/*if(mysqli_query($con, $q)){
    //echo "Records inserted successfully.";
    $success;
} else{
    //echo "ERROR: Could not able to execute $q. " . mysqli_error($con);
    $error;
}*/

// Close connection

?>






<!doctype html>
<html lang="en" class="fixed accounts sign-in">



<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
    <title>LMS</title>
    <!--BASIC css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../style/vendor/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="../style/vendor/font-awesome/css/font-awesome.css">
    <link rel="stylesheet" href="../style/vendor/animate.css/animate.css">
    <!--SECTION css-->
    <!-- ========================================================= -->
    <!--TEMPLATE css-->
    <!-- ========================================================= -->
    <link rel="stylesheet" href="../style/stylesheets/css/style.css">
    <style type="text/css">
         #stu_reg
        {
            text-shadow: 10px 10px 6px black;
            text-decoration: underline;
            text-transform: uppercase;

        }
    </style>
</head>

<body>
<div class="wrap">
    <!-- page BODY -->
    <!-- ========================================================= -->
    <div class="page-body animated slideInDown">
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
        <!--LOGO-->
        <div class="logo">
             <h1 class="text-center"><div id="stu_reg"><b>Student Registration</b></div></h1>
            <?php
            if(isset($success)){
                ?>
                <div class="alert alert-success" role="alert">
                    <?= $success?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>

            <?php
            if(isset($error)){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?= $error?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>

            <?php
            if(isset($email_exist)){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?= $email_exist?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>

            <?php
            if(isset($username_exist)){
                ?>
                <div class="alert alert-danger" role="alert">
                    <?= $username_exist?>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <?php
            }
            ?>
        </div>


        <div class="box">
            <!--SIGN IN FORM-->
            <div class="panel mb-none">
                <div class="panel-content bg-scale-0">
                    <form action="" method="post">
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="First Name" name="fname" value="<?= isset($fname) ? $fname:''?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            if(isset( $input_error['fname'])){
                                echo '<span class="input-error">'.$input_error['fname'].'</span>';
                            }
                            ?>
                        </div>
                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="Last Name" name="lname" value="<?= isset($lname) ? $lname:''?>">
                                <i class="fa fa-user"></i>
                            </span>
                            <?php
                            if(isset( $input_error['lname'])){
                                echo '<span class="input-error">'.$input_error['lname'].'</span>';
                            }
                            ?>
                        </div>
                        <!-- <div class="form-group">  
                                <input type="file" class="form-control" name="pic">
                        </div>-->

                        <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="email" class="form-control"  placeholder="Email" name="email" value="<?= isset($email) ? $email:''?>">
                                <i class="fa fa-envelope"></i>
                            </span>
                            <?php
                            if(isset( $input_error['email'])){
                                echo '<span class="input-error">'.$input_error['email'].'</span>';
                            }
                            ?>
                        </div>

                        <div class="form-group">
                            <span class="input-with-icon">
                                <input type="password" class="form-control"  placeholder="Password" name="password" value="<?= isset($password) ? $password:''?>">
                                <i class="fa fa-key"></i>
                            </span>
                            <?php
                            if(isset( $input_error['password'])){
                                echo '<span class="input-error">'.$input_error['password'].'</span>';
                            }
                            ?>
                        </div>
                          <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="username" name="username" value="<?= isset($username) ? $username:''?>">
                                <i class="fa fa-user"></i>
                            </span>
                              <?php
                              if(isset( $input_error['username'])){
                                  echo '<span class="input-error">'.$input_error['username'].'</span>';
                              }
                              ?>
                        </div>
                          <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="roll" name="roll"value="<?= isset($roll) ? $roll:''?>">
                                <i class="fa fa-sort-numeric-asc"></i>
                            </span>
                              <?php
                              if(isset( $input_error['roll'])){
                                  echo '<span class="input-error">'.$input_error['roll'].'</span>';
                              }
                              ?>
                        </div>

                          <div class="form-group mt-md">
                            <span class="input-with-icon">
                                <input type="text" class="form-control"  placeholder="+91**********" name="phone"value="<?= isset($phone) ? $phone:''?>">
                                <i class="fa fa-phone"></i>
                            </span>
                              <?php
                              if(isset( $input_error['phone'])){
                                  echo '<span class="input-error">'.$input_error['phone'].'</span>';
                              }
                              ?>
                        </div>





                        <div class="form-group">
                            <input class="btn btn-primary btn-block" type="submit" name="register" value="Register">
                        </div>
                        <div class="form-group text-center">
                            Have an account?, <a href="sign-in.php">Sign In</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    </div>
</div>
<!--BASIC scripts-->
<!-- ========================================================= -->
<script src="../style/vendor/jquery/jquery-1.12.3.min.js"></script>
<script src="../style/vendor/bootstrap/js/bootstrap.min.js"></script>
<script src="../style/vendor/nano-scroller/nano-scroller.js"></script>
<!--TEMPLATE scripts-->
<!-- ========================================================= -->
<script src="../style/javascripts/template-script.min.js"></script>
<script src="../style/javascripts/template-init.min.js"></script>
<!-- SECTION script and examples-->
<!-- ========================================================= -->
</body>
</html>
