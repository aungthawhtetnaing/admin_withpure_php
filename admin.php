<?php

include("vendor/autoload.php");

use Libs\Database\MySQL;
use Libs\Database\UsersTable;
use Helpers\Auth;

$table = new UsersTable(new MySQL());
$all = $table->getAll();

$auth = Auth::check();

?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Manage Users</title>
	

		<link rel="stylesheet" href="css/bootstrap.min.css">
		

</head>

<body>
	
			

		<table class="table table-striped table-bordered table-dark" >
			<tr>
				<th>ID</th>
				<th>Name</th>
				<th>Email</th>
				<th>Phone</th>
				<th>Role</th>
				<th>Actions</th>
			</tr>
			<?php foreach ($all as $user) : ?>
				<tr>
					<td><?= $user->id ?></td>
					<td><?= $user->name ?></td>
					<td><?= $user->email ?></td>
					<td><?= $user->phone ?></td>
					<td>
						<?php if ($user->value == '1') : ?>
							<span class="badge bg-warning">
								<?= $user->role ?>
							</span>
						<?php elseif ($user->value == '2') : ?>
							<span class="badge bg-primary">
								<?= $user->role ?>
							</span>
						<?php else : ?>
							<span class="badge bg-success">
								<?= $user->role ?>
							</span>
						<?php endif ?>
					</td>
					<td>
						<?php if ($auth->value > 0) : ?> <!-- value >1 for user
																	 3 for admin no create so use 0 -->
							<div class="btn-group dropdown">
								<a href="#" class="btn btn-sm btn-outline-primary dropdown-toggle" data-toggle="dropdown">
									Change Role
								</a>
								<div class="dropdown-menu dropdown-menu-dark">
									<a href="_actions/role.php?id=<?= $user->id ?>&role=1" class="dropdown-item">User</a>
									<a href="_actions/role.php?id=<?= $user->id ?>&role=2" class="dropdown-item">Manager</a>
									<a href="_actions/role.php?id=<?= $user->id ?>&role=3" class="dropdown-item">Admin</a>
								</div>

								<?php if ($user->suspended) : ?>
									<a href="_actions/unsuspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-danger">Suspended</a>
								<?php else : ?>
									<a href="_actions/suspend.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-success">Active</a>
								<?php endif ?>

								<?php if ($user->id !== $auth->id) : ?>
									<a href="_actions/delete.php?id=<?= $user->id ?>" class="btn btn-sm btn-outline-danger" onClick="return confirm('Are you sure?')">Delete</a>
								<?php endif ?>
							</div>
						<?php else : ?>
							###
						<?php endif ?>
					</td>
				</tr>
			<?php endforeach ?>
		</table>
	

	<script src="js/bootstrap.bundle.min.js"></script>
</body>

</html>