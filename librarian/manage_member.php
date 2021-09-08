<?php require_once 'header.php'; ?>

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Members Details</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Members</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>E-mail</th>
                            <th>Username</th>
                            <th>Profession</th>
                            <th>Phone</th>
                          
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result=mysqli_query($con,"SELECT * FROM `member`");
                        while ($row=mysqli_fetch_assoc($result)){
                            $member_id=$row['id'];
                        
                        
                            ?>
                            <tr>
                                <td><?= ucwords($row['firstname'] .' '. $row['lastname']) ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['profession'] ?></td>
                                <td><?= $row['phone'] ?></td>
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