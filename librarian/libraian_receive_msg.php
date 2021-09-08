<?php require_once 'header.php';

mysqli_query($con, "UPDATE `message` SET `msg_read`= 'read' WHERE `dusername` = '$libraian_login';") ;

?>

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Notification</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
    <div class="row animated fadeInUp">
        <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Students</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Username</th>
                            <th>Roll</th>
                            <th>Phone</th>
                            
                            <th>Title</th>
                            <th>Message</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result=mysqli_query($con,"SELECT `students_reg`.`fname`, `students_reg`.`lname`, `students_reg`.`email`, `students_reg`.`username`, `students_reg`.`roll`, `students_reg`.`phone`, `message`.`title`, `message`.`msg` 
FROM `students_reg` INNER JOIN `message` ON `students_reg`.`email` = `message`.`susername` OR `students_reg`.`username` = `message`.`susername`");
while ($row=mysqli_fetch_array($result)){
                            ?>
                            <tr>
                                <td><?= ucwords($row['fname'] .' '. $row['lname']) ?></td>
                                <td><?= $row['email'] ?> readonly </td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['roll'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                
                                <td><?= $row['title'] ?></td>
                                <td><?= $row['msg'] ?></td>
                               
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

<?php require_once 'footer.php'; ?>