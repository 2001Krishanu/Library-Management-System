<?php
require_once 'header.php';

if (isset($_POST['member_issue_book'])) {
    $member_id = $_POST['member_id'];
    $book_id = $_POST['book_id'];
    $book_issue_date = $_POST['book_issue_date'];
    
 $result_n= mysqli_query($con, "INSERT INTO `member_issue_book`(`member_id`, `book_id`, `book_issue_date`) VALUES ('$member_id','$book_id','$book_issue_date')");
   if ($result_n) {
 
     mysqli_query($con, "UPDATE `books` SET `available_qty`=`available_qty`-1 WHERE `ISBN` ='$book_id'");
    ?>
    <script type="text/javascript">
        alert('Book issued successfully');
    </script>
    <?php
   }else{
     ?>
    <script type="text/javascript">
        alert('Book not issued');
    </script>
    <?php

   }
}
?>

                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                            <li><a href="javascript:avoid(0)">Issue Book</a></li>

                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                <div class="col-sm-6 col-sm-offset-3">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form class="form-inline" method="post" action="">
                                        <div class="form-group">

                        <select class="form-control" name="member_id">
                            <option value="">Select</option>
                            <?php
                        $result=mysqli_query($con,"SELECT * FROM `member`");
                        while ($row=mysqli_fetch_assoc($result)){ ?>
                            <option value="<?= $row['id'] ?>">
                                <?= ucwords($row['firstname'].' '.$row['lastname']) .' - ('.$row['username'].')' ?></option>
                            <?php } ?>
                        </select>

                                        </div>

                                        <div class="form-group">
                                            <button type="submit" name="search" class="btn btn-primary">Search</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            <?php
                            if (isset($_POST['search'])) {
                                $id =$_POST['member_id'];
                        $result=mysqli_query($con,"SELECT * FROM `member` WHERE `id` = '$id'");
                        $row=mysqli_fetch_assoc($result);
                        ?>
                        <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="">

                                        <div class="form-group">
                                            <label for="name">Member Name</label>
                                            <input type="text" class="form-control" id="name" value="<?= ucwords($row['firstname'].' '.$row['lastname']) ?>" readonly>
                                            <input type="hidden" value="<?= $row['id'] ?>" name="member_id">
                                        </div>

                                        <div class="form-group">
                                            <label>Book Name</label>
                                             <select class="form-control" name="book_id">
                                             <option value="">Select</option>
                                            <?php
                                        $result=mysqli_query($con,"SELECT * FROM `books` WHERE `available_qty` > 0");
                                        while ($row=mysqli_fetch_assoc($result)){ ?>
                                            <option value="<?= $row['ISBN'] ?>">
                                                <?= $row['book_name'] ?></option>
                                            <?php } ?>
                                        </select>

                                        </div>
                                        <div class="form-group">
                                            <label>Book Issue Date</label>
                                            <input class="form-control" type="text" name="book_issue_date" value="<?= date("d-m-Y") ?>"  readonly>
                                        </div>

                                       <div class="form-group">
                                            <button type="submit" name="member_issue_book" class="btn btn-primary">Save Issue Book</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                        <?php
                           }
                            ?>
                        </div>
                    </div>
                    </div>
            </div>
<?php
require_once 'footer.php';
?>
