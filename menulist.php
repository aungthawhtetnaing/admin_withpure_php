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
  img{
    border-radius:20%;
  }
  a{
    text-decoration: none;
    color:#550000;
  }
</style>

<?php
  if(isset($_POST['add_menu']))
  {
    add_menu();
  }

    if(isset($_POST['del_menu']))
  {
    del_menu();
  }

?>
</head>
<body>
      
              <table class="table  table-striped  table-dark" style="width: 100%;text-align: center;">
                <tr>
                  <td colspan='7' align="right" ><a href="menu_add.php" class="btn btn-success"> <span class="fa fa-plus"></span>&nbsp;Add Product</a></td>
                </tr>
                  <tr>
                      <td>Photo</td>
                      <td>ID</td>
                      <td>Name</td>
                      <td>Price</td>
                      <td>Action</td>
                    </tr>
                    <?php
                      if(isset($_GET['action'])&& $_GET['action']=='delete'){
                      del_menu();}
                      $query="select * from menu order by product_id desc";
                      $go_query=mysqli_query($connection,$query);
                      while($row=mysqli_fetch_array($go_query))
                      {
                        $product_id=$row['product_id'];
                        $product_name=$row['product_name'];

                        $price=$row['price'];
                        $photo=$row['photo'];
                        echo"<tr>";
                        echo"<td><img src='photo/{$photo}'width='100'height='100' border-radius='50%'></td>";
                        echo"<td>{$product_id}</td>";
                        echo"<td>{$product_name}</td>";
                        echo"<td>{$price}&nbsp;Ks</td>";
                        echo"<td><a href='menulist.php?action=delete&p_id={$product_id}'class='fa fa-trash' onclick=\"return confirm('Are You Sure?')\"></a>||
                        <a href='edit.php?action=edit&p_id={$product_id}'class='fa fa-edit' ></a></td>";
                        echo"</tr>";
                      }
                    ?>


              </table>
      
</div>
</body>
</html>