	<?php

require(ROOT."model/loginModel.php");

function index(){
	if(!empty($_SESSION['LoggedIn'])){
		header('location: ' . URL . 'home/index');
	}else{
		render("register/index");
	}
}


function registerProcess(){
	if($_SERVER["REQUEST_METHOD"] == "POST"){
        $Firstname = $_POST['Firstname'];
        $Lastname = $_POST['Lastname'];
        $Email = $_POST['Email'];
        $Password = $_POST['Password'];
        $ConfirmPass = $_POST['ConfirmPass'];

		registerUser($Firstname, $Lastname, $Password, $ConfirmPass, $Email);
		//header('Location: '.URL.'login/index');
	}else{
        $message = "The form method has been set incorrectly!";
		$_SESSION['message'] = $message;
    }

    render("register/index");
}
