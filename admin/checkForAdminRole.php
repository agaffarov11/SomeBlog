
<?php

session_start();
require_once("../src/UserDB.class.php");
$userDB = new UserDB();
if(!empty($_SESSION['username'])) {
	
	if($userDB->getRoleById($_SESSION['userid'])!= 'admin') {
		http_response_code(404);
		include("../error.html");
		die();
	}
	
}else {
	include("../error.html");
		die();
}

?>