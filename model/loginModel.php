<?php

function loginUser($Email, $Password){
    $db = openDatabaseConnection();

    $Password = md5(sha1($_POST['Password']));
    $Email = $_POST['Email'];

    $sql = "SELECT * FROM users WHERE Email=:Email AND Active = 1";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':Email' => $Email
    ));
    $users = $query->fetch();

    $Active = $users['Active'];

    if($users != null){
        if ($Active = 1) {
            if($Password == $users['Password'] && $Email == $users['Email']){

                $sql = "SELECT Firstname, Lastname FROM users WHERE Email=:Email";
                $query = $db->prepare($sql);
                $query->execute(array(
                    ':Email' => $Email
                ));
                $users = $query->fetch();

                $Firstname = $users['Firstname'];
                $Lastname = $users['Lastname'];

                $message = "Logged in!";

                $_SESSION['Firstname'] = $Firstname;
                $_SESSION['Lastname'] = $Lastname;
                $_SESSION['LoggedIn'] = 1;
            }else{
                $message = "This password does not exist. Please try again.";
            }
        }else{
            $message = "This account has not been registered yet. Please try again later.";
        }
    }else{
        $message = "This email does not exist. Please try again or register.";
    }

    $db = null;

    $_SESSION['message'] = $message;
}

function logoutUser(){

}

function registerUser($Firstname, $Lastname, $Password, $ConfirmPass, $Email){
    $db = openDatabaseConnection();

    $Firstname = isset($_POST['Firstname']) ? $_POST['Firstname'] : '';
    $Lastname = isset($_POST['Lastname']) ? $_POST['Lastname'] : '';
	$Email = isset($_POST['Email']) ? $_POST['Email'] : '';
	$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
	$ConfirmPass = isset($_POST['ConfirmPassword']) ? $_POST['ConfirmPassword'] : '';
    $Active = 0;

    if (strlen($Firstname) == 0 || strlen($Lastname) == 0 || strlen($Password) == 0 || strlen($ConfirmPass) == 0 || strlen($Email) == 0) {
		$message = "Niet alle velden zijn correct ingevuld";
	}

    $sql = "SELECT * FROM users WHERE Email=:Email";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':Email' => $Email
    ));
    $count = $query->rowCount();

    if($count == 0){
        $sql = "INSERT INTO users (Firstname, Lastname, Password, Email, Active) VALUES (:Firstname, :Lastname, :Password, :Email, :Active)";
        $query = $db->prepare($sql);
        $Password = md5(sha1($Password));
        $query->execute(array(
            ':Firstname' => $Firstname,
            ':Lastname' => $Lastname,
            ':Email' => $Email,
            ':Password' => $Password,
            ':Active' => $Active
        ));

        $message = "You have successfully been registered!";
    }else{
        $message = "This email already exist. Please enter a different email adress.";
    }

    $db = null;

    $_SESSION['message'] = $message;

}

function forgotPassword(){

}
