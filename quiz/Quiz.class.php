
<?php
 
 class Quiz {
	 private $variants;
	 private $correctAnsw;
	 private $imgName;
	 
	 function __construct($variants,$correctAnsw,$imgName) {
		 $this->variants = $variants;
		 $this->correctAnsw = $correctAnsw;
		 $this->imgName = $imgName;
	 }
	 
	 public function getVariants() {
		 return $this->variants;
	 }
	 public function getCorrectAnsw() {
		 return $this->correctAnsw;
	 }
	 public function getImgName() {
		 return $this->imgName;
	 }
	 public function shuffleVariants() {
		 shuffle($this->variants);
	 }
	 
	 
	 
 }

?>