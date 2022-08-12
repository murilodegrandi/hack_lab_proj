<?php

session_start();


if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
		header ("Location: index.php");
}

?>


<?php

function validate_input($data) {
  	$result = "127.0.0.1";
  	if (filter_var($data, FILTER_VALIDATE_IP)) {
  		return $data;
	} else {
  		return $result;
	} 
  
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
 $ping_host = validate_input($_POST["target"]);  	
 echo "<h2>Your Results for " . $ping_host . "</h2>";
 $output = shell_exec('ping -c 3 ' . $ping_host);  
 echo "<pre>$output</pre>";
 echo "<br><br>";

}
?>


<!DOCTYPE html>
<html>
<body>

<h2>Check Connectivity</h2>

<form method="post" action="exec_fixed.php">  
  Target*: <input type="text" name="target" value="127.0.0.1">
  <br><br>
  <p><span class="error">* required field</span></p>
  <input type="submit" name="submit" value="Submit">  
</form>
<br>
Click here to logout <a href = "logout.php" title = "Logout">Session</a>.
</body>
</html> 