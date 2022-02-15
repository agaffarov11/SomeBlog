
<?php
 require_once("AdminPostDB.class.php");
 $postDB = new AdminPostDB();

  if(!empty($_GET['id'])) {
	  $postDB->deleteCategory($_GET['id']);
	  header("Location: manage_categories.php");
  }

?>