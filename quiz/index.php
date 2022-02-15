
<?php

for($i = 1;$i <=5;$i++) {
	if(isset($_COOKIE[$i]) && !empty($_COOKIE[$i])) {
		unset($_COOKIE[$i]);
		setcookie($i,null,time()-3600);
		echo("deleting a cookie");
	}
		
}



?>

<!DOCTYPE html>

<html>
  <head>
    <title>Quiz</title>
	<link rel="stylesheet" href="../style.css">
  </head>
  <body>
  
  <?php require_once("../inc/header.inc.php");    ?>

 <?php require_once("../inc/navbar.inc.php");    ?>

    <a style="color:yellow;" href="quiz_view.php?question=0">Quiz level 1</a><br>
	<a style="color:yellow;" href="quiz_view.php?level=2">Quiz level 2</a><br>
	<a style="color:yellow;" href="quiz_view.php?level=3">Quiz level 3</a>
	
	
  </body>
  

</html>