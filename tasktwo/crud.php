<?php
  // session_start();
  // echo $_SESSION['user_category_id'];
  if($_SESSION['user_category_id']==1){
?>

<?php
   $mysqli = new mysqli("localhost","root","","assignment");

	if ($mysqli -> connect_errno) {
	  echo "Failed to connect to MySQL: " . $mysqli -> connect_error;
	  exit();
	}
	$sql = "SELECT user_info.username,user_info.user_login_id,usercategory.categoryname FROM user_info
	        LEFT JOIN usercategory
			ON user_info.user_category_id=usercategory.id";
	$result = $mysqli -> query($sql);
	if( $result->num_rows > 0)
{
?>
<h2>List of all Users</h2>
<table border="1">
<tr>
        <td></td>
        <td></td>
        <td><a href="add.php">Add New</a></td>      
    </tr>
    <tr>
        <td>User Name</td>
        <td>User Login Name</td>
        <td>User Category</td>
       
    </tr>
	
    <?php
    while( $row = $result->fetch_assoc()){
        echo "<tr>";
			echo "<td>".$row['username'] . "</td>";
			echo "<td>".$row['user_login_id'] . "</td>";
			echo "<td>".$row['categoryname'] . "</td>";
        echo "</tr>";
    }
?>
</table>
<?php
}
else
{
    echo "<br><br>No Record Found";
}
?>

	

<?php
  }
?>