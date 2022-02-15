
<?php

class CommentDB {
	private $db;
	
	function __construct() {
		$this->db = new PDO('mysql:host=localhost;dbname=someblog',"root","qwerty");
	}
	
	function addComment($postId,$userId,$commentText) {
		$sql = "INSERT INTO comment(post_id,user_id,comment_text) VALUES($postId,$userId,\"$commentText\")";
		$this->db->exec($sql);
	}
	function getCommentsOn($id) { 
	    $sql = "SELECT c.id,c.user_id,c.comment_text,u.fname,u.lname FROM comment c INNER JOIN user u ON(c.user_id=u.id) WHERE post_id=\"$id\" ";
		$stmt = $this->db->query($sql);
		return $stmt->fetchAll(PDO::FETCH_ASSOC);
	}
	
	function __destruct() {
		$this->db=null;
	}
	
	
	
	
	
}
 //"SELECT c.id,c.user_id,c.comment_text,u.fname,u.lname FROM comment c INNER JOIN user u ON(c.user_id=u.id) WHERE post_id=\"$id\" ";
?>