
<?php
require_once("AdminPostDB.class.php");
$adminPostDB = new AdminPostDB();

if($_SERVER['REQUEST_METHOD'] == 'GET' ) {
	$adminPostDB->deletePost($_GET['id']);
	header("Location:manage_articles.php");
}


?>