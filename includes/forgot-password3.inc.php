<?php
	include_once 'dbh.inc.php';

	$pwd1 = $_POST['pwd1'];
	$pwd2 = $_POST['pwd2'];
	$hashedPwd = password_hash($pwd2, PASSWORD_DEFAULT);

	if($pwd1 != $pwd2) {
		header("Location: ../forgot-password3.php?login=pwd");
		exit();
	}
	else {
		$sql = "UPDATE users SET user_pwd = '$hashedPwd' WHERE user_id = ".$_COOKIE['id'];
		mysqli_query($conn, $sql);

    	header("Location: ../index.php?login=success");
      	exit();

	}