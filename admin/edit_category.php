
<?php

 require_once("AdminPostDB.class.php");
 $postDB = new AdminPostDB();
 
 if($_SERVER['REQUEST_METHOD'] == "POST") {
   if( !empty($_POST['thename'])      ) {
		$postDB->editCategory($_POST['id'],$_POST['thename']);
	}else {
		echo("empty fields found");
	}
	
	header("Location:manage_categories.php");
	exit;
}

if(!empty($_GET['id'])) {
  $cat = $postDB->getCategoryById($_GET['id']);	
  
}  


?>

<!DOCTYPE html>

<html>

<head>
  <title>Edit user</title>
</head>

<body>
  <form method="post" action=<?=$_SERVER['PHP_SELF']   ?> >
    <label>name</label><br>
    <input type="text"name="thename" value="<?=$cat['name']   ?>"><br>
	
	 
	<input type="hidden" name="id" value="<?=$_GET['id']  ?>";         >
	<input type="submit" value="save changes">
    
  </form>
</body>

</html>