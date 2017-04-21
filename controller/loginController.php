<?php

require(ROOT."model/loginModel.php");

function login(){
    render("login/login");
}

function loginProcess(){
	$Email = $_POST['Email'];
	$Password = $_POST['Password'];

	loginUser($Email, $Password);

	if(!empty($_SESSION['Firstname']) && !empty($_SESSION['Lastname'])){
		header('Location: '.URL.'garden/account');
	}else{
		header('Location: '.URL.'login/login');
        $message = "The information you have filled in is not correct. Please try again.";
    }

    $_SESSION['message'] = $message;

}

function logout(){
	if ($_SERVER['REQUEST_METHOD'] === 'POST') {

	    if (isset($_POST['Yes'])) {
			session_unset($_SESSION['LoggedIn']);
			header('Location: '.URL.'garden/index');
			$message = "Logged out";
			$_SESSION['message'] = $message;
	    } else {
			header('Location: '.URL.'garden/index');
	    }

	}

	render("login/logout");
}

function register(){

    render("login/register");

}

function registerProcess(){
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Firstname = $_POST['Firstname'];
        $Lastname = $_POST['Lastname'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $ConfirmPass = $_POST['ConfirmPassword'];

		if($Password == $ConfirmPass){
			registerUser($Firstname, $Password, $Email, $Password);
		}else{
			$message = "The passwords you have entered do not match. Please try again.";
			$_SESSION['message'] = $message;
		}
	}else{
        $message = "The form method has been set incorrectly!";
		$_SESSION['message'] = $message;
    }

    render("login/register");
}

function forgottenModdel(){


    render("login/forgotten");
}
