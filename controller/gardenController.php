<?php

require(ROOT."model/gardenModel.php");

function index(){
	if($_SESSION['LoggedIn'] == 1){
		render("garden/index");
	}else{
		render("garden/login");
	}
}

function login(){

    render("garden/login");
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
