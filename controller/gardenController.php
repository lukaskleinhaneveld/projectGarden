<?php

require(ROOT."model/gardenModel.php");
$_SESSION['LoggedIn'] = 0;

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
		$_SESSION['LoggedIn'] == 0;
		$message = "Logged out";
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
