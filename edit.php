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
  <style>
  #lable{
  font-family:Brush Script Std;
  font-size:28px;
  color:black;
  }
</style>
</style>
</head>
<body style="background-color:#efefef">
  <?php
  if(isset($_POST['update_menu']))
  {
    update_menu();
  }
?>

<div class="container">
  <?php
   if(isset($_GET['action'])&&$_GET['action']=='edit')
      {
        $p_id=$_GET['p_id'];
        $query="select * from menu where product_id='$p_id'";
        $go_query=mysqli_query($connection,$query);
        while($row=mysqli_fetch_array($go_query))
        {
          $product_id=$row['product_id'];
          $product_name=$row['product_name'];
          $product_cat_id=$row['cat_id'];
          $price=$row['price'];
          $photo=$row['photo'];
        }
      }

   ?>

              <h3 style="text-align: center;margin-top: 20px;"><span class="fas fa-plus"><b>Edit Menu</b></span></h3>

              <br>
  
              <form action="" method="post" enctype="multipart/form-data">

                  <div class="form-group">
                      <label id="lable">Product Name</label>
                        <input type="text" name="product_name" class="form-control" value="<?php echo $product_name ;?>"/>
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
                                      if($product_cat_id==$cat_id)
                                      { 
                                        echo "<option value={$cat_id} selected>{$cat_name}</option>";
                                      }
                                      else 
                                      {echo"<option value={$cat_id}>{$cat_name}</option>";
                                      }
                                      }
                                    
                                  ?>
                              </select>
                        </div><!--formgp-->
                          
                  <div class="form-group">
                      <label id="lable">Price</label>
                        <input type="text" name="price" class="form-control" value="<?php echo  $price;?>"/>
                    </div><!--formgp-->
                    
                    
                    <div class="form-group">
                      <label id="lable">File Input</label>
                        <input type="file" name="photo"  value="<?php echo $photo;?>"/>
                        <img src="photo/<?php echo $photo?>" width="100" height="100" />
                    </div><!--formgp-->
                    
                     <div class="form-group">
                      <button type="submit" class="btn btn-success" value="Update Menu" name="update_menu">Update</button>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; 
                      <a href="menulist.php" style="text-decoration: none;color: black;">
                        <i class="fas fa-home"></i>
                        <b class="d-none d-lg-inline"> Back
                        </b>

                      </a>             
                     </div><!--formgp-->
                    
                </form>
            </div><!--col md 6-->
        </div><!--row2-->
  


</div>


</body>
</html>