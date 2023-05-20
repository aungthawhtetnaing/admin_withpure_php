<?php
	session_start();
	
	include("../vendor/autoload.php");

	use Libs\Database\MySQL;
	use Libs\Database\UsersTable;
	use Helpers\HTTP;
	
	$email = $_POST['email'];
	$password = md5( $_POST['password'] );
	$suspended=$_POST['suspended'];

	$table=new UsersTable(new MySQL());

	$user= $table->findByEmailAndPassword($email,$password);


	if($user->value == '3'){

		if($table->suspended($user->id)){
			HTTP::redirect("/index.php","suspended=1");

		}
		$_SESSION['user']=$user;
		HTTP::redirect("/dashboard.php");//change location

	}else{
		HTTP::redirect("/index.php","incorrect=1");
	}



 