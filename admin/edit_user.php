
<?php
require_once("AdminUserDB.class.php");
$userDB = new AdminUserDB();


if($_SERVER['REQUEST_METHOD'] == "POST") {
   if( !empty($_POST['login']) || !empty($_POST['fname']) || !empty($_POST['lname'])     ) {
		$userDB->editUser($_POST['id'],$_POST['login'],$_POST['fname'],$_POST['lname'],$_POST['role']);
	}else {
		echo("empty fields found");
	}
	
	header("Location:manage_users.php");
	exit;
}

if(!empty($_GET['id'])) {
  $theUser = $userDB->getUserById($_GET['id']);	
  
}  

function placeSelected($role) {
	global $theUser;
	if($role===$theUser['role']) {
		echo("selected");
	}
	
}

?>

<!DOCTYPE html>

<html>

<head>
  <title>Edit user</title>
</head>

<body>
  <form method="post" action=<?=$_SERVER['PHP_SELF']   ?> >
    <label>Login</label><br>
    <input type="text"name="login" value="<?=$theUser['login']   ?>"><br>
	
	 <label>First name</label><br>
    <input type="text"name="fname" value="<?=$theUser['fname']   ?>"><br>
	
	 <label>Last name</label><br>
    <input type="text"name="lname" value="<?=$theUser['lname']   ?>"><br>
	
	 <select name="role"  >
	   <option value="user"  <?=placeSelected("user");   ?> >user</option>
	   <option value="moderator" <?=placeSelected("moderator");   ?>>moderator</option>
	   <option value="admin" <?=placeSelected("admin");   ?>>admin</option>
	   
	 </select>
	<input type="hidden" name="id" value="<?=$_GET['id']  ?>";         >
	<input type="submit" value="save changes">
    
  </form>
</body>

</html>
