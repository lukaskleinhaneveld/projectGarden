<?php

require(ROOT."model/gardenModel.php");

function index($message = 'default message'){

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
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Firstname = $_POST['Firstname'];
        $Lastname = $_POST['Lastname'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];

		registerUser($Firstname, $Password, $Email, $Password);
	}else{
        echo "The form method has been set incorrectly!";
    }

    //header('Location: '.URL.'/garden/index');
}

function forgottenModdel(){


    render("garden/forgotten");
}
