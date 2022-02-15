
<?php

  require_once("levelOne.inc.php");
  
  if(!empty($_COOKIE['finished'])) {
	  echo("you have already answered this question");
	  exit;
  }
  
  $idx = 0;
  if($_SERVER['REQUEST_METHOD'] == "GET") {
	 // echo("this was get");
	  if(!empty($_GET['question'])) {
		  $idx = $_GET['question'];
	  }
	  
  }
  if($_SERVER['REQUEST_METHOD'] == "POST") {
	  
	 
	  
	  
	  $idx = $_POST['index'];
	  for($i = 0;$i <=3;$i++) {
		if(!empty($_POST[$i])) {
			//echo("da");
			setcookie($_POST['index'],$_POST[$i]);
	        $_POST = array();
		}
	  }
	  
	 
	 
  }
  
   if($idx > 4) {
		  echo("end of the test");
		  header("Location: result.php ");
		  exit;
	  }else {
		  
		  shuffleVariants($idx);
	  }
  
 
		 
		  
 
?>

<!DOCTYPE html>

<html>
  <head>
    <title>Quiz</title>
  </head>
  <body>
     <img src="<?php echo("../images/{$levelOne[$idx]->getImgName()}");   ?>" width="600" height=350>
	 <form method="post" action="<?=$_SERVER['PHP_SELF']   ?>">
	     <input type="radio" id="first" name="0" value="<?=$levelOne[$idx]->getVariants()[0]  ?>">
		 <label for="first"><?=$levelOne[$idx]->getVariants()[0]  ?></label><br>
		 <input type="radio" id="second" name="0" value="<?=$levelOne[$idx]->getVariants()[1]  ?>">
		 <label for="second"><?=$levelOne[$idx]->getVariants()[1]  ?></label><br>
		 <input type="radio" id="third" name="0" value="<?=$levelOne[$idx]->getVariants()[2]  ?>">
		 <label for="third"><?=$levelOne[$idx]->getVariants()[2]  ?></label><br>
		 <input type="radio" id="fourth" name="0" value="<?=$levelOne[$idx]->getVariants()[3]  ?>">
		 <label for="fourth"><?=$levelOne[$idx]->getVariants()[3]  ?></label><br>
		 
		 <input type="hidden" name="index" value="<?=$idx+1 ?>">
		 
		 <input type="submit" value="next">
	 </form>
	 
  </body>
  

</html>