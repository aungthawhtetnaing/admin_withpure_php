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
<style>
  #lable{
  font-family:Brush Script Std;
  font-size:28px;
  color:black;
  }
</style>
</head>
<body>
<?php
  if(isset($_POST['add_menu']))
  {
    add_menu();
  }
?>

      <h3 style="text-align: center;margin-top: 20px;"><span class="fas fa-plus"><b>MENU ADD</b></span></h3>

              <br>
<div class="container"  style="background-color: #efefef;margin-top: 60px;">


     <div>
              <form action="" method="post" enctype="multipart/form-data">
                  <div class="form-group">
                      <label id="lable">Product Name</label>
                        <input type="text" name="product name" class="form-control" />
                    </div><!--formgp--> 
                  <div class="form-group">
                      <label id="lable">Category Name</label>
                        <select name="cat_id" class="form-control">
                          <?php 
                $query="select * from menucategory";
                $go_query=mysqli_query($connection,$query);
                while($row=mysqli_fetch_array ($go_query))
                {
                  $cat_id=$row['cat_id'];
                  $cat_name=$row['cat_name'];
                  { 
                    echo "<option value={$cat_id}>{$cat_name}</option>";
                  }
                }
              ?>
                        </select>
                    </div><!--formgp-->
                    
                  <div class="form-group">
                      <label id="lable">Price</label>
                        <input type="text" name="price" class="form-control"/>
                    </div><!--formgp-->
                    
                    
                    <div class="form-group">
                      <label id="lable">File Input</label>
                        <input type="file" name="photo"  />
                    </div><!--formgp-->
                    
                     <div class="form-group">
                      <button type="submit" class="btn btn-success" name="add_menu">Submit</button>
                       <a href="menulist.php" style="text-decoration: none; color: black;">
                        <i class="fas fa-home"></i>
                        <b class="d-none d-lg-inline"> Back
                        </b>

                      </a>                     
                     </div><!--formgp-->
                    
                </form>
                </div><!--col-->
  

</div>


</body>
</html>