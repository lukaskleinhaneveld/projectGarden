<?php
require(ROOT."model/gardenModel.php");
require(ROOT."model/adminModel.php");

function index(){
	render("home/index");
}


function account(){
    if(!empty($_SESSION['LoggedIn'])){
        render("home/account");
	}else{
		header('location: ' . URL . 'login/index');
    }
}

function settings(){
	$Id = $_SESSION['Id'];
	loadUser($Id);

    if(!empty($_SESSION['LoggedIn'])){
        render("home/settings", array(
			'user' => loadUser($Id)
		));
	}else{
		header('location: ' . URL . 'login/index');
    }

}
