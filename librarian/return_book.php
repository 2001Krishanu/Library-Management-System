<?php
require_once 'header.php';
?>
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
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
                            <th>Roll</th>
                            <th>Phone</th>
                            <th>Book Name</th>
                            <th>Book Image</th>
                            <th>Book Issue Date</th>
                            <th>Book Renew Date</th>
                            <th>Fine(In INR)</th>
                            <th>Return Book</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php

                        $result=mysqli_query($con,"SELECT `issue_book`.`id`, `issue_book`.`book_id`,`issue_book`.`book_issue_date`,`issue_book`.`book_renew_date`, `students_reg`.`ID`,`students_reg`.`fname`, `students_reg`.`lname`, `students_reg`.`roll`, `students_reg`.`phone`, `books`.`book_name`, `books`.`book_image`
FROM `issue_book`
INNER JOIN `students_reg` ON `students_reg`.`ID` = `issue_book`.`student_id`
INNER JOIN `books` ON `books`.`ISBN` = `issue_book`.`book_id`
WHERE `issue_book`.`book_return_date` = '0'");
                        while ($row=mysqli_fetch_assoc($result)){

                            $ISBN=$row['book_id'];
                            $student_id=$row['ID'];


                                    $date2 = $row['book_renew_date'];
                                    $date1 = date('Y-m-d');

                                    $diff = strtotime($date1) - strtotime($date2);
                                    $divBy = 60*60*24;

                                    $days = $diff/$divBy;

                                   /* $diff=date_diff($date2,$date1);
                                    $days=$diff->format("%R%a");*/
                                    //echo $diff->format("%a");
                                    /*$diff = strtotime($date1) - strtotime($date2);
                                    $years=floor($diff/(365*60*60*24));
                                    $months=floor(($diff-$years*365*60*60*24)/(365*60*60*24));
                                    $days=floor(($diff-$years*365*60*60*24-$months*30*60*60*24)/(60*60*24));*/
                                    $fine=0;

                                    if ($days>0) {
                                        # code...
                                        $fine=($days*5);
                                    mysqli_query($con,"UPDATE `fine` SET `fine`='$fine',`amount`='not paid' WHERE `student_id`='$student_id' and `ISBN`='$ISBN'");
                                    }




                            ?>
                            <tr>
                                <td><?= ucwords($row['fname'] .' '. $row['lname']) ?></td>
                                <td><?= $row['roll'] ?></td>
                                <td><?= $row['phone'] ?></td>
                                <td><?= $row['book_name'] ?></td>
                                <td><img style="width: 60px" src="../images/books/<?= $row['book_image'] ?>" alt=""></td>
                                <td><?= $row['book_issue_date'] ?></td>
                                <td><?= $row['book_renew_date'] ?></td>
                                <td><?php ?> <i class="fa fa-rupee"></i><?php echo $fine; ?></td>
                                <td><a href="return_book.php?id=<?= $row['id'] ?>&book_id=<?= $row['book_id'] ?>"><i class="fa fa-book">Return Book</i></a></td>

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
   $result = mysqli_query($con, "UPDATE `issue_book` SET `book_return_date`='$date' WHERE `id` = '$id'");

   if($result) {
     mysqli_query($con, "UPDATE `books` SET `available_qty`=`available_qty`+1 WHERE `ISBN` ='$bookId'");
     mysqli_query($con, "UPDATE `fine` SET `amount`='paid' WHERE `student_id`='$student_id' and `ISBN`='$ISBN'");
     mysqli_query($con, "UPDATE `total_fine` SET `Amount`='paid' WHERE `student_id`='$student_id'");
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




