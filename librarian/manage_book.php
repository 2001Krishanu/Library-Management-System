<?php
require_once 'header.php';
?>
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Manage Book</a></li>

        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-12">
        <h4 class="section-subtitle"><b>All Books</b></h4>
        <div class="panel">
            <div class="panel-content">
                <div class="table-responsive">
                    <table id="basic-table" class="data-table table table-striped nowrap table-hover table-bordered" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Book Name</th>
                            <th>Book Edition</th>
                            <th>Book Image</th>
                            <th>Author Name</th>
                            <th>Publisher</th>
                            <th>Price</th>
                            <th>Quantity</th>
                            <th>Available quantity</th>
                            <th>Purchase Date</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php
                        $result=mysqli_query($con,"SELECT * FROM `books`");
                        while ($row=mysqli_fetch_assoc($result)){
                            ?>
                            <tr>
                                <td><?= $row['book_name'] ?></td>
                                <td><?= $row['book_edition'] ?></td>
                                <td><img style="width: 60px" src="../images/books/<?= $row['book_image'] ?>" alt=""></td>
                                <td><?= $row['book_author_name'] ?></td>
                                <td><?= $row['book_publisher'] ?></td>
                                <td><?= $row['book_price'] ?></td>
                                <td><?= $row['book_qty'] ?></td>
                                <td><?= $row['available_qty'] ?></td>
                                <td><?= date('d-D-M-Y', strtotime($row['book_purchase_date'])) ?></td>
                                <td>

                                    <a href="javascript:avoid(0)" class="btn btn-info" data-toggle="modal" data-target="#book-<?= $row['ISBN'] ?>"><i class="fa fa-eye"></i></a>
                                    <a href="" class="btn btn-warning"  data-toggle="modal" data-target="#book-update<?= $row['ISBN'] ?>"><i class="fa fa-pencil"></i></a>
                                    <a href="delete.php?bookdelete=<?= base64_encode($row['ISBN']) ?>" class="btn btn-danger" onclick="return confirm('Are you sure to delete the book?')"><i class="fa fa-trash-o"></i></a>
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
$result=mysqli_query($con,"SELECT * FROM `books`");
while ($row=mysqli_fetch_assoc($result)){
?>
<!---Model--->
<div class="modal fade" id="book-<?= $row['ISBN'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header state modal-info">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="modal-info-label"><i class="fa fa-book"></i>Book Info</h4>
            </div>
            <div class="modal-body">
                <table class="table  table-bordered">
                    <tr>
                        <th>Book Name</th>
                       <td><?= $row['book_name'] ?></td>
                    </tr>
                    <tr>
                        <th>Book Edition</th>
                        <td><?= $row['book_edition'] ?></td>
                    </tr>
                    <tr>
                        <th>Book Image</th>
                       <td><img style="width: 60px" src="../images/books/<?= $row['book_image'] ?>" alt=""></td>
                    </tr>
                    <tr>
                        <th>Author Name</th>
                       <td><?= $row['book_author_name'] ?></td>
                    </tr>
                    <tr>
                        <th>Publisher</th>
                       <td><?= $row['book_publisher'] ?></td>
                    </tr>
                    <tr>
                        <th>Price</th>
                        <td><?= $row['book_price'] ?></td>
                    </tr>
                    <tr>
                        <th>Quantity</th>
                        <td><?= $row['book_qty'] ?></td>
                    </tr>
                    <tr>
                        <th>Available quantity</th>
                        <td><?= $row['available_qty'] ?></td>
                    </tr>
                    <tr>
                        <th>Purchase Date</th>
                        <td><?= date('d-D-M-Y', strtotime($row['book_purchase_date'])) ?></td>
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
$result=mysqli_query($con,"SELECT * FROM `books`");
while ($row=mysqli_fetch_assoc($result)){
    $ISBN=$row['ISBN'];
    $book_info=mysqli_query($con,"SELECT * FROM `books` WHERE `ISBN`='$ISBN'");
    $book_info_row=mysqli_fetch_assoc($book_info);

    ?>
    <!---Model--->
    <div class="modal fade" id="book-update<?= $row['ISBN'] ?>" tabindex="-1" role="dialog" aria-labelledby="modal-info-label">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header state modal-info">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="modal-info-label"><i class="fa fa-edit"></i>Update Book Info</h4>
                </div>
                <div class="modal-body">
                    <div class="panel">
                        <div class="panel-content">
                            <div class="row">
                                <div class="col-md-12">
                                    <form method="post" action="">
                                        <div class="form-group">
                                            <label for="book_name" >Book Name</label>
                                            <input type="text" class="form-control" id="book_name" placeholder="Book Name" value="<?=$book_info_row['book_name'] ?>" required name="book_name">
                                            <input type="hidden" class="form-control" value="<?=$book_info_row['ISBN'] ?>" required name="ISBN">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_edition" >Book Edition</label>
                                                <input type="text" class="form-control" id="book_edition" placeholder="Book Edition" value="<?=$book_info_row['book_edition'] ?>"  required name="book_edition">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_author_name">Author</label>
                                                <input type="text" class="form-control" id="book_author_name" placeholder="Author" value="<?=$book_info_row['book_author_name'] ?>" required name="book_author_name">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_publisher">Publisher</label>
                                                <input type="text" class="form-control" id="book_publisher" placeholder="Publisher" value="<?=$book_info_row['book_publisher'] ?>" required name="book_publisher">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_price">Price</label>
                                                <input type="number" class="form-control" id="book_price" placeholder="Price" value="<?=$book_info_row['book_price'] ?>" required name="book_price">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_qty">Quantity</label>
                                                <input type="number" class="form-control" id="book_qty" placeholder="Quantity" value="<?=$book_info_row['book_qty'] ?>" required name="book_qty">
                                        </div>
                                        <div class="form-group">
                                            <label for="available_qty">Available Quantity</label>
                                                <input type="number" class="form-control" id="available_qty" placeholder="Available Quantity" value="<?=$book_info_row['available_qty'] ?>" required name="available_qty">
                                        </div>
                                        <div class="form-group">
                                            <label for="book_purchase_date">Purchase Date</label>
                                                <input type="date" class="form-control" id="book_purchase_date" placeholder="Purchase Date" value="<?=$book_info_row['book_purchase_date'] ?>" required name="book_purchase_date">
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" name="update-book" class="btn btn-primary" onclick="return confirm('Are you sure to update this book?')"><i class="fa fa-save"></i> Update</button>
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
if (isset($_POST['update-book'])) {
    $ISBN = $_POST['ISBN'];
    $book_name = $_POST['book_name'];
    $book_edition = $_POST['book_edition'];
    $book_author_name = $_POST['book_author_name'];
    $book_publisher = $_POST['book_publisher'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $book_purchase_date = $_POST['book_purchase_date'];
    $libraian_username= $_SESSION['libraian_username'];

     mysqli_query($con,"UPDATE `books` SET `book_name`='$book_name',`book_edition`='$book_edition',`book_author_name`='$book_author_name',`book_publisher`='$book_publisher',`book_price`='$book_price',`book_qty`='$book_qty',`available_qty`='$available_qty',`book_purchase_date`='$book_purchase_date',`libraian_username`='$libraian_username' WHERE `ISBN`='$ISBN'");

if($result) {
    ?>
    <script type="text/javascript">
        alert('Book Updated Successfully!');
        javascript:history.go(-1);
    </script>
    <?php

   }else{
     ?>
    <script type="text/javascript">
        alert('Book not Updated!');
    </script>
    <?php
}

}

?>

<?php
require_once 'footer.php';
?>




