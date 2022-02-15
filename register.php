
<?php
require_once("src/UserDB.class.php");

$uDB = new UserDB();

if($_SERVER['REQUEST_METHOD']=='POST') {
	if( empty($_POST['login']) || empty($_POST['fname']) || empty($_POST['lname']) || empty($_POST['password'])  ) {
		echo("empty fields found");
	}else {
		$uDB->saveUser($_POST['login'],$_POST['fname'],$_POST['lname'],$_POST['password']);
	}
}


$loginLink = "<a href='login.php'>log in</a>"
?>

<!DOCTYPE html>
<html>
  <head>
    <title>Registration page</title>
  </head>
  
  <body>
    <p>Register or <?=$loginLink?></p>
    <form method="post" action="<?= $_SERVER['PHP_SELF']; ?>">
	  <label>Login</label>
	  <input type="text" name="login"><br>
	  <label>First name</label>
	  <input type="text" name="fname"><br>
	  <label>Last name</label>
	  <input type="text" name="lname"><br>
	  <label>Password</label>
	  <input type="password" name="password"><br>
	  <input type="submit" value="register">
	</form>
  </body>
  
  



</html>