<?php

session_start();


if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
		header ("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<body>

<h1>Homepage</h1>

<?php 
echo 'Welcome to the HomePage';
?>
<br>
<br>
Click check connectivity <a href = "exec.php" title = "Exec">here </a>
<br>
<br>
<br>
Click here to logout <a href = "logout.php" title = "Logout">Session</a>.
</body>
</html> 