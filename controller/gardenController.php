<?php

require(ROOT."model/gardenModel.php");

function index(){
	if(!empty($_SESSION['LoggedIn'])){
		render("garden/index");
	}else{
		render("login/login");
	}
}

function account(){
	render("garden/account");
}
