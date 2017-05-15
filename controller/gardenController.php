<?php
require(ROOT."model/gardenModel.php");

function createGarden(){
	if(!empty($_SESSION['LoggedIn'])){
		render("garden/createGarden", array(
			'stock' => loadStock()
		));
	}else{
		header('location: ' . URL . 'login/index');
	}
}

function getStock(){

}

function saveDroppablePosition(){
	die($_POST);

	$posLeft = $_POST['posLeft'];
	$posTop = $_POST['posTop'];

	print_r ($posLeft);
	print_r ($posTop);

	saveDroppableToDb();
}
