
<?php
 
require_once("Quiz.class.php");

 
 $levelOne = array(new Quiz(["Dodge Charger","Dodge Challenger","Ford Mustang","Bmw 525I"],"Dodge Challenger","1.jpg"),
new Quiz(["Mitsubishi lancer ","Nissan ROGUE","Acura MDX","Subaru wrx sti"],"Subaru wrx sti","3.jpg"),
new Quiz(["Honda CR125R ","GMC Sierra","Polaris 700 SWITCHBACK","Bmw F800GS"],"GMC Sierra","10.jpg"),
new Quiz(["Ford GT","Nissan PATHFINDER","Dodge INTREPID","Polaris 440 PRO X"],"Ford GT","6.jpg"),
new Quiz(["Honda VTX1800S ","Toyota COROLLA","Chrysler 300","Cadillac Escalade"],"Cadillac Escalade","4.jpg"));

function shuffleVariants($idx) {
	global $levelOne;
	$levelOne[$idx]->shuffleVariants();
}

?>