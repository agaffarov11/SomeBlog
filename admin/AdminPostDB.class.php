
<?php

  class AdminPostDB {
	  private $db;
	  
	  function __construct() {
		  $this->db = new PDO('mysql:host=localhost;dbname=someblog',"root","qwerty");
	  }
	  
	  function addPost($linkDescription,$shortDescription,$categoryId) {
		  $sql = "INSERT INTO post(linkdesc,date,shortdesc,category_id) VALUES(\"$linkDescription\",CURRENT_TIMESTAMP(),\"$shortDescription\",$categoryId)";
		  //echo("sql is " . $sql);
		  try {
			  $this->db->exec($sql);
		  }catch(PDOException $e) {
			  echo($e->getMessage());
		  }
		  return $this->db->lastInsertId();
	  }
	  function editPost($linkDescription,$shortDescription,$categoryId,$postId,$mainText) {
		  $sql = "UPDATE post SET linkdesc=\"$linkDescription\",shortdesc=\"$shortDescription\",category_id=\"$categoryId\",main_text=\"$mainText\"
		  WHERE id=\"$postId\"  ";
		  $this->db->exec($sql);
		  
	  }
	   function getPostById($id) {
	     $sql = "SELECT id,linkdesc,date,shortdesc,category_id FROM post WHERE id=\"$id\"";
	     $stmt = $this->db->query($sql);
	     $arr = $stmt->fetch(PDO::FETCH_ASSOC);
	     return $arr;
  }
	  
	  function deletePost($id) {
		  $sql = "DELETE FROM post WHERE id=\"$id\"";
		  $this->db->exec($sql);
	  }
	  ///////////category part
	  function getAllCategories() {
		  $sql = "SELECT id,name FROM category";
		  $stmt = $this->db->query($sql);
		  return $stmt->fetchAll(PDO::FETCH_ASSOC);
	  }
	  function deleteCategory($id) {
		  $sql = "DELETE FROM category WHERE id=\"$id\"  ";
		  $this->db->exec($sql);
		  
	  }
	  function getCategoryById($id) {
		  $sql = "SELECT id,name FROM category WHERE id=\"$id\"  ";
		  return $this->db->query($sql)->fetch(PDO::FETCH_ASSOC);
	  }
	  function editCategory($id,$name) {
		  $sql = "UPDATE category set name=\"$name\" WHERE id=\"$id\"  ";
		  $this->db->exec($sql);
	  }
	  
  }

?>