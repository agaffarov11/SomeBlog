
<?php
  
  session_start();

  require_once('src/PostDB.class.php');
  $pClass = new PostDB();
  
  $postArraySliced = [];
  $postPerPage = 3;
 
  $currCategory = empty($_GET['cat']) ? 0 : $_GET['cat'] ;
  
  /*
  if(!empty($_GET['cat'])) {
	  $currCategory = $_GET['cat'];
	  $postArray = $pClass->getPostsByCategory($_GET['cat']);
  }else {
	  $postArray = $pClass->getAllPosts();
  }
  */
  ////
  
  if(isset($_GET['page'])) {
	  
	  $currPage = $_GET['page'];
	  $postArraySliced = $pClass->getPostsWithLimit($currPage*$postPerPage,$postPerPage,$currCategory);
	  
  }else {
	  $currPage = 0;
	  $postArraySliced = $pClass->getPostsWithLimit($currPage,$postPerPage,$currCategory);
	  
  }
  $numOfArticles = $postArraySliced['arrSize'];
  
  ////
  
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="style.css">
</head>
<body>

<div class="header">
  <h2>SomeBlog</h2>
</div>

<?php require_once("inc/navbar.inc.php");    ?>



<div class="row">
  <div class="leftcolumn">
  <?php 
  
  foreach($postArraySliced as $post) { 
     if(gettype($post) === "array") {
     echo <<<LABEL
	 <div class="card">
      <a href="post.php?id={$post['id']}">{$post['linkdesc']}</a>
      <h5>{$post['date']}</h5>
      <div class="fakeimg" style="width:100%; ">   <img src="images/{$post['id']}.jpg" height="500px" width="900px" >     </div>
      <p>{$post['shortdesc']}</p>
    </div>
	 
	 
LABEL;
	 }
  }
   ?>
  </div>
  <div class="rightcolumn">
    <div class="card">
      <h2>About Me</h2>
      <div class="fakeimg" style="height:100px;">Image</div>
      <p>Some text about me in culpa qui officia deserunt mollit anim..</p>
    </div>
    <div class="card">
      <h3>Popular Post</h3>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div><br>
      <div class="fakeimg">Image</div>
    </div>
    <div class="card">
      <h3>Follow Me</h3>
      <p>Some text..</p>
    </div>
  </div>
 
</div>
<?php
   if($currPage != 0) {
       echo("<a style='color:black;' href='/SomeBlog?page=" . ($currPage-1) . "'>prev </a>");
   }
  
   if(($currPage * $postPerPage) < $numOfArticles-$postPerPage) {
     echo("<a style='color:black;' href='/SomeBlog?page=" . ($currPage+1) . "&cat=" . $currCategory . "'>next</a>");
   }
?>
<div class="footer">
  <h2>Footer</h2>
</div>

</body>
</html>