<?php require_once 'header.php'; ?>

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="javascript:avoid(0)">Fine</a></li>
            </ul>
        </div>
    </div>
    <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
             <div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Student Fine</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="table-bordered data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Fine(In INR)</th>
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $result=mysqli_query($con,"SELECT * FROM `students_reg`");

                            while ($row=mysqli_fetch_assoc($result)) {
                                $student_id=$row['ID'];
                              $result1= mysqli_query($con,"SELECT SUM(`fine`) AS Total FROM `fine` WHERE `student_id`='$student_id' AND `amount`='not paid'");
                              $row2=mysqli_fetch_assoc($result1);
                               $Total=$row2['Total'];
                              

                          
                                ?>
                                <tr>
                            <td><?= ucwords($row['fname'] .' '. $row['lname']) ?></td>
                            <td><?= $row['username'] ?></td>
                            <td><?php ?><i class="fa fa-rupee"></i><?php echo $Total; ?></td>
                            
                            
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