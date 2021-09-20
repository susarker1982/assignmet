<?php
   $mysqli = new mysqli("localhost","root","","assignment");

	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}
   session_start();
   
   if($_SERVER["REQUEST_METHOD"] == "POST") {
      // username and password sent from form 
      // mysqli_real_escape_string is used for SQL Injection
      $myuser_login_id = mysqli_real_escape_string($mysqli,$_POST['user_login_id']);
      $mypassword = mysqli_real_escape_string($mysqli,$_POST['password']); 
	 
      $sql = "SELECT * FROM user_info WHERE user_login_id = '$myuser_login_id' and password = md5('$mypassword')";
	  $result = $mysqli -> query($sql);
	  $count=mysqli_num_rows($result);
	  
      // If result matched $$myuser_login_id and $mypassword, table row must be 1 row
		
      if($count == 1) {
		 $row = $result -> fetch_array(MYSQLI_NUM);
		 //print user name with session 
         $_SESSION['username'] = $row[1];
		
         header("location: welcome.php");
      }else {
         $error = "Your Login Name or Password is invalid";
      }
   }
?>
<html>
   
   <head>
      <title>Login Page</title>
      
      <style type = "text/css">
         body {
            font-family:Arial, Helvetica, sans-serif;
            font-size:14px;
         }
         label {
            font-weight:bold;
            width:100px;
            font-size:14px;
         }
         .box {
            border:#666666 solid 1px;
         }
      </style>
      
   </head>
   
   <body bgcolor = "#FFFFFF">
	
      <div align = "center">
         <div style = "width:400px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Login</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
                  <label>Login ID  :</label><input type = "text" name = "user_login_id" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
                  <input type = "submit" value = " Submit "/><br />
               </form>
               
               <div style = "font-size:11px; color:#cc0000; margin-top:10px">
			   <?php 
			          if(!empty($error)){
						 echo $error;  
					  }				
			  
			   ?>
			   </div>
					
            </div>
				
         </div>
			
      </div>

   </body>
</html>