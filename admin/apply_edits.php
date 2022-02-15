
<?php
  
  require_once("AdminPostDB.class.php");
  $postDB = new AdminPostDB();

  
  if($_SERVER['REQUEST_METHOD'] == 'POST') {
	  
	
	if(empty($_POST['linkdescription']) || empty($_POST['shortdescription'])   ) {
		echo("emty fields found");
		header("Location: manage_articles.php");
	}else {
		$lastId= $_POST['theid'];
		$postDB->editPost(stripslashes($_POST['linkdescription']),stripslashes($_POST['shortdescription']),$_POST['cat'],$lastId,$_POST['main_text']); 
		if(isset($_FILES['postPic']["name"])) {
		  $ext = pathinfo($_FILES["postPic"]["name"], PATHINFO_EXTENSION);
	      move_uploaded_file($_FILES['postPic']['tmp_name'],"../images/{$lastId}." . $ext );
		  echo("picture saved");
		}
	}
	  
	//header("Location:manage_articles.php");
	//header("Location: manage_articles.php?id=" . $_POST['theid']);
	
	
}
  
?>