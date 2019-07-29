<?php
	session_start();
?>

<!DOCTYPE html>
<html>
<head>
	<title>Login System</title>
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="shortcut icon" type="image/png" href="image/favicon.png">
</head>
<body>

<header>
	<nav>
		<div class="main-wrapper">
			<ul>
				<li><a href="index.php">Home</a></li>
				<li><a href="#">Portfolio</a></li>
				<li><a href="#">Contact</a></li>
			</ul>
			<div class="nav-login">
				
				<?php
					if (isset($_SESSION['uid'])) {
						echo ' 
						<form action="includes/logout.inc.php" method="POST">
									<button type="submit" title="Logout" name="submit">Logout</button>
							   </form> 
							   ';
					}
					else {
						echo '<form>
						<a href="login.php" id="login">Login</a>
							<button type="submit" formaction="signup.php">Signup</button>
							</form>';
					}
				?>
				
			</div>
		</div>
	</nav>
</header>
