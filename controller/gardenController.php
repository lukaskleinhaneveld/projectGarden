<?php

function index($message = ''){

	render("garden/index", array(
		'message' => $message
	));
}

function login(){


    render("garden/login");
}

function logout(){
	
}

function register(){
	if($_SERVER["REQUEST_METHOD"] == "POST"){
		Register($Firstname, $Lastname, $Email, $Password);
	}

    render("garden/register");
	header("Location:" . URL . "garden/index");
}

function forgotten(){


    render("garden/forgotten");
}
