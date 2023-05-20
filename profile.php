<?php 
include("vendor/autoload.php");

use Helpers\Auth;

$auth=Auth::check();

?>

<!DOCTYPE html>
<html>
<head>
	<title>Profile</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<style>
		body{
			width: 100%;
			max-width: 700px;
			margin: 40px auto;
		}
		.img{
			border-radius: 50%;
			width: 120px;
			height: 120px;
		}
		
	</style>
</head>
<body class="bg-dark">
	<div class="container bg-dark">
		<h1 class="mt-5 mb-5 " >

			<?= $auth->name ?>
			<span class="fw-normal text-muted">
				(<?= $auth->role ?>)
			</span>
		</h1>
		
		<?php if(isset($_GET['error'])) : ?>
			<div class="alert alert-danger">
				Cannot upload file
			</div>
		<?php endif ?>

		<?php if($auth->photo) : ?>
			<img class="img-thumbnail mb-3 img"
			 src="_actions/photos/<?= $auth->photo ?>"
				alt="Profile photo" width="200" >
		<?php endif ?>

		<form action="_actions/upload.php" method="post" enctype="multipart/form-data">
			<div class="input-group mb-3">
				<input type="file" name="photo" class="form-control">
				<button class="btn btn-secondary">Upload</button>
			</div>
		</form>


		<ul class="list-group">
			<li class="list-group-item">
				<b>Email:</b><?= $auth->email ?>
			</li>
			<li class="list-group-item">
				<b>Phone:</b><?= $auth->phone ?>
			</li>
			<li class="list-group-item">
				<b>Address:</b><?= $auth->address ?>
			</li>

		</ul>

		<br>

		<a href="dashboard.php">Dashboard</a> |
		<a href="_actions/logout.php" class="text-danger">Logout</a>



	</div>

</body>
</html>