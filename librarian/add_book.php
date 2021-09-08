<?php
require_once 'header.php';

if (isset($_POST['save_book'])) {
    $book_name = $_POST['book_name'];
    $book_edition = $_POST['book_edition'];
    $book_author_name = $_POST['book_author_name'];
    $book_publisher = $_POST['book_publisher'];
    $book_price = $_POST['book_price'];
    $book_qty = $_POST['book_qty'];
    $available_qty = $_POST['available_qty'];
    $book_purchase_date = $_POST['book_purchase_date'];
   $libraian_username= $_SESSION['libraian_username'];
    $image = explode('.', $_FILES['book_image'] ['name']);
    $image_ext = end($image);

    $image = date('Ymdhis.') . $image_ext;
   $result= mysqli_query($con,"INSERT INTO `books`(`book_name`, `book_edition`, `book_image`, `book_author_name`, `book_publisher`, `book_price`, `book_qty`, `available_qty`, `book_purchase_date`, `libraian_username`) VALUES ('$book_name','$book_edition','$image','$book_author_name','$book_publisher','$book_price','$book_qty','$available_qty','$book_purchase_date','$libraian_username')");
   if ($result){

    
       move_uploaded_file($_FILES['book_image']['tmp_name'],'../images/books/'.$image);
       $success="Book added successfully";
   }
   else{
       $error="Book added unsuccessfull";
   }


}
?>
<!-- ========================================================= -->
<div class="content-header">
    <!-- leftside content header -->
    <div class="leftside-content-header">
        <ul class="breadcrumbs">
            <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
            <li><a href="javascript:avoid(0)">Add Book</a></li>

        </ul>
    </div>
</div>
<!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
<div class="row animated fadeInUp">
    <div class="col-sm-6 col-sm-offset-3">

        <?php
        if(isset($success)){
            ?>
            <div class="alert alert-success" role="alert">
                <?= $success?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
        ?>

        <?php
        if(isset($error)){
            ?>
            <div class="alert alert-danger" role="alert">
                <?= $error?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?php
        }
        ?>
        <div class="panel">
            <div class="panel-content">
                <div class="row">
                    <div class="col-md-12">
                        <form class="form-horizontal" action="" method="post" enctype="multipart/form-data">
                            <h5 class="mb-lg"><b>Add Book</b></h5>
                            <div class="form-group">
                                <label for="book_name" class="col-sm-4 control-label">Book Name</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="book_name" placeholder="Book Name" name="book_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_edition" class="col-sm-4 control-label">Book Edition</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="book_edition" placeholder="Book Edition" name="book_edition" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_image" class="col-sm-4 control-label">Book Image</label>
                                <div class="col-sm-8">
                                    <input type="file" id="book_image" name="book_image">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_author_name" class="col-sm-4 control-label">Author</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="book_author_name" placeholder="Author"  name="book_author_name" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_publisher" class="col-sm-4 control-label">Publisher</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" id="book_publisher" placeholder="Publisher"  name="book_publisher" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_price" class="col-sm-4 control-label">Price</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="book_price" placeholder="Price" required name="book_price">
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_qty" class="col-sm-4 control-label">Quantity</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="book_qty" placeholder="Quantity"  name="book_qty" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="available_qty" class="col-sm-4 control-label">Available Quantity</label>
                                <div class="col-sm-8">
                                    <input type="number" class="form-control" id="available_qty" placeholder="Available Quantity"  name="available_qty" required>
                                </div>
                            </div>
                            <div class="form-group">
                                <label for="book_purchase_date" class="col-sm-4 control-label">Purchase Date</label>
                                <div class="col-sm-8">
                                    <input type="date" class="form-control" id="book_purchase_date" placeholder="Purchase Date"  name="book_purchase_date" required>
                                </div>
                            </div>





                            <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" name="save_book" class="btn btn-primary"><i class="fa fa-save"></i> Save Book</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php
require_once 'footer.php';
?>




