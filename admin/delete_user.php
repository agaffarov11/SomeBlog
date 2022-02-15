
<?php
require_once("AdminUserDB.class.php");
$adminUserDB = new AdminUserDB();

if(!empty($_GET['id'])) {
	$adminUserDB->deleteUser($_GET['id']);
	header("Location:manage_users.php");
}

?>