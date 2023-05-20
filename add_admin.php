<?php
	
	include "connect.php";
    include("vendor/autoload.php");

     use Helpers\Auth;
     $auth=Auth::check();
	?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Bootstrap Admin</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/fontawesome-all.min.css">

<script type="text/javascript" src="style/jquery.min.js"></script>
<script type="text/javascript" src="style/popper.min.js"></script>
<script type="text/javascript" src="style/bootstrap.min.js"></script>
<link rel="stylesheet" type="text/css" href="style/icon/css/font-awesome.min.css"/>
<style>
	#bg{

		border:1px solid #fff;

	}
	.img{
			border-radius: 50%;
			width: 40px;
			height: 40px;
		}

	#org{
      height: 0;
      overflow: hidden;
    }

	:root {
    --time-slot-length: 0.1s;
    --t1x: var(--time-slot-length);
    --t2x: calc(var(--time-slot-length) * 2);
    --t3x: calc(var(--time-slot-length) * 3);
    --t4x: calc(var(--time-slot-length) * 4);
    --color: #00ffbf;
}

#box  {
    padding: px;
}

#box a {
    color: black; 
    box-sizing: border-box;
    border: 0.5px solid rgba(255, 255, 255, 0.2);
    border-radius: 0.1em;
    position: relative;
    transition: var(--t4x); /* duration 4x */
    margin: 0rem;

}

#box a:hover {
    color: var(--color);
    animation: pulse ease-out 1s var(--t4x); /* delay 4x */
  
	background:no-repeat;
    color: black;
}

#box a::before,
#box a::after {
    content: '';
    position: absolute;;
    width: 0;
    height: 0;
    border-radius: inherit;
    visibility: hidden;
}

#box a::before {
    top: -1px;
    left: -1px;
    border: 1px solid;
    border-color: var(--color) var(--color) transparent transparent;
    transition:
        height linear var(--t1x) var(--t2x), /* delay 2x */
        width linear var(--t1x) var(--t3x), /* delay 3x */
        visibility 0s var(--t4x); /* delay 4x */
}

#box a::after {
    bottom: 1px;
    right: 1px;
    border: 1px solid;
    border-color: transparent transparent var(--color) var(--color);
    transition:
        height linear var(--t1x),
        width linear var(--t1x) var(--t1x), /* delay 1x */
        visibility 0s var(--t2x);  /* delay 2x */
}

#box a:hover::before,
#box a:hover::after {
    width: 100%;
    height: 100%;
    visibility: visible;
}

#box a:hover::before {
    transition:
        visibility 0s,
        width linear var(--t1x),
        height linear var(--t1x) var(--t1x); /* delay 1x */
}

#box a:hover::after {
    transition: 
        visibility 0s var(--t2x), /* delay 2x */
        width linear var(--t1x) var(--t2x), /* delay 2x */
        height linear var(--t1x) var(--t3x); /* delay 3x */
}

