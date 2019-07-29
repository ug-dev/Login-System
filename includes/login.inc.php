<?php

  session_start();

  if (isset($_POST['submit'])) {

      include_once 'dbh.inc.php';

      $uid = mysqli_real_escape_string($conn, $_POST['uid']);
      $pwd = mysqli_real_escape_string($conn, $_POST['pwd']);

      //Error handlers
      //Check if input are empty
      if (empty($uid) or empty($pwd)) {
        header("Location: ../login.php?login=empty");
        exit();
      }
      else {
        $sql = "SELECT * FROM users WHERE user_uid = '$uid' OR user_email = '$uid'";
        $result = mysqli_query($conn, $sql);
        $resultCheck = mysqli_num_rows($result);

        if ($resultCheck < 1) {
          header("Location: ../login.php?login=invalid");
          exit();
        }
        else {
          if ($row = mysqli_fetch_assoc($result)) {
            //De-hasing the password
            $hashedPwdCheck = password_verify($pwd, $row['user_pwd']);
            if ($hashedPwdCheck == false) {
              header("Location: ../login.php?login=invalid");
              exit();
            }
            elseif ($hashedPwdCheck == true) {
              //Log in the user here
              $_SESSION['id']=$row['user_id'];
              $_SESSION['first']=$row['user_first'];
              $_SESSION['last']=$row['user_last'];
              $_SESSION['email']=$row['user_email'];
              $_SESSION['uid']=$row['user_uid'];
              header("Location: ../index.php?login=success");
              exit();
            }
          }
        }
      }
  }
  else {
    header("Location: ../index.php?login=error");
    exit();
  }
