
<?php
session_set_cookie_params(0,'/');
session_start();


?>

<!DOCTYPE html>

<html>

<head>
  <title>Account</title>
</head>

<body>
   <?php require_once("inc/navbar.inc.php");    ?>

   <h1>My account</h1>
   <h1><?=$_SESSION['username']   ?></h1>
   <a href="logout.php">log out</a>

</body>

</html>