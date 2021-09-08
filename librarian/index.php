<?php
require_once 'header.php';
?>
                <!-- ========================================================= -->
                <div class="content-header">
                    <!-- leftside content header -->
                    <div class="leftside-content-header">
                        <ul class="breadcrumbs">
                            <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                        </ul>
                    </div>
                </div>
                <!-- =-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-=-= -->
                <div class="row animated fadeInUp">
                <div class="col-sm-12">   
                    <div class="row">
                        <!---total books----->    
                        <?php
                        $books=mysqli_query($con, "SELECT * FROM `books`");
                        $total_books = mysqli_num_rows($books);
                        $books_qty=mysqli_query($con, "SELECT SUM(`book_qty`) AS total FROM `books`");
                       $qty= mysqli_fetch_assoc($books_qty);
                        $books_a_qty=mysqli_query($con, "SELECT SUM(`available_qty`) AS total FROM `books`");
                       $qty_a= mysqli_fetch_assoc($books_a_qty);
                       

                        ?>
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="manage_book.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-book"></i> <?=  $total_books .' ('. $qty['total'] .'-'. $qty_a['total'].')';?></h1>
                                    <h4 class="subtitle color-darker-1">Total Books</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                    <!---total students----->    
                        <?php
                        $students=mysqli_query($con, "SELECT * FROM `students_reg`");
                        $total_students = mysqli_num_rows($students);
                        
                        ?>
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-2 color-light">
                            <a href="students.php">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $total_students; ?></h1>
                                    <h4 class="subtitle color-darker-1">Total Students</h4>
                                </div>
                            </a>
                        </div>
                    </div>
                     <!---total libraian----->    
                        <?php
                        $libraian=mysqli_query($con, "SELECT * FROM `libraian`");
                        $total_libraian = mysqli_num_rows($libraian);
                        
                        ?>
                    <!--BOX Style 1-->
                    <div class="col-sm-6 col-md-4 col-lg-3">
                        <div class="panel widgetbox wbox-1 bg-lighter-1 color-light">
                            <a href="">
                                <div class="panel-content">
                                    <h1 class="title color-darker-2"> <i class="fa fa-users"></i> <?= $total_libraian; ?></h1>
                                    <h4 class="subtitle color-darker-1">Total Libraian</h4>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!---books----slideshow-----> <!---books----slideshow-----> <!---books----slideshow----->


                    
                 
 <!---books----slideshow-----> <!---books----slideshow-----> <!---books----slideshow-----> <!---books----slideshow----->
                </div>
                    </div>
            </div>
<?php
require_once 'footer.php';
?>

            

