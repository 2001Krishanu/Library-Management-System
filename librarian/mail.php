<?php require_once 'header.php';
/*
$error='';
$email='';
$subject='';
$msg='';

function clean_text($string)
{
  $string = trim($string);
  $string = stripslashes($string);
  $string = htmlspecialchars($string);
  return $string;

}

if (isset($_POST['send_mail'])) {
  if (empty($_POST['email'])) {
  
    $error .= '<p> <label class="text-danger">Please Enter Sender Email address</label> </p>';
  }
  else{
    $email= clean_text($_POST['email']);
    if (!filter_var($email,FILTER_VALIDATE_EMAIL)) {
   
      $error .= '<p> <label class="text-danger">Invalid Email Format</label> </p>';
    }


  }
  if (empty($_POST['subject'])) {
  
    $error .= '<p> <label class="text-danger">Please Enter Subject</label> </p>';
  }
  else{
    $email= clean_text($_POST['subject']);
  }
    if (empty($_POST['msg'])) {
  
    $error .= '<p> <label class="text-danger">Message is required</label> </p>';
  }
  else{
    $email= clean_text($_POST['msg']);
  }

  if ($error != '') {

    require 'mail_system/class.phpmailer.php';
    $mail = new PHPMailer;
    $mail->IsSMTP();
    $mail->Host = 'smtpout.secureserver.net';
    $mail->Port = '80';
    $mail->SMTPAuth = true;
    $mail->Username = 'krishanughosh1234567@gmail.com';
    $mail->Password = 'pappu123456';
    $mail->SMTPSecure = '';// SSl or TSL
    $mail->From = $_POST['email'];
    

    $mail->WordWrap = 50;
    $mail->IsHTML(true);
    $mail->Subject = $_POST['subject'];
    $mail->Body = $_POST['msg'];

if ($mail->Send()) {
  # code...
      $error .= '<p> <label class="text-success">Mail send</label> </p>';

}
else{
      $error .= '<p> <label class="text-danger">There is an error</label> </p>';


}
$email = '';
$subject='';
$msg='';

    


  }
value="<?php echo $email; ?>"
value="<?php echo $subject; ?>"
<?php echo $msg; ?>
}*/

if(isset($_POST['send_mail'])){
  require 'mail_system/PHPMailerAutoload.php';
  //require 'credential.php';

$mail = new PHPMailer;

$mail->SMTPDebug = 4;                               // Enable verbose debug output

$mail->isSMTP();                                      // Set mailer to use SMTP
$mail->Host = 'smtp.gmail.com';  // Specify main and backup SMTP servers
$mail->SMTPAuth = true;                               // Enable SMTP authentication
$mail->Username = 'krishanughosh1234567@gmail.com';                 // SMTP username
$mail->Password = 'pappu123456';                           // SMTP password
$mail->SMTPSecure = 'TLS';                            // Enable TLS encryption, `ssl` also accepted
$mail->Port = 587;                                    // TCP port to connect to

$mail->setFrom('krishanughosh1234567@gmail.com');
$mail->addAddress($_POST['email']);     // Add a recipient
//$mail->addAddress('ellen@example.com');               // Name is optional
$mail->addReplyTo('krishanughosh1234567@gmail.com');


//$mail->addAttachment('/var/tmp/file.tar.gz');         // Add attachments
//$mail->addAttachment('/tmp/image.jpg', 'new.jpg');    // Optional name
$mail->isHTML(true);                                  // Set email format to HTML

$mail->Subject = $_POST['subject'];
//$mail->Body    = 'This is the HTML message body <b>in bold!</b>';
$mail->Body    =  $_POST['msg'];
//$mail->AltBody = $_POST['msg'];

if(!$mail->send()) {
    echo 'Message could not be sent.';
    echo 'Mailer Error: ' . $mail->ErrorInfo;
} else {
    echo 'Message has been sent';
}


}

?>
<div class="content-header">
        <!-- leftside content header -->
        <div class="leftside-content-header">
            <ul class="breadcrumbs">
                <li><i class="fa fa-home" aria-hidden="true"></i><a href="#">Dashboard</a></li>
                <li><a href="#">Mail Box</a></li>
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
             <h3 style="text-align: left;"><b><u>Send Mail To Students</u></b></h3>

            <div class="clearfix"></div>
            <!--<?php echo $error; ?>-->
         </div>
         <div class="x_content">
           <form class="form-horizontal" action="" method="post"  enctype="multipart/form-data">
                    <div class="form-group">
                               <label for="receiver" class="col-sm-4 control-label">Send To</label>
                               <div class="col-sm-8">
                                   <input type="email" class="form-control" id="email" name="email" placeholder="Recepient">
                               </div>
                           </div>
                     <div class="form-group">
                               <label for="subject" class="col-sm-4 control-label">Subject</label>
                               <div class="col-sm-8">
                                  <input type="text" class="form-control" name="subject" placeholder="Enter Subject">
                               </div>
                       </div>
                         <div class="form-group">
                               <label for="msg" class="col-sm-4 control-label">Enter Message</label>
                               <div class="col-sm-8">
                                  <textarea name="msg" class="form-control" placeholder="Write something"></textarea>
                               </div>
                       </div>
                      <!-- <div class="form-group">
                             <label for="file" class="col-sm-4 control-label">Select File</label>
                             <div class="col-sm-8">
                                <input type="file" class="form-control" name="file">
                             </div>
                     </div>-->
                         <div class="form-group">
                               <div class="col-sm-offset-4 col-sm-8">
                                   <button type="submit" name="send_mail" class="btn btn-primary"><i class="fa fa-send"></i> Send Mail</button>
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
