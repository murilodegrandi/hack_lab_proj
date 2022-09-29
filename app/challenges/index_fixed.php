<?php
      
   ini_set('display_errors', '1');
   ini_set('display_startup_errors', '1');
   error_reporting(E_ALL);

   ob_start();
   session_start();

?>

<html lang = "en">
   
   <head>
      <title>Hacking Lab</title>
      <link href = "css/bootstrap.min.css" rel = "stylesheet">
      
      <style>
         body {
            padding-top: 40px;
            padding-bottom: 40px;
            background-color: #ADABAB;
         }
         
         .form-signin {
            max-width: 330px;
            padding: 15px;
            margin: 0 auto;
            color: #017572;
         }
         
         .form-signin .form-signin-heading,
         .form-signin .checkbox {
            margin-bottom: 10px;
         }
         
         .form-signin .checkbox {
            font-weight: normal;
         }
         
         .form-signin .form-control {
            position: relative;
            height: auto;
            -webkit-box-sizing: border-box;
            -moz-box-sizing: border-box;
            box-sizing: border-box;
            padding: 10px;
            font-size: 16px;
         }
         
         .form-signin .form-control:focus {
            z-index: 2;
         }
         
         .form-signin input[type="email"] {
            margin-bottom: -1px;
            border-bottom-right-radius: 0;
            border-bottom-left-radius: 0;
            border-color:#017572;
         }
         
         .form-signin input[type="password"] {
            margin-bottom: 10px;
            border-top-left-radius: 0;
            border-top-right-radius: 0;
            border-color:#017572;
         }
         
         h2{
            text-align: center;
            color: #017572;
         }
      </style>
      
   </head>
	
   <body>
      
      <h2>Enter Username and Password</h2> 
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

               $sql = "SELECT username, password, failedlogins FROM users WHERE username = '". $_POST['username'] ."';";
               $res = mysqli_query($con,$sql, MYSQLI_USE_RESULT);
               $row = mysqli_fetch_row($res);
               if($row){
                        //print("Username: ".$row[0]."\n");
                        //print("Password: ".$row[1]."\n");
                        //print("FailedLogins: ".$row[2]."\n");
                        mysqli_close($con);
                        if ($_POST['username'] == $row[0] && 
                           $_POST['password'] == $row[1]) 
                        {
                           $con2 = mysqli_connect($host, $user, $pass, $dbdb);  
                           $sql2 = "UPDATE users set failedlogins = 0  WHERE username = '". $row[0] ."';";
                           $res2 = mysqli_query($con2,$sql2);   
                           mysqli_close($con2);
                           $_SESSION['valid'] = true;
                           $_SESSION['timeout'] = time();
                           $_SESSION['username'] = $row[0];  
                           header('Refresh: 0; URL = home.php');
                        }else {
                           //to FIX BRUTE FORCE
                           if($row[2] < 3){
                              $count = $row[2]+1;
                              $msg = 'Wrong password';
                              $con3 = mysqli_connect($host, $user, $pass, $dbdb);  
                              $sql3 = "UPDATE users set failedlogins = ". $count ."  WHERE username = '". $_POST['username'] ."';";
                              $res3 = mysqli_query($con3,$sql3);   
                              mysqli_close($con3);
                           }else{
                              $msg = 'Too many failed logins... User blocked';    
                           }
                           //to FIX BRUTE FORCE
                           
                        }
                     }else{
                        $msg = 'Wrong username';
                     }
            }
         ?>
      </div> <!-- /container -->
      
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