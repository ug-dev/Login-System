<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h3>Account recovery</h3>
			<form class="signup-form" action="includes/forgot-password.inc.php" method="POST">
			<input type="text" name="email" placeholder="E-mail" required>
			<button type="submit" name="submit">Send</button>
			<?php
				if (!isset($_GET['login'])) {
					exit();
				}
				else {
					$signupCheck = $_GET['login'];

					if  ($signupCheck == "invalid") {
						echo "<h3 class='smg'>Invalid email!</h3>";
						exit();
					}
					else if ($signupCheck == "otp") {
						echo "<h3 class='smg'>Invalid OTP!</h3>";
						exit();
					}
					else if ($signupCheck == "pwd") {
						echo "<h3 class='smg'>Password not matched!</h3>";
						exit();
					}
					else if ($signupCheck == "sql") {
						echo "<h3 class='smg'>SQL error!</h3>";
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
