
<?php

require_once("AdminUserDB.class.php");
$userDB = new AdminUserDB();
$usersArray = $userDB->getAllUsers();
?>

<!DOCTYPE html>

<html>

<head>
  <title>Manage users</title>
</head>

<body>
  <table border="1" cellpadding="5" cellspacing="0" width="350">
    <th>id</th>
	<th>login</th>
	<th>first name</th>
	<th>last name</th>
	<th>role</th>
	
	<?php
	 foreach($usersArray as $user) {
		  echo("<tr>");
		  
		  echo("<td>{$user['id']}</td>");
		  echo("<td>{$user['login']}</td>");
		  echo("<td>{$user['fname']}</td>");
		  echo("<td>{$user['lname']}</td>");
		  echo("<td>{$user['role']}</td>");
		  
		  echo("<td><a href=\"edit_user.php?id={$user['id']}\">edit</a></td>");
		  echo("<td><a href=\"delete_user.php?id={$user['id']}\">delete</a></td>");
		  
		  
		  
		  
          echo("</tr>");
	  }
	
	
	?>
	
	
	
  </table>

</body>

</html>