<?php
require_once 'header.php';
?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Issued Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
           <div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Issue Books</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="table-bordered data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Book Image</th>
                            <th>Book Issue Date</th>
                            <th>Book Renew Date</th>
                            <th>Fine(In INR)</th>

                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $student_id=$_SESSION['student_id'];
                            $result=mysqli_query($con, "SELECT `issue_book`.`book_issue_date`, `issue_book`.`student_id`, `issue_book`.`book_renew_date`, `books`.`book_name`, `books`.`ISBN`, `books`.`book_image`
FROM `books`
INNER JOIN `issue_book` ON `issue_book`.`book_id`=`books`.`ISBN`
WHERE `issue_book`.`student_id`='$student_id' AND `book_return_date`='0'");
                            
                            while ( $row=mysqli_fetch_assoc($result)) {
                                $student_id=$row['student_id'];
                                $ISBN=$row['ISBN'];
                                //$total_fine=0;
                                $result1=mysqli_query($con,"SELECT * FROM `fine` WHERE `student_id`='$student_id' AND `ISBN`='$ISBN'");
                                while ($row1=mysqli_fetch_assoc($result1)) {
                                    $fine_show=$row1['fine'];
                                ?>
                                <tr>
                            <td><?= $row['book_name'] ?></td>
                            <td><img style="width: 60px" src="../images/books/<?= $row['book_image'] ?>"></td>
                            <td><?= date('d-D-M-Y', strtotime($row['book_issue_date'])) ?></td>
                            <td><?= date('d-D-M-Y', strtotime($row['book_renew_date'])) ?></td>
                            <td><?php ?><i class="fa fa-rupee"></i><?php echo $fine_show; ?></td>
                            
                        </tr>
                             <?php
                             }
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
require_once 'footer.php';
?>

            





    

