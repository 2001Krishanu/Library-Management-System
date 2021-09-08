<!DOCTYPE html>
<html>
<head>
    <title>LMS</title>
    <link rel="stylesheet" type="text/css" href="Style\vendor\bootstrap\css\bootstrap">
    <style type="text/css">
    span{
    text-decoration: none;
	background-color: #ff6060;
	padding:5px 15px;
	border-radius: 1000px;
	font-weight: 100;
	color: white;
	margin-left: 1px;
}
    </style>
</head>
<body>
 
      <div class="container">
    	<h1>Welcome To<br> 
    	<strong><a href="index.php" style="text-decoration: none"><span style="background-color: #FA7D08;">Library Management System</span></a></strong></h1>

    	<video id="video-bg-elem" style="width: 100%;" preload="auto" autoplay="true" loop="loop" muted="muted">
    		<source src="Library.mp4" type="video/mp4">
    		
    	</video>
        <div class="row">   
        	<tr><td colspan="2" align="center" style="height: 30px">
			<marquee WIDTH="100%" BEHAVIOR="ALTERNATE"><strong><font color="#990066"><span style="font-size: 18pt">
				 ** Please choose in which field you are- <font color="green">To Continue</font> **</span></font></strong> </marquee>
			<strong><font color="#990066"></font></strong>
		</td></tr>
        <div class="col-sm-4 col-sm-offset-4">
           <a class="btn btn-primary btn-block" href="librarian/lib_sign-in.php">Librarian</a>
           <a class="btn btn-primary btn-block" href="student/sign-in.php"> Students</a>
           <a class="btn btn-primary btn-block" href="member/Mem_sign-in.php"> Member</a>
        </div>

       </div>
    </div>
    <br>

 
</body>
</html>