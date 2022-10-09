<?php

session_start();


if (!(isset($_SESSION['username']) && $_SESSION['username'] != '')) {
		header ("Location: index.php");
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Armoured DevSec APP</title>
    <link href = "styles-exec.css" rel = "stylesheet">
</head>
<body>
    <header>
        <h1>Reachability Check</h1>
    </header>
    <form method="post" action="exec.php">  
      Target*: <input type="text" name="target" placeholder="142.250.66.206 or google.com">
      <p><span class="error">* required field</span></p>
      <input type="submit" name="submit" value="Submit">  
    </form>

    <div class="results">

<!-- Challenge 5: Remediate OS Command Execution and Reflected Cross Site Scripting (XSS) flaws by implementing input validation on 
the piece of code between START-END -->
<!-- START -->
<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h2>Your Results for " . $_POST["target"] . "</h2>";
            $output = shell_exec('ping -c 3 ' . $_POST["target"]);  
            echo "<pre>$output</pre>";
            echo "<br><br>";
}

?>

<!-- END -->

    </div>
    <a href = "index.php">Logout Session</a>

</body>
</html> 