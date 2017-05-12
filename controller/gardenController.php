<?php
require(ROOT."model/gardenModel.php");

function createGarden(){
	if(!empty($_SESSION['LoggedIn'])){
		if ($_SERVER['REQUEST_METHOD'] === 'POST') {
			$top = $_POST['top'];
 			$left = $_POST['left'];

		}else{


		render("garden/createGarden", array(
			'stock' => loadStock()
		));
	}
	}else{
		header('location: ' . URL . 'login/index');
	}

}

function getStock(){

}
