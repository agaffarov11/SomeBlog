
<?php

$database = new PDO('mysql:host=localhost;dbname=someblog',"root","qwerty");
$sql = "SELECT name FROM category";
$stmt = $database->query($sql);
$array=  $stmt->fetchAll();

$accountBtn = "Login";
$accountLink = "register.php";
if(isset($_SESSION['username'])) {
  $accountBtn = "Account";
  $accountLink = "account.php";
}
?>

<div class="navbar">
  <a href="/">Home</a>
    <div class="dropdown">
    <button class="dropbtn">Category 
      <i class="fa fa-caret-down"></i>
    </button>
    <div class="dropdown-content">
	   <?php echo("<a href='/SomeBlog'>all</a>"); ?>
	   <?php foreach($array as $a) {
          echo("<a href=" . "/SomeBlog?cat={$a['name']}" .   ">{$a['name']}</a>");
      
	   }
	  ?>
    </div>
  </div> 
  <a href="<?=$accountLink ?>"><?=$accountBtn ?></a>
  <a href="/SomeBlog/Quiz">Quiz</a>
  <a href="#home">Contacts</a>
  <a href="about.php">About</a>
</div>