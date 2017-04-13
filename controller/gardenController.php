<?php

require(ROOT."model/gardenModel.php");

function index(){
	if(!empty($_SESSION['LoggedIn'])){
		render("garden/index");
	}else{
		render("garden/login");
	}
}

function login(){
    render("garden/login");
}

function loginProcess(){
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];

	loginUser($Email, $Password);

	if(!empty($_SESSION['Firstname']) && !empty($_SESSION['Lastname'])){
		header('Location: '.URL.'garden/account');
	}

}

function logout(){
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	    if (isset($_POST['Yes'])) {
			session_unset($_SESSION['LoggedIn']);
			$message = "Logged out";
			header('Location: '.URL.'garden/index');
			$_SESSION['message'] = $message;
	    } else {
			header('Location: '.URL.'garden/index');
	    }

	}

	render("garden/logout");
}

function register(){

    render("garden/register");

}

function registerProcess(){
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Firstname = $_POST['Firstname'];
        $Lastname = $_POST['Lastname'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

		registerUser($Firstname, $Password, $Email, $Password);
	}else{
        $message = "The form method has been set incorrectly!";
		$_SESSION['message'] = $message;
    }

    render("garden/register");
}

function forgottenModdel(){


    render("garden/forgotten");
}

function account(){
	render("garden/account");
}
