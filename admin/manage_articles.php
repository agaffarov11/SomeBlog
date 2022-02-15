
<?php

require_once("../src/postDB.class.php");
$postDB = new PostDB();
$articleArray = $postDB->getAllPosts();


?>

<!DOCTYPE html>
<html>
<head>
  <title>Manage articles</title>
</head>

<body>
  <table border="1" cellpadding="5" cellspacing="0" width="350">
  
    <th>id</th>
    <th>date</th>
    <?php
      foreach($articleArray as $article) {
		  echo("<tr>");
		  echo("<td>{$article['id']}</td>");
		  echo("<td>{$article['date']}</td>");
		  echo("<td>preview</td>");
		  echo("<td><a href=\"edit_article.php?id={$article['id']}\">edit</a></td>");
		  echo("<td><a href=\"delete_article.php?id={$article['id']}\">delete</a></td>");
          echo("</tr>");
	  }
    ?>
  
  </table>
  
  <a href="add_post.php">Add new post</a>
  
  
</body>
</html>