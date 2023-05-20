<?php
	
	include "connect.php";
    include("vendor/autoload.php");

     use Helpers\Auth;
     $auth=Auth::check();
	?>
<!DOCTYPE html>
<html>
<head>
	<title>
		Admin Menu
	</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">

<script type="text/javascript" src="style/jquery.min.js"></script>
<script type="text/javascript" src="style/popper.min.js"></script>
<script type="text/javascript" src="style/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/icon/css/font-awesome.min.css"/>
</head>
<body>


<body id="body">
	<br>
<div class="container top">
	
    	<div class="row">
 <table class="table  table-hover " width="100%" height="auto">
  				<tr class="table-secondary table-bordered ">
   				 	<th style="text-align: center;">No</th>
    				<th style="text-align: center;">User Name</th>
   				 	<th style="text-align: center;">Email</th>
   				 	<th style="text-align: center;">Subject</th>
  				  	<th style="text-align: center;">Message</th>
  				</tr>
  
  	<?php
  	
  	$feedback=mysqli_query($connection,"select * from feedback order by feedback_id asc");

		while($out=mysqli_fetch_array($feedback))
		{	
		   
		   $show='<tr  class="table table-hover">' ;
           $show.='<td style="text-align: center;">'.$out['feedback_id'].'</td>';
		   $show.='<td style="text-align: center;">'.$out['name'].'</td>';	
		   $show.='<td style="text-align: center;">'.$out['email'].'</td>';	  
		   $show.='<td style="text-align: center;">'.$out['subject'].'</td>';
		   $show.='<td>'.$out['message'].'</td>';
		   $show.='</tr>';
		   
		 	echo $show; 
		 }
  	?>
</table>



</body>
</html>