<?php
      
   ini_set('display_errors', '1');
   ini_set('display_startup_errors', '1');
   error_reporting(E_ALL);

   ob_start();
   session_start();

?>

<html lang = "en">
   
   <head>
      <title>Armoured DevSec APP</title>
      <link href = "styles-index.css" rel = "stylesheet">
   </head>
	
   <body>
      <header>
         <h1>Armoured DevSec APP</h1>
         <h2>Please Sign-in</h2>
      </header>
      <div class = "container form-signin">
         
         <?php
            $msg = '';
            
            if (isset($_POST['login']) && !empty($_POST['username']) 
               && !empty($_POST['password'])) {
				  
                   $user = "root";
                   $pass = "fiaBdPJTV9mm";
                   $host = "localhost";
                   $dbdb = "appdb";
    
                   $con = mysqli_connect($host, $user, $pass, $dbdb);   
                   
/* Challenge #4: Remediate SQL Injection flaw and implement prevention against brute-force attack by modifying the piece of code between START-END.

START */
               $sql = "SELECT username, password, failedlogins FROM users WHERE username = '". $_POST['username'] ."' and password = '". $_POST['password'] ."';";
               $res = mysqli_query($con,$sql, MYSQLI_USE_RESULT);
               $row = mysqli_fetch_row($res);
               mysqli_close($con);
               if($row){
                           $con2 = mysqli_connect($host, $user, $pass, $dbdb);  
                           $sql2 = "UPDATE users set failedlogins = 0  WHERE username = '". $row[0] ."';";
                           $res2 = mysqli_query($con2,$sql2);   
                           mysqli_close($con2);
                           $_SESSION['valid'] = true;
                           $_SESSION['timeout'] = time();
                           $_SESSION['username'] = $row[0];  
                           header('Refresh: 0; URL = home.php');
               }else{
                  $msg = 'Wrong username or password';
               }
            }
   // END
         ?>
      </div> 
      
      <div class = "container">
      
         <form class = "form-signin" role = "form" 
            action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']); 
            ?>" method = "post">
            <h4 class = "form-signin-heading"><?php echo $msg; ?></h4>
            <input type = "text" class = "form-control" 
               name = "username" placeholder = "Username" 
               required autofocus></br>
            <input type = "password" class = "form-control"
               name = "password" placeholder = "Password" required>
            <button class = "btn btn-lg btn-primary btn-block" type = "submit" 
               name = "login">Login</button>
         </form>
			
      </div> 
      
   </body>
</html>
