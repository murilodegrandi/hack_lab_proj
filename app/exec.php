<?php

session_start();


if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
		header ("Location: index.php");
}

?>


<?php

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 echo "<h2>Your Results for " . $_POST["target"] . "</h2>";
 $output = shell_exec('ping -c 3 ' . $_POST["target"]);  
 echo "<pre>$output</pre>";
 echo "<br><br>";

}
?>


<!DOCTYPE html>
<html>
<body>

<h2>Check Connectivity</h2>

<form method="post" action="exec.php">  
  Target*: <input type="text" name="target" value="127.0.0.1">
  <br><br>
  <p><span class="error">* required field</span></p>
  <input type="submit" name="submit" value="Submit">  
</form>
<br>
Click here to logout <a href = "logout.php" title = "Logout">Session</a>.
</body>
</html> 