<?php 

try {

	$db=new PDO("mysql:host=localhost;dbname=db;charset=utf8",'root','');
}

catch (PDOExpception $e) {

	echo $e->getMessage();
}


 ?>

