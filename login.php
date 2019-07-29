<?php
	include_once 'header.php';

?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Login</h2>
		<form class="signup-form" action="includes/login.inc.php" method="POST">
			<input type="text" name="uid" placeholder="Username/E-mail" required>
			<input type="password" name="pwd" placeholder="Password" required>
			<button type="submit" name="submit">Login</button>
			<p><a id="umg" href="forgot-password.php">Forgot password?</a></p>
		</form>
		<?php
		if (!isset($_GET['login'])) {
				exit();
			}
			else {
				$signupCheck = $_GET['login'];

				if  ($signupCheck == "empty") {
					echo "<h3 class='smg'>Please fill out all fields!</h3>";
					exit();
				}
				elseif  ($signupCheck == "invalid") {
					echo "<h3 class='smg'>Invalid username and password!</h3>";
					exit();
				}
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
