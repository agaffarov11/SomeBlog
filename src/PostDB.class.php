
<?php
class PostDB {
  private $db;

  function __construct() {
	  $this->db = new PDO('mysql:host=localhost;dbname=someblog',"root","qwerty");
  }  
  
  function getAllPosts() {
	 $sql = "SELECT id,linkdesc,date,shortdesc,category_id FROM post ORDER BY id DESC;"; 
	 $stmt = $this->db->query($sql) or die("Ошибка в запросе");
	 $row = $stmt->fetchall(PDO::FETCH_ASSOC);
	 return $row;
  }
  function getPostsByCategory($categoryName) {
	  $sql = "SELECT id,linkdesc,date,shortdesc,category_id FROM post WHERE category_id=(SELECT id FROM category WHERE name=\"$categoryName\")";
	 //echo("SQL IS<br> " . $sql);
	  $stmt = $this->db->query($sql) or die("Ошибка запроса");;
	  $arr = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  return $arr;
	  
  }
  function getPostById($id) {
	  $sql = "SELECT id,linkdesc,date,shortdesc,category_id,main_text FROM post WHERE id=\"$id\"";
	  $stmt = $this->db->query($sql);
	  $arr = $stmt->fetch(PDO::FETCH_ASSOC);
	  return $arr;
  }
  function getPostsWithLimit($offset,$row_count,$category) {
	  $articleArray = [];
	  if($category===0) {
		  
		  $sql = "SELECT id,linkdesc,date,shortdesc,category_id FROM post ORDER BY id DESC LIMIT $offset, $row_count   ";
	  }else {
		  $sql = "SELECT id,linkdesc,date,shortdesc,category_id FROM post WHERE category_id=(SELECT id FROM category WHERE name=\"$category\") ORDER BY id DESC LIMIT $offset, $row_count   ";
	  }
	  
	
	  
	  $stmt = $this->db->query($sql);
	  $articleArray = $stmt->fetchAll(PDO::FETCH_ASSOC);
	  if($category==0) {
		  $articleArray['arrSize'] = $this->db->query("SELECT COUNT(id) FROM post")->fetchColumn();
	  }else {
	     $articleArray['arrSize'] = $stmt->rowCount();
	  }
	  
	  return $articleArray;
  }
  function getNumOfPosts() {
	  $sql = "SELECT COUNT(id) FROM post";
	  
	  return $this->db->query($sql)->fetchColumn();
  }

  
	 
  
}

?>