<?php
	include_once 'dbh.inc.php';

	session_start();

if (isset($_POST['submit'])) {

	$first = mysqli_real_escape_string($conn, $_POST['first']);
	$last = mysqli_real_escape_string($conn, $_POST['last']);
	$email = mysqli_real_escape_string($conn, $_POST['email']);
	$uid = mysqli_real_escape_string($conn, $_POST['uid']);
	$pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

	//Error handlers
	//Check for empty feilds
	if (empty($first) or empty($last) or empty($email) or empty($uid) or empty($pwd)) {
		header("Location: ../signup.php?signup=empty");
		exit();
	}
	else {
		//Check if input characters are valid
		if (!preg_match("/^[a-z A-Z]*$/", $first) or !preg_match("/^[a-z A-Z]*$/", $last)) {
			header("Location: ../signup.php?signup=invalid");
			exit();
		}
		else {
			//Check if email is valid
			if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
				header("Location: ../signup.php?signup=email");
				exit();
			}
			else {
				$sql = "SELECT * FROM users WHERE user_uid = '$uid'";
				$result = mysqli_query($conn, $sql);
				$resultCheck = mysqli_num_rows($result);

				if ($resultCheck > 0) {
					header("Location: ../signup.php?signup=username");
					exit();
				}
				else {
					$sql = "SELECT * FROM users WHERE user_email = '$email'";
					$result = mysqli_query($conn, $sql);
					$resultCheck = mysqli_num_rows($result);

					if ($resultCheck > 0) {
						header("Location: ../signup.php?signup=email");
						exit();
					}
					//Hashing the password
					$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);
					//Insert the user into the database
					$sql = "INSERT INTO users (user_first, user_last, user_email, user_uid, user_pwd) VALUES ('$first', '$last', '$email', '$uid', '$hashedPwd');";
					mysqli_query($conn, $sql);
					
					$sql = "SELECT * FROM users WHERE user_uid = '$uid' AND user_first = '$first'";
      				$result = mysqli_query($conn, $sql);
      				$rowCheck = mysqli_fetch_assoc($result);

      				$_SESSION['id']=$rowCheck['user_id'];
              		$_SESSION['first']=$rowCheck['user_first'];
              		$_SESSION['last']=$rowCheck['user_last'];
              		$_SESSION['email']=$rowCheck['user_email'];
              		$_SESSION['uid']=$rowCheck['user_uid'];

      				if (mysqli_num_rows($result) > 0) {
      						$userID = $rowCheck['user_id'];
      						$sql = "INSERT INTO profileimg (user_id, status) VALUES ('$userID', 1)";
      						mysqli_query($conn, $sql);
      				}
              					
              		header("Location: ../index.php?signup=success");
             		exit();
				}
			}
		}
	}
}