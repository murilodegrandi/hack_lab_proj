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

<div class="home">
    <h1>Welcome to Armoured DevSec!</h1>
    <h2>Your favourite ping utility tool.</h2>
    <h3>This web app lets you check your connectivity with any web servers.</h3>
    <button onclick="document.location='exec.php'">Click here to Start</button>
    <p>Click here to logout <a href =  title = "Logout">Session</a><p>
   
</div>

</body>
</html> 