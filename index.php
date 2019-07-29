<?php
	include_once 'header.php';
  include_once 'includes/dbh.inc.php';
?>

<section class="main-container">
	<div class="main-wrapper">
		<?php
			if (isset($_SESSION['uid'])) {
        echo '
                    <table>
                        <tr>
                          <th>Firstname</th>
                          <td>'.$_SESSION['first'].'</td>
                        </tr>
                        <tr>
                          <th>Lastname</th>
                          <td>'.$_SESSION['last'].'</td>
                        </tr>
                        <tr>
                          <th>Email</th>
                          <td>'.$_SESSION['email'].'</td>
                        </tr>
                        <tr>
                          <th>Username</th>
                          <td>'.$_SESSION['uid'].'</td>
                        </tr>
                    </table>
              ';
			}
			else {
				echo "<h3 id='ug'>Welcome to the <strong>UG</strong>'s Login System..</h3>";
			}
		?>
	</div>
</section>

<?php
	include_once 'footer.php';
?>
