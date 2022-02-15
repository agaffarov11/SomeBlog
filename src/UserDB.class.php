
<?php

class UserDB {
  private $db;

  function __construct() {
	  $this->db = new PDO('mysql:host=localhost;dbname=someblog',"root","qwerty");
  }	
  
	
  function filterInput() {
	  
  }
  function saveUser($login,$fname,$lname,$password) {
	   if(!$this->userExists($login)) {
		    $login = filter_var($login, FILTER_SANITIZE_STRING);
		    $fname = filter_var($fname, FILTER_SANITIZE_STRING);
			$lname = filter_var($lname, FILTER_SANITIZE_STRING);
			$password = filter_var($password, FILTER_SANITIZE_STRING);
		   
		    $password = password_hash($password,PASSWORD_DEFAULT);
			
			$sql = "INSERT INTO user(login,fname,lname,password) VALUES(\"$login\",\"$fname\",\"$lname\",\"$password\")";
		    $res = $this->db->exec($sql);
			if(!$res) {
				echo("Ошибка запроса");
			}
		   
	   }else {
		   echo("user with this login already exists");
	   }
  }
  function userExists($login) {
	  $login = filter_var($login, FILTER_SANITIZE_STRING);
	  $sql = "SELECT id FROM user WHERE login=\"$login\""; 
	  
	  
	  
	  $stmt = $this->db->query($sql);
	  if($stmt->rowCount()==0) {
		  return false;
	  }else {
		  return true;
	  }
  }
  function checkForPasswordAndLogin($login,$password) {
	  if(!$this->userExists($login)) {
		  echo("User not found");
		  return false;
	  }else {
		  $sql = "SELECT password FROM user WHERE login=\"$login\"";
		  $stmt = $this->db->query($sql);
		  $pass = $stmt->fetchColumn();
		  if(password_verify($password,$pass)) {
			  return true;
		  }else {
			  echo("incorrect password");
			  return false;
		  }
	  }
	  
  }
  function getIdByUsername($username) {
	  $sql = "SELECT id FROM user WHERE login=\"$username\"";
	  $stmt = $this->db->query($sql);
	  return $stmt->fetchColumn();
	  
  }	
  function getRoleById($id) {
	   $sql = "SELECT role FROM user WHERE id=\"$id\"";
	   $stmt = $this->db->query($sql);
	   return $stmt->fetchColumn();
  }
  
}


?>
