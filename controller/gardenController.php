<?php
require(ROOT."model/gardenModel.php");

function createGarden(){
	if(!empty($_SESSION['LoggedIn'])){
		render("garden/createGarden");
	}else{
		header('location: ' . URL . 'login/index');
	}
}

function getStock(){

}
