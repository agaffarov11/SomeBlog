
<?php

require_once("AdminPostDB.class.php");
$postDB = new AdminPostDB();





if(!empty($_GET['id'])  ) {
	$article = $postDB->getPostById($_GET['id']);
	
}





?>

<!DOCTYPE html>

<html>
<head>
  <title>edit an article</title>
</head>

<body>
  
  <form method="post" action="apply_edits.php" enctype="multipart/form-data">
    
	   <label>Link description</label><br>
	  <textarea name="linkdescription" cols="50" rows="5"><?=$article['linkdesc'] ?></textarea><br />
	  <label>Short description</label><br>
	  <textarea name="shortdescription" cols="50" rows="5"><?=$article['shortdesc'] ?></textarea><br />
	  <label>Main text</label><br>
	  <textarea name="main_text" cols="50" rows="5"></textarea><br>
	  
	  <label>Category</label><br>
	  <select name="cat">
	    <option value="1">Muscle cars</option>
		<option value="2">SUVs</option>
		<option value="3">Sports cars</option>
	  </select><br>
	 
	  <?php echo("<img src=\"../images/{$article['id']}.jpg\" width=600 height=350>");  ?><br>
	  <label>change a picture</label>
	 
	  <input type="file"name="postPic"><br>
	  <input type="hidden" name="theid" value="<?=$article['id'];  ?>">
	  <input type="submit"value="upload">
	
	
  </form>
  
</body>

</html>