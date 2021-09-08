<?php require_once 'header.php';

if (isset($_POST['send_msg'])) {
    # code...
     $dusername = $_POST['dusername'];
    $title = $_POST['title'];
    $msg = $_POST['msg'];

    $res=mysqli_query($con, "INSERT INTO `message`(`susername`, `dusername`, `title`, `msg`, `msg_read`) VALUES ('$student_login','$dusername','$title','$msg','unread')");
if ($res) {
    # code...
     ?>
    <script type="text/javascript">
        alert("Message Send Successfully");
    </script>
    <?php
}else{
       ?>
    <script type="text/javascript">
        alert("Message Not Send-Error!");
    </script>
    <?php
}
   
}


 ?>

    <div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="index.php">Dashboard</a></li>
                <li><a href="">Message</a></li>
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

          <div class="x_title">
              <h3 style="text-align: left;"><b><u>Send Message To Libraian</u></b></h3>

             <div class="clearfix"></div>   
          </div>
          <div class="x_content">
            <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data">
                     <div class="form-group">
                                <label for="dusername" class="col-sm-4 control-label">Send To</label>
                                <div class="col-sm-8">
                                    <select class="form-control" name="dusername">
                                        <option value="">Select</option>
                                        <?php
                                        $result=mysqli_query($con, "SELECT * FROM `libraian`");
                                        while ($row=mysqli_fetch_array($result)) {
                                            ?><option>
                                                <?php echo $row['username']; ?>
                                            </option><?php
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div> 
                      <div class="form-group">
                                <label for="title" class="col-sm-4 control-label">Title</label>
                                <div class="col-sm-8">
                                    <input type="text" class="form-control" name="title" placeholder="Enter Title">
                                </div>
                        </div>
                          <div class="form-group">
                                <label for="msg" class="col-sm-4 control-label">Enter Message</label>
                                <div class="col-sm-8">
                                   <textarea name="msg" class="form-control" placeholder="Write something"></textarea>
                                </div>
                        </div>
                          <div class="form-group">
                                <div class="col-sm-offset-4 col-sm-8">
                                    <button type="submit" name="send_msg" class="btn btn-primary"><i class="fa fa-send"></i> Send</button>
                                </div>
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



<?php require_once 'footer.php'; ?>