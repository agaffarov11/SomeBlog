
<?php
session_set_cookie_params(5,'/');
session_start();

require_once("src/UserDB.class.php");

$uDB = new UserDB();

if($_SERVER['REQUEST_METHOD'] == 'POST') {
  if( empty($_POST['login']) || empty($_POST['password'])   ) {
	echo("empty fields are found!");
  }else {
	  if($uDB->checkForPasswordAndLogin($_POST['login'],$_POST['password'])) {
		  
		  $_SESSION['username'] = $_POST['login'];
		  $_SESSION['userid'] = $uDB->getIdByUsername($_POST['login']);
		  session_write_close();
		  
		  header("Location:index.php");
		  exit;
	  }
  }
}

?>

<!DOCTYPE html>
<html>

<head>
  <title>login page</title>
  <link rel="stylesheet" href="style.css">
</head>

<body>

<?php require_once("inc/header.inc.php");    ?>

<?php require_once("inc/navbar.inc.php");    ?>

  <form method="post" action="<?= $_SERVER['PHP_SELF']  ?>">
    <label style="color:yellow;">Login</label>
	<input type="text" name="login"><br>
	<label style="color:yellow;">Password</label>
	<input type="password" name="password"><br>
	<input type="submit" value="log in">
  
  </form>
</body>

</html>

<?php session_write_close(); ?>