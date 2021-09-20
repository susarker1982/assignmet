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
	  <?php
	    //check user_category_id from user info table
        if($_SESSION['user_category_id']==1){
			include('crud.php');
	     }
	?>


   </body>
   
</html>