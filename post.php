
<?php

session_start();
require_once("src/PostDB.class.php");
require_once("src/CommentDB.class.php");
$postClass = new PostDB();
$commentClass = new CommentDB();


if(!empty($_GET['id'])) {
	$post = $postClass->getPostById($_GET['id']);
	$commentArray = $commentClass->getCommentsOn($_GET['id']);
	//var_dump($commentArray);
}

if($_SERVER['REQUEST_METHOD'] == "POST") {
	if(!empty($_POST['comment_text'])) {
		$commentClass->addComment($_POST['id'],$_POST['user_id'],$_POST['comment_text']);
	}
	
	header("Location:post.php?id=" . $_POST['id']);
	exit;
}

?>

<!DOCTYPE html>

<html>
  <head>
    <title>theTitle</title>
	<link rel="stylesheet" href="style.css">
  </head>
  <body>
  <?php require_once("inc/header.inc.php");    ?>

  <?php require_once("inc/navbar.inc.php");    ?>
  
  
    
   
	<img src="images/<?=$post['id']?>.jpg" class="postimg" width="600" height="350" style="margin-left:auto;margin-right:auto;display:block"><br>
	
	<p style="white-space:pre-wrap;color:yellow;"><?php echo($post['main_text']);  ?></p>
	 
	
	
	
	<?php if(!empty($_SESSION['userid'])) { ?>
	<form method="post" action="<?=$_SERVER['PHP_SELF'] ?>">
	   <textarea name="comment_text" cols="50" rows="5"></textarea><br>
	   <input type="hidden" name="id" value="<?=$_GET['id']  ?>">
	   <input type="hidden" name="user_id" value="<?=$_SESSION['userid']  ?>">
	   <input type="submit" value="post comment">
	
	</form>
	<?php
	}else {
		  echo("<b style=\"color:white;\">log in or register to write a comment</b>");
	  }
	?>
	<h1>----------------comment section---------------</h1>
	<?php  
	  foreach($commentArray as $comment) {
		  echo($comment['fname'] . " " . $comment['lname'] . " writes");
		  echo("<h4 style=\"color:yellow;\">" . $comment['comment_text'] . "</h4>");
		  echo("-------------------------<br>");
	  } 
	?>
	
	
	<?php require_once("inc/footer.inc.php");    ?>
	
  </body>
</html>