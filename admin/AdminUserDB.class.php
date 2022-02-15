
<?php

class AdminUserDB {
	private $db;
	
	
	function __construct() {
		$this->db = new PDO('mysql:host=localhost;dbname=someblog',"root","qwerty");
	}
	function setRole($userId,$role) {
		
	}
	function addUser() {
		
	}
	function editUser($id,$login,$fname,$lname,$role) {
		$sql = "UPDATE user SET login=\"$login\",fname=\"$fname\",lname=\"$lname\",role=\"$role\" WHERE id=\"$id\"  ";
		$this->db->exec($sql);
	}
	function deleteUser($id) {
		$sql = "DELETE FROM user WHERE id=\"$id\" ";
		$stmt = $this->db->exec($sql);
		
	}
	function getAllUsers() {
		$sql = "SELECT id,login,fname,lname,role FROM user";
		$arr = $this->db->query($sql)->fetchAll(PDO::FETCH_ASSOC);
		return $arr;
	}
	function getUserById($id) {
		$sql = "SELECT login,fname,lname,role FROM user WHERE id=\"$id\"  ";
		$stmt = $this->db->query($sql);
		return $stmt->fetch(PDO::FETCH_ASSOC);
		
	}
	
	
}

?>