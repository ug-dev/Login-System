<?php
  session_start();

	if (isset($_POST['submit'])) {

		include_once 'dbh.inc.php';

		$emailCheck = $_POST['email'];
    setcookie("email",$emailCheck);

		$sql = "SELECT * FROM users WHERE user_email = '$emailCheck'";
		$result = mysqli_query($conn, $sql);
 		$resultCheck = mysqli_num_rows($result);

    if ($resultCheck < 1) {
      header("Location: ../forgot-password.php?login=invalid");
      exit();
    }
    else {
      $row = mysqli_fetch_assoc($result);

      $OTP = mt_rand(100000, 999999);

      setcookie("otp",$OTP);
      setcookie("id",$row['user_id']);

      $to = $row['user_email'];
      $subject = "Account recovery";
      $txt = "<h1>Hello ".$row['user_first']."your OTP is '$OTP'.</h1>";
      $headers = "From: UG-info";

      if(mail($to,$subject,$txt,$headers)) {
        $_SESSION['check'] = 1;
        header("Location: ../forgot-password2.php?mail=success");
        exit();
      }
    }
	}
	else {
    	header("Location: ../forgot-password.php?login=error");
    	exit();
  	}