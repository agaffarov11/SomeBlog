
<?php  

require_once("levelOne.inc.php");

///

//

$idx = 1;
foreach($levelOne as $lvl) {
	
	if(empty($_COOKIE[$idx]) ) {
		echo("<h2 style=\"color:red;\">{$idx}." . "not answered" . "</h2>");
		
	}else if($_COOKIE[$idx]===$lvl->getCorrectAnsw()) {
		echo("<h2 style=\"color:yellow;\">{$idx}." . $_COOKIE[$idx] . "</h2>");
		
	}else if($_COOKIE[$idx]!==$lvl->getCorrectAnsw()) {
		echo("<h2 style=\"color:red;\" >{$idx}." . $_COOKIE[$idx] . "</h2>");
		
	}
	$idx++;
}


?>
<!DOCTYPE html>

<html>
  <head>
    <title>Quiz</title>
  </head>
  <body>
    <a href="/SomeBlog/quiz">back to main menu</a><br>
	
	
	
  </body>
  

</html>