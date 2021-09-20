<?php
     session_start();
	 if( $_SESSION['username']==NULL){
		  header("Location: index.php");
	 }
?>
<html>
   
   <head>
      <title>Welcome </title>
   </head>
   
   <body>
      <h1>User Name : <?php echo $_SESSION['username']; ?></h1> 
      <h2><a href = "logout.php">Sign Out</a></h2>
   </body>
   
</html>