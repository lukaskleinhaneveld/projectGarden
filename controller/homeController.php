<?php

require(ROOT."model/gardenModel.php");

function index(){
	if(!empty($_SESSION['LoggedIn'])){
		render("home/index");
	}else{
		header('location: ' . URL . 'login/index');
	}
}


function account(){
	render("home/account");
}
