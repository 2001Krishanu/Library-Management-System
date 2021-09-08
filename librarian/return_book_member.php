<?php
require_once 'header.php';
?>
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Return Book</a></li>
        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>Return Books</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="table-bordered data-table table table-striped nowrap table-hover" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Username</th>
                            <th>Email</th>
                            <th>Phone</th>
                            <th>Book Name</th>
                            <th>Book Image</th>
                            <th>Book Issue Date</th>
                            
                            <th>Return Book</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $result=mysqli_query($con,"SELECT `member_issue_book`.`id`, `member_issue_book`.`book_id`,`member_issue_book`.`book_issue_date`, `member`.`id`,`member`.`firstname`, `member`.`lastname`, `member`.`email`, `member`.`username`, `member`.`phone`, `books`.`book_name`, `books`.`book_image`
FROM `member_issue_book`
INNER JOIN `member` ON `member`.`id` = `member_issue_book`.`member_id`
INNER JOIN `books` ON `books`.`ISBN` = `member_issue_book`.`book_id`
WHERE `member_issue_book`.`book_return_date` = '0'");
                        while ($row=mysqli_fetch_assoc($result)){

                            $ISBN=$row['book_id'];
                            $student_id=$row['id'];

                            ?>
                            <tr>
                                <td><?= ucwords($row['firstname'] .' '. $row['lastname']) ?></td>
                                <td><?= $row['username'] ?></td>
                                <td><?= $row['email'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['book_name'] ?></td>
                                <td><img style="width: 60px" src="../images/books/<?= $row['book_image'] ?>" alt=""></td>
                                <td><?= $row['book_issue_date'] ?></td>
                               
                            
                                <td><a href="return_book_member.php?id=<?= $row['id'] ?>&book_id=<?= $row['book_id'] ?>"><i class="fa fa-book">Return Book</i></a></td>

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
if (isset($_GET['id'])) {
    # code...
   $id=$_GET['id'];
   $bookId=$_GET['book_id'];
   $date=date('d-M-Y');
   $result = mysqli_query($con, "UPDATE `member_issue_book` SET `book_return_date`='$date' WHERE `id` = '$id'");

   if($result) {
     mysqli_query($con, "UPDATE `books` SET `available_qty`=`available_qty`+1 WHERE `ISBN` ='$bookId'");
    ?>
    <script type="text/javascript">
        alert('Book returned successfully!');
        javascript:history.go(-1);
    </script>
    <?php

   }else{
     ?>
    <script type="text/javascript">
        alert('Book not returned!');
    </script>
    <?php

   }
}
?>



<?php
require_once 'footer.php';
?>




