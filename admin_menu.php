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

	
					<table width="100%" height="auto" border="0" style="background:lightblue;color:black; " class="bg-light"  >
  											<tr >
   												 <td colspan='7' align="right"><a href="register.php" class="btn btn-success"><span class="fa fa-plus"></span> Add Admin</a>
   												 </td>
    
  											</tr>
												<br>
												  <tr  style="color: black"   class="table-secondary table-bordered" >
												    <td style="text-align:center;font-weight:bold;padding:1rem">Admin ID</td>
												    <td style="text-align:center;font-weight:bold ;padding:1rem">Admin Name</td>
												    <td style="text-align:center;font-weight:bold ;padding:1rem">Email</td>
												    <td style="text-align:center;font-weight:bold;padding:1rem">Phone</td>
											  </tr>

  						<?php  
                    	$query="select * from users where role_id=3 order by id asc";
						$go_query=mysqli_query($connection,$query);
						while($row=mysqli_fetch_array($go_query)){
							$admin_id=$row['id'];
							$admin_name=$row['name'];
							$email=$row['email'];
							$phone=$row['phone'];
							echo "<tr class='table table-hover'>";
							echo "<td style='text-align: center;'>{$admin_id}</td>";
							echo "<td style='text-align: center;'>{$admin_name}</td>";
							echo "<td style='text-align: center;'>{$email}</td>";
							echo "<td style='text-align: center;'>{$phone}</td>";						
							echo "</tr>";
							}    
  
  ?>
</table>
	

</body>
</html>