@keyframes pulse {
    from {
        /* hsl(210, 100%, 56%) == dodgerblue */
        box-shadow: 0 0 hsla(210, 100%, 56%, 0.5);
    }

    to {
        box-shadow: 0 0 0 1em hsla(210, 100%, 56%, 0);
    }
}
</style>
</head>
<body>
	<div class="container-fluid bg-dark " id="bg">
		<div class="row g-0" >	<!-- Wrapper -->

			<nav class="col-2 bg-dark pr-3 border-right"> <!-- Left Side Nav -->

				<h1 class="h4 py-3 text-center text-primary">
					<i class="fas fa-ghost mr-2"></i>
					<span class="d-none d-lg-inline">HYPE ADMIN</span>
				</h1>
				
				<div class="list-group text-center bg-dark text-lg-left" >
					<span class="list-group-item disabled d-none d-lg-block">
						<small>CONTROLS</small>
					</span>

					<div id="box">
					<a href="dashboard.php" class="list-group-item list-group-item-action ">
						<i class="fas fa-home"></i>
						<b class="d-none d-lg-inline">Dashboard<span class="badge d-none d-lg-inline badge bg-success rounded-pill float-right">
											<?php
												$total="select id from users";
												$get_total=mysqli_query($connection,$total);
												$num=mysqli_num_rows($get_total);
												echo $num;
												?>
											</span>
						</b>
						
					</a>
					</div>

					<div id="box">
					<a href="add_admin.php" class="list-group-item list-group-item-action active">
						<i class="fas fa-user-circle"></i>
						<b class="d-none d-lg-inline"> Admin
							<span class="badge d-none d-lg-inline badge bg-success rounded-pill float-right">
											<?php
												$total="select * from users where role_id=3";
												$get_total=mysqli_query($connection,$total);
												$num=mysqli_num_rows($get_total);
												echo $num;
												?>
											</span>
						</b>
						
					</a>
					</div>

					<div id="box">
					<a href="category.php" class="list-group-item list-group-item-action">
						<i class="fas fa-list-ol"></i>
						<b class="d-none d-lg-inline">Category
							<span class="badge d-none d-lg-inline badge bg-success rounded-pill float-right">
											<?php
												$total="select cat_id from menucategory";
												$get_total=mysqli_query($connection,$total);
												$num=mysqli_num_rows($get_total);
												echo $num;
												?>
											</span>

						</b>
					</a>
					</div>

					<div id="box">
					<a href="menu.php" class="list-group-item list-group-item-action">
						<i class="fas fa-list"></i>
						<b class="d-none d-lg-inline">Menu
							<span class="badge d-none d-lg-inline badge bg-success rounded-pill float-right">
											<?php
												$total="select product_id from menu";
												$get_total=mysqli_query($connection,$total);
												$num=mysqli_num_rows($get_total);
												echo $num;
												?>
											</span>
						</b>
						
					</a>
					</div>
				</div>

				<div class="list-group mt-4 text-center text-lg-left">
					<span class="list-group-item disabled d-none d-lg-block">
						<small>ACTIONS</small>
					</span>
				<div id="box">
					<a href="order.php" class="list-group-item list-group-item-action">
						<i class="fas fa-envelope"></i>
						<b class="d-none d-lg-inline">Order
							<span class="badge d-none d-lg-inline badge bg-success rounded-pill float-right">
											<?php
												$total="select order_id from orders";
												$get_total=mysqli_query($connection,$total);
												$num=mysqli_num_rows($get_total);
												echo $num;
												?>
											</span>
						</b>
						
					</a>
				</div>

				<div id="box">
					<a href="delivery_staff.php" class="list-group-item list-group-item-action">
						<i class="fas fa-truck"></i>
						<b class="d-none d-lg-inline">Deliverystaff
							<span class="badge d-none d-lg-inline badge bg-success rounded-pill float-right">
											<?php
												$total="select delivery_id from delivery";
												$get_total=mysqli_query($connection,$total);
												$num=mysqli_num_rows($get_total);
												echo $num;
												?>
											</span>
						</b>
						
					</a>
				</div>

				<div id="box">
					<a href="feedback.php" class="list-group-item list-group-item-action">
						<i class="far fa-address-book"></i>
						<b class="d-none d-lg-inline">Feedback
						<span class="badge d-none d-lg-inline badge bg-success rounded-pill float-right">
											<?php
												$total="select feedback_id from feedback";
												$get_total=mysqli_query($connection,$total);
												$num=mysqli_num_rows($get_total);
												echo $num;
												?>
											</span></b>
						
					</a>
				</div>
				</div>

			</nav> <!-- Left Side Nav -->

			<main class="col-10 bg-dark"> <!-- Main (Top Nav & Content) -->

				
				<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
					<div class="flex-fill"></div>
					<div class="navbar nav">
						<li class="nav-item dropdown">
							<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">
								<?php if($auth->photo) : ?>
										<img class="img"
										 src="_actions/photos/<?= $auth->photo ?>"
											alt="Profile photo"  >
									<?php endif ?>
							</a>
							<ul class="dropdown-menu dropdown-menu-right">
								<li><a href="profile.php" class="dropdown-item">
								<span class="fas fa-user-circle">
								User Profile
								</span>
								</a>
								
								</li>
								<li><a href="_actions/logout.php" class="dropdown-item">
								<span class="fas fa-home">
								Logout
								</span>
								</a>

							</li>
							</ul>
						</li>
						
					</div>
				</nav>

				<div class="container-fluid  "> <!-- Content -->

					<div class="row mb-3">	<!-- Content Row 0 -->
						<div class="col">
							<div class="alert alert-info bg-light">
								<h3 style="color:black"> 
									<p id="org">HELLO, </p>
									 <b id="show"></b>
									 <span class="text-success">
	        								<?= $auth->name ?>
											
        							</span>
										  <script>
										    var org=document.getElementById('org').innerHTML;
										    var int=0;
										    function typewriter(){
										      var show=document.getElementById('show');
										      show.innerHTML+=org[int];
										      int++;
										      if(int==org.length){
										        clearInterval(stop);
										      }
										    }
										    var stop=setInterval(typewriter,200);
										  </script> 
        						</h3>
							</div>
						</div>
					</div>


						<div><h2 class="h6 text-white-50">ADD ADMINS</h2></div>
					<div class="row mb-3">	<!-- Content Row 0 -->
						<div class="col">
							<div class="alert alert-info bg-light" >
								<iframe src="admin_menu.php" frameborder="0"width="990px" height="550px" name="ouriframe" style="float:top" class="col-12"></iframe>
							</div>
						</div>
					</div>
					
			</main> <!-- Main (Nav & Content) -->
			
		</div> <!-- Wrapper -->
		

		<footer class="text-center py-4 text-muted bg-dark" >
			&copy; Copyright 2020
		</footer>
	</div>
	
	<script src="js/bootstrap.bundle.min.js"></script>
</body>
</html>