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
    <link href = "css/styles3.css" rel = "stylesheet">
</head>
<body>
    <header>
        <h1>Reachability Check</h1>
    </header>
    <form method="post" action="exec.php">  
      Target*: <input type="text" name="target" value="127.0.0.1">
      <p><span class="error">* required field</span></p>
      <input type="submit" name="submit" value="Submit">  
    </form>

    <div class="results">


<!-- Test *TARGET field for OS Command Exec by sending "127.0.0.1;../../../../../../etc/passwd -->
<!-- Test *TARGET field for Reflected XXS by sending <script>alert("Vulnerable to XSS!");</script> -->

<!-- Challenge: Fix OS Command Execution + Reflected Cross Site Scripting (XSS) issues on the piece of code below. -->

<?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            echo "<h2>Your Results for " . $_POST["target"] . "</h2>";
            $output = shell_exec('ping -c 3 ' . $_POST["target"]);  
            echo "<pre>$output</pre>";
            echo "<br><br>";
}

?>

<!-- Challenge: Fix OS Command Execution + Reflected Cross Site Scripting issues on the piece of code above. -->

    </div>
    <a href = "index.php">Logout Session</a>

</body>
</html> 