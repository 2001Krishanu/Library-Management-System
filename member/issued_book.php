<?php
require_once 'header.php';
?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Issued Book</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
           <div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Issued Books</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="table-bordered data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Book Image</th>
                            <th>Book Issue Date</th>
                            
                        </tr>
                        </thead>
                        <tbody>
                            <?php
                            $member_id=$_SESSION['member_id'];
                            $result=mysqli_query($con, "SELECT `member_issue_book`.`book_issue_date`, `books`.`book_name`, `books`.`book_image`
FROM `books`
INNER JOIN `member_issue_book` ON `member_issue_book`.`book_id`=`books`.`ISBN`
WHERE `member_issue_book`.`member_id`='$member_id'");
                            
                            while ( $row=mysqli_fetch_assoc($result)) {?>
                                <tr>
                            <td><?= $row['book_name'] ?></td>
                            <td><img style="width: 60px" src="../images/books/<?= $row['book_image'] ?>"></td>
                            <td><?= date('d-D-M-Y', strtotime($row['book_issue_date'])) ?></td>
                            
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
require_once 'footer.php';
?>

            





    

