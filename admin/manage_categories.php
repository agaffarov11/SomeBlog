
<?php

require_once("AdminPostDB.class.php");
$postDB = new AdminPostDB();

$catArray = $postDB->getAllCategories();
?>


<!DOCTYPE html>

<html>

<head>
  <title>manage categories</title>
</head>

<body>
  <table border="1" cellpadding="5" cellspacing="0" width="350">
    <th>category id</th>
	<th>category name</th>
	
	<?php
	
	  foreach($catArray as $cat) {
		  echo("<tr>");
		  
		  echo("<td>{$cat['id']}</td>");
		  echo("<td>{$cat['name']}</td>");
		  
		  echo("<td><a href=\"edit_category.php?id={$cat['id']}\">edit</a></td>");
		  echo("<td><a href=\"delete_category.php?id={$cat['id']}\">delete</a></td>");
		  
		  echo("</tr>");
	  }
	
	?>
	
  </table>
</body>

</html>
