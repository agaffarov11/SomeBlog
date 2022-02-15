
<?php
  require_once("AdminPostDB.class.php");
  require_once("checkForAdminRole.php");

  $apd = new AdminPostDB();
  $catList = $apd->getAllCategories();

  if($_SERVER['REQUEST_METHOD']=='POST') {
	  if( !empty($_POST['linkdescription']) && !empty($_POST['shortdescription']))  {
		  
		$lastId = $apd->addPost(stripslashes($_POST['linkdescription']),stripslashes($_POST['shortdescription']),$_POST['cat']);  
        $ext = pathinfo($_FILES["postPic"]["name"], PATHINFO_EXTENSION);
	    move_uploaded_file($_FILES['postPic']['tmp_name'],"../images/{$lastId}." . $ext );
	    header("Location:manage_posts.php");
	  }else {
		  echo("one of the fields is empty");
	  }
	  
	 
	  
	  
  }
?>

<!DOCTYPE html>

<html>
  <head>
    <title>add post</title>
  </head>
  <body>
    <form method="post" action="" enctype="multipart/form-data">
	  <label>Link description</label><br>
	  <textarea name="linkdescription" cols="50" rows="5"></textarea><br />
	  <label>Short description</label><br>
	  <textarea name="shortdescription" cols="50" rows="5"></textarea><br />
	  <label>Categoy</label><br>
	  <select name="cat">
	  
	    
		<?php
		  foreach($catList as $cat) {
			  echo("<option value=\"{$cat['id']}\">  {$cat['name']}   </option>");
		  }
		?>
		
	  </select><br>
	  <input type="file"name="postPic"><br>
	  <input type="submit"value="upload">
	</form>
	
  
  
  </body>

</html>