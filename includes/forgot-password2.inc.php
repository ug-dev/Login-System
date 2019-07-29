<?php
    session_start();

    if(isset($_POST['submit'])) {
        $otp_check = $_POST['ONE'];

            if($otp_check == $_COOKIE['otp']) {
              $_SESSION['check2'] = 1;
            	header("Location: ../forgot-password3.php?otp=success");
            	exit();
          	}
          	else {
          		header("Location: ../forgot-password.php?login=otp");
           		exit();
          	}
    }