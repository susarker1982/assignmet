<?php
     $mysqli = new mysqli("localhost","root","","assignment");

	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}
     session_start();
	 if($_SESSION['user_category_id']!=1){
		  header("Location: index.php");
	 }
	 //Add New User
	 
	 if($_SERVER["REQUEST_METHOD"] == "POST") {
		 
      // username and password sent from form 
      // mysqli_real_escape_string is used for SQL Injection
	  $myusername = mysqli_real_escape_string($mysqli,$_POST['username']);
      $myuser_login_id = mysqli_real_escape_string($mysqli,$_POST['user_login_id']);
	  $user_category_id = mysqli_real_escape_string($mysqli,$_POST['user_category_id']);
	  $mypassword = mysqli_real_escape_string($mysqli,md5($_POST['password'])); 
	  $sql = "INSERT INTO user_info(username,user_login_id,user_category_id,password)
        VALUES('$myusername','$myuser_login_id',$user_category_id,'$mypassword')";
	   
      $result = $mysqli -> query($sql);
	  if($result){
		  header("Location: welcome.php");
	  }  
     
   }
?>
<html>
   
   <head>
      <title>Add New </title>
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
      <h1>User Name : <?php echo $_SESSION['username']; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
	   <br/><br>
	   
	   <div align = "left">
         <div style = "width:400px; border: solid 1px #333333; " align = "left">
            <div style = "background-color:#333333; color:#FFFFFF; padding:3px;"><b>Add New User</b></div>
				
            <div style = "margin:30px">
               
               <form action = "" method = "post">
			       <label>User Name  :</label><input type = "text" name = "username" class = "box"/><br /><br />
                  <label>Login ID  :</label><input type = "text" name = "user_login_id" class = "box"/><br /><br />
                  <label>Password  :</label><input type = "password" name = "password" class = "box" /><br/><br />
				  <label>User Category   :</label>
				  <select name="user_category_id">
				  <?php
				     $sql = "SELECT * FROM usercategory";
	                 $result = $mysqli -> query($sql);
					 if( $result->num_rows > 0)
                     {
					    while( $row = $result->fetch_assoc()){	 
						  echo '<option value="'.$row['id'].'">'.$row['categoryname'].'</option>';
					    } 
					 }					 
				    ?>
				 
                  </select>
				  <br/><br />
                  <input type = "submit" value = "Submit"/><br />
               </form>
               
					
            </div>
				
         </div>
			
      </div>

               

   </body>
   
</html>