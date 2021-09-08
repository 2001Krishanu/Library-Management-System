<?php require_once 'header.php'; ?>

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Profile</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b> Profile</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                          <th>Name</th>
                            
                            <th>Email</th>
                            <th>Username</th>
                            <th>Password</th>
                            <th>Roll</th>
                            <th>Phone</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $result=mysqli_query($con,"SELECT * FROM `students_reg` WHERE `email` = '$student_login' OR `username` = '$student_login'");
                        while ($row=mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?= ucwords($row['fname'] .' '. $row['lname']) ?></td>
                               
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['password'] ?></td>
                                <td><?= $row['roll'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['status'] ==1 ? 'Active' : 'Inactive' ?></td>
                                <td>
                                    <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#profile-<?= $row['ID'] ?>"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-warning"  data-toggle="modal" data-target="#update-prof<?= $row['ID'] ?>"><i class="fa fa-pencil"></i></a>
                                    <a href="stu_delete.php?account_delete=<?= base64_encode($row['ID']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete your profile?')"><i class="fa fa-trash-o"></i></a>
                                </td>
                            </tr>
                            <?php
                        }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>


    </div>
    <?php
$result=mysqli_query($con,"SELECT * FROM `students_reg` WHERE `email` = '$student_login' OR `username` = '$student_login'");
while ($row=mysqli_fetch_assoc($result)){
?>
<!---Model--->
<div class="modal fade" id="profile-<?= $row['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-user"></i>Profile Details</h4>
            </div>
            <div class="modal-body">
                <table class="table  table-bordered">
                    <tr>
                        <th>Name</th>
                       <td><?= ucwords($row['fname'] .' '. $row['lname']) ?></td>
                    </tr>
                     
                    <tr>
                        <th>Email</th>
                        <td><?= $row['email'] ?></td>
                    </tr>
                    <tr>
                        <th>Username</th>
                       <td><?= $row['username'] ?></td>
                    </tr>
                    <tr>
                        <th>Password</th>
                       <td><?= $row['password'] ?></td>
                    </tr>
                     <tr>
                        <th>Roll</th>
                       <td><?= $row['roll'] ?></td>
                    </tr> <tr>
                        <th>Phone</th>
                       <td><?= $row['phone'] ?></td>
                    </tr>
                   
                     <tr>
                        <th>Status</th>
                       <td><?= $row['status'] ?></td>
                    </tr>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
    <?php
}
?>
<?php
$result=mysqli_query($con,"SELECT * FROM `students_reg` WHERE `email` = '$student_login' OR `username` = '$student_login'");
while ($row=mysqli_fetch_assoc($result)){
    $ID=$row['ID'];
    $lib_info=mysqli_query($con,"SELECT * FROM `students_reg` WHERE `ID`='$ID'");
    $lib_info_row=mysqli_fetch_assoc($lib_info);

    ?>
    <!---Model--->
    <div class="modal fade" id="update-prof<?= $row['ID'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-edit"></i>Update Profile</h4>
                </div>
                <div class="modal-body">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="fname" >First Name</label>
                                            <input type="text" class="form-control" id="fname" placeholder="First name" value="<?=$lib_info_row['fname'] ?>" required name="fname">
                                            <input type="hidden" class="form-control" value="<?=$lib_info_row['ID'] ?>" required name="ID">
                                        </div>
                                          <div class="form-group">
                                            <label for="lname" >Last Name</label>
                                            <input type="text" class="form-control" id="lname" placeholder="Last name" value="<?=$lib_info_row['lname'] ?>" required name="lname">
                                            <input type="hidden" class="form-control" value="<?=$lib_info_row['ID'] ?>" required name="ID">
                                        </div>
                                        <div class="form-group">
                                            <label for="email" >Email</label>
                                                <input type="text" class="form-control" id="email" placeholder="email" value="<?=$lib_info_row['email'] ?>"  required name="email" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="username">Username</label>
                                                <input type="text" class="form-control" id="username" placeholder="username" value="<?=$lib_info_row['username'] ?>" required name="username" readonly>
                                        </div>
                                        <div class="form-group">
                                            <label for="password">Password</label>
                                                <input type="text" class="form-control" id="password" placeholder="password" value="<?=$lib_info_row['password'] ?>" required name="password">
                                        </div>
                                           <div class="form-group">
                                            <label for="roll">Roll</label>
                                                <input type="text" class="form-control" id="roll" placeholder="Roll" value="<?=$lib_info_row['roll'] ?>" required name="roll">
                                        </div>
                                         <div class="form-group">
                                            <label for="phone">Phone</label>
                                                <input type="text" class="form-control" id="phonepassword" placeholder="phone" value="<?=$lib_info_row['phone'] ?>" required name="phone">
                                        </div>
                                        <div class="form-group">
                                            <label for="status">Status</label>
                                                <input type="text" class="form-control" id="status" placeholder="status" value="<?=$lib_info_row['status'] ==1 ? 'Active' : 'Inactive' ?>" required name="status" readonly>
                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="profile-update" class="btn btn-primary" onclick="return confirm('Are you sure to update your profile?')"><i class="fa fa-save"></i> Update</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>

            </div>
        </div>
    </div>
    <?php
}
if (isset($_POST['profile-update'])) {
  
    $ID = $_POST['ID'];
    $fname = $_POST['fname'];
    $lname = $_POST['lname'];
    //$email = $_POST['email'];
    //$username = $_POST['username'];
    $password = $_POST['password'];
    $roll = $_POST['roll'];
    $phone = $_POST['phone'];
    //$status = $_POST['status'];


    
mysqli_query($con, "UPDATE `students_reg` SET `fname`='$fname', `lname`='$lname', `password`='$password', `roll`='$roll', `phone`='$phone' WHERE `ID`='$ID'");

if($result) {
     //move_uploaded_file($_FILES['image']['tmp_name'],'../images/profile/'.$pro_image);
    //move_uploaded_file($f['tmp_name'],"images/profile/".$f['name']);
    ?>
    <script type="text/javascript">
        alert('Account Updated Successfully!');
        javascript:history.go(-1);
    </script>
    <?php

   }else{
     ?>
    <script type="text/javascript">
        alert('Account not Updated!');
    </script>
    <?php
}

}

?>


<?php require_once 'footer.php'; ?>
