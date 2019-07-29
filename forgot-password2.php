<?php
	include_once 'header.php';
	if (!isset($_SESSION['check'])) {
		header("Location: forgot-password.php");
		exit();
	}
?>

<section class="main-container">
	<div class="main-wrapper">
		<h3>Account recovery</h3>
      	<form class="signup-form" action="includes/forgot-password2.inc.php" method="POST">
      		<input type="text" name="ONE" placeholder="OTP" required>
      		<button type="submit" name="submit">Send</button>
      	</form>
			<?php
				if (!isset($_GET['otp'])) {
					exit();
				}
				else {
					$signupCheck = $_GET['otp'];

					if  ($signupCheck == "invalid") {
						echo "<h3 class='smg'>Invalid OTP!</h3>";
						exit();
					}
				}
			?>
		</form>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
