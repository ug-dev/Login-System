<?php
	include_once 'header.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<h2>Signup</h2>
		<form class="signup-form" action="includes/signup.inc.php" method="POST">
			<input type="firstname" name="first" placeholder="Firstname" required>
			<input type="lastname" name="last" placeholder="Lastname" required>
			<input type="email" name="email" placeholder="E-mail" required>
			<input type="username" name="uid" placeholder="Username" required>
			<input type="password" name="pwd" placeholder="Password" required>
			<button type="submit" name="submit">Sign up</button>
		</form>
		<?php
			if (!isset($_GET['signup'])) {
				exit();
			}
			else {
				$signupCheck = $_GET['signup'];

				if  ($signupCheck == "empty") {
					echo "<h3 class='smg'>Please fill out all fields!</h3>";
					exit();
				}
				elseif  ($signupCheck == "invalid") {
					echo "<h3 class='smg'>Please enter valid Characters!</h3>";
					exit();
				}
				elseif  ($signupCheck == "email") {
					echo "<h3 class='smg'>Please enter another Email!</h3>";
					exit();
				}
				elseif  ($signupCheck == "username") {
					echo "<h3 class='smg'>Please enter another username!</h3>";
					exit();
				}
				elseif  ($signupCheck == "success") {
					echo "<h3 class='smg'>You have been signed up!</h3>";
					exit();
				}
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
