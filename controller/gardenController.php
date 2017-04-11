<?php

require(ROOT."model/gardenModel.php");

function index($message = ''){

	render("garden/index", array(
		'message' => $message
	));
}

function login(){

    //loginUser($Email, $Password);

    render("garden/login");
}

function logout(){

}

function register(){

    render("garden/register");

}

function registerProcess(){
    $message = '';
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Firstname = $_POST['Firstname'];
        $Lastname = $_POST['Lastname'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

		registerUser($Firstname, $Password, $Email, $Password);
	}else{
        $message = "The form method has been set incorrectly!";
        return $message;
    }

    render("garden/register", array(
        'message' => $message
    ));
}

function forgottenModdel(){


    render("garden/forgotten");
}
