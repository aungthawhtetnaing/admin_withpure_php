<?php
  
  include "connect.php";
   include'function.php'; 
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

<?php
if(isset($_POST['add_user']))
{
  add_user();
}
if(isset($_GET['action']) && $_GET['action'] == 'delete')
  {
      del_delivery();
  }
?>

<div class="container">
<div class="row">
        
        <div class="container">
          <div class="row">

<table width="100%" height="auto" border="0" >
  <tr>
    <td colspan='7' align="right">
            <a href="add_deliverystaff.php" class="btn btn-success">
                  <span class="fa fa-plus"></span>  
                      Add Delivery Staff
            </a>
    </td>
    
  </tr>

  <tr class="table-secondary table-bordered " style="color: black"  >
    <td style="text-align:center;font-weight:bold;padding:1rem;">Delivery ID</td>
    <td style="text-align:center;font-weight:bold;padding:1rem;">Delivery Name</td>
    <td style="text-align:center;font-weight:bold;padding:1rem;">Phone</td>
    <td style="text-align:center;font-weight:bold;padding:1rem;">Address</td>
    <td style="text-align:center;font-weight:bold;padding:1rem;">Action</td>
  </tr>

  <?php  
            $query="select * from delivery order by delivery_id asc";
            $go_query=mysqli_query($connection,$query);
            while($row=mysqli_fetch_array($go_query)){
              $delivery_id=$row['delivery_id'];
              $delivery_name=$row['delivery_name'];
              $phone=$row['phone'];
              $address=$row['address'];
              echo "<tr class='table table-hover'>";
              echo "<td style='text-align: center;'>{$delivery_id}</td>";
              echo "<td style='text-align: center;'>{$delivery_name}</td>";
              echo "<td style='text-align: center;'>{$phone}</td>";
              echo "<td style='text-align: center;'>{$address}</td>";
              echo "<td >&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a  href='deliverystaff_list.php?action=delete&delivery_id={$delivery_id}' class='fa fa-trash'onclick=\"return confirm('Are You Sure?')\"> </a>
          </td>";         
              echo "</tr>";
              }    
  
  ?>
</table>
</div>
        </div>
        </div>
        
 </div>          

</body>
</html>