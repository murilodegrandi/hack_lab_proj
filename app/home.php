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
      <link href = "css/styles2.css" rel = "stylesheet">
   </head>
<body>
    
    <header>
        <h1>Welcome to Armoured DevSec!</h1>
        <h2>Your favourite ping utility tool.</h2>
    </header>
    
    
    <button onclick="document.location='exec.php'">Click here to begin</button>
    <a href = "index.php">Logout Session</a>
    

</body>
</html> 