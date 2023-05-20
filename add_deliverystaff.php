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
<style type="text/css">


    .page {
            background:gray;
            display: flex;
            flex-direction: column;
            height: calc(100%);
            position: absolute;
            place-content: center;
            width: calc(100%  );
        }
        @media (max-width: 767px) {
            .page {
                height: auto;
                margin-bottom: -20px;
                padding-bottom: -20px;
            }
        }
   
    #box{
    border-radius: 17px;
     border: 1px solid white;

 
    }
    #box1{
        border: 1px solid white;
    }
    .title{
        margin-left: 400px;
        color: black;
        font-family:"Lucida Handwriting"
    }
  
    .end{
        text-align: center;
        color: black
    }
</style>
</head>
<body>
    <?php
    if(isset($_POST['register'])){
        $user_name=$_POST['username'];       
        $phone=$_POST['phone'];
        $address=$_POST['address'];
        $errors=array(
        'username'=>'',             
        'phone'=>'',
        'address'=>'');
    if($user_name==''){$errors['username']='User Name must br enter';}
    else{if(strlen($user_name)<3){$errors['username']='User Name need to be longer';}}
    if($phone==''){$errors['phone']='This field could not be empty Phone';}
    if($address==''){$errors['address']='This field could not be empty Address';}
    foreach($errors as $key=>$value){
        if(empty($value)){unset($errors[$key]);}
    }
    if(empty($errors)){
        add_delivery();
    }
}
    ?>

 <div class="page" style="background-color: #e5e5e5">
                                             
<div class="container " >
  <div class="row" >

<div class="col-lg-6 col-md-8 mx-auto">
<form method="post" class="form-horizontal" >

        <div class="form-group row">
        <label class="col-sm-5" ><i class="fa fa-user" style="font-size:20px;color: black"> &nbsp;Delivery Name</i></label>
        <div class="col-sm-12">
        <input type="text" name="username" class="form-control" id="box" value="<?php if(isset($user_name)){echo $user_name;}  ?>"/>
        <label class="text-danger"><?php echo isset($errors['username'])? $errors['username']:'';?></label>
        </div>
        </div>


        <div class="form-group row">
        <label class="col-sm-2" id="letter"><i class="fa fa-phone" style="font-size:20px">&nbsp;Phone</i></label>
        <div class="col-sm-12">
        <input type="text" name="phone" class="form-control" id="box" value="<?php echo isset($phone)?$phone:'' ?>"/>
        <label class="text-danger"><?php echo isset($errors['phone'])? $errors['phone']:'' ?></label>
        </div>
        </div>

        <div class="form-group row">
        <label class="col-sm-3" id="letter"><i class="fa fa-address-book" style="font-size:20px"> &nbsp;Address</i></label>
        <div class="col-sm-12">
        <textarea name="address" class="form-control" id="box1"><?php echo isset($address)?$address:'' ?></textarea>
        <label class="text-danger"><?php echo isset($errors['address'])?$errors['address']:''?></label>
        </div>
        </div>

<div class="form-group">
<div class=" col-sm-12">

<button type="submit" class="btn btn-success btn-lg btn-block"  name="register"  >Add Delivery Staff</button>
<br>
<div><a href="deliverystaff_list.php"> <p style="margin-left: 44%; font-size: 20px;color: black;text-decoration: none; "><i class=" fa fa-arrow-left"></i>&nbsp;Back</p></a></div>
</div>
</div>


</form>

</div><!--row end-->

            </div><!--container end-->
            <div >
        </div>       

</body>
</html>