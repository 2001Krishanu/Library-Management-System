<?php require_once 'header.php'; 

if (isset($_POST['save_member'])) {

$firstname=$_POST['firstname'];
$lastname=$_POST['lastname'];
$email=$_POST['email'];
$username=$_POST['username'];
$password=$_POST['password'];
$profession=$_POST['profession'];
$phone=$_POST['phone'];


$input_error=array();

if (count($input_error)==0) {
$email_check=mysqli_query($con,"SELECT * FROM `member` WHERE `email`='$email'");
$email_check_rows=mysqli_num_rows($email_check);

if ($email_check_rows==0){

    $username_check=mysqli_query($con,"SELECT * FROM `member` WHERE `username`='$username'");
    $username_check_rows=mysqli_num_rows($username_check);

    if ($username_check_rows==0) {
        //query
        $q2=mysqli_query($con,"INSERT INTO member (firstname,lastname,email,username,password,profession,phone) VALUES ('$firstname','$lastname','$email','$username','$password','$profession','$phone')");
        if( $q2){
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

?>

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Add Member</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
<div class="row animated fadeInUp">
    <div class="col-sm-6 col-sm-offset-3">

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
       

        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <h5 class="mb-lg"><b>Add Member</b></h5>
                            <div class="form-group">
                                <label for="firstname" class="col-sm-4 control-label">First Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="firstname" placeholder="First name" name="firstname" value="<?= isset($firstname) ? $firstname:''?>" required>
                                </div>
                      
                            </div>
                               <div class="form-group">
                                <label for="lastname" class="col-sm-4 control-label">Last Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="lastname" placeholder="Last name" name="lastname" value="<?= isset($lastname) ? $lastname:''?>" required>
                                </div>
                        
                            </div>
                               <div class="form-group">
                                <label for="email" class="col-sm-4 control-label">Email</label>
                                <div class="col-sm-8">
                                    <input type="email" class="form-control" id="email" placeholder="Email" name="email" value="<?= isset($email) ? $email:''?>" required>
                                </div>
                     
                            </div>
                               <div class="form-group">
                                <label for="username" class="col-sm-4 control-label">Username</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="username" placeholder="username" name="username" value="<?= isset($username) ? $username:''?>" required>
                                </div>
                       
                            </div>
                               <div class="form-group">
                                <label for="password" class="col-sm-4 control-label">Password</label>
                                <div class="col-sm-8">
                                    <input type="password" class="form-control" id="password" placeholder="Password" name="password" value="<?= isset($password) ? $password:''?>" required>
                                </div>
                        
                            </div>
                               <div class="form-group">
                                <label for="profession" class="col-sm-4 control-label">Profession</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="profession" placeholder="profession" name="profession" value="<?= isset($profession) ? $profession:''?>" required>
                                </div>
                         </div>
                                <div class="form-group">
                                <label for="phone" class="col-sm-4 control-label">Phone</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="phone" placeholder="+91**********" name="phone" value="<?= isset($phone) ? $phone:''?>" required>
                                </div>
                         
                            </div>

                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" name="save_member" class="btn btn-primary"><i class="fa fa-save"></i> Save</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'footer.php';
?>



