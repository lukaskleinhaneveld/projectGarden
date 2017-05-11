<?php

function loginUser($Email, $Password){
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM users WHERE Email=:Email";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':Email' => $Email
    ));
    $users = $query->fetch();

    $Active = $users['Active'];
    $Password = hash('sha256', $Password);

    if($users != null){

        if ($Active == 1) {
            echo "User inputted password: " .$Password . "  <br/><br/>" ;
            echo "Password in database: " . $users['Password'];
            if($Password == $users['Password'] && $Email == $users['Email']){

                $sql = "SELECT * FROM users WHERE Email=:Email";
                $query = $db->prepare($sql);
                $query->execute(array(
                    ':Email' => $Email
                ));

                $user = $query->fetch();

                $Id = $user['Id'];
                $Firstname = $user['Firstname'];
                $Lastname = $user['Lastname'];

                $message = "Logged in!";

                $_SESSION['Id'] = $Id;
                $_SESSION['Firstname'] = $Firstname;
                $_SESSION['Lastname'] = $Lastname;
                $_SESSION['LoggedIn'] = 1;
                $_SESSION['Active'] = $users['Active'];
                $_SESSION['isAdmin'] = $users['isAdmin'];
            }else{
                $message = "This password/email does not exist. Please try again.";
            }
        }else{
            $message = "This account has not been activated yet. Please try again later.";
        }
    }else{
        $message = "This email does not exist. Please try again or register.";
    }

    $db = null;

    $_SESSION['message'] = $message;
}

function logoutUser(){
    session_destroy();
}

function registerUser($Firstname, $Lastname, $Password, $ConfirmPass, $Email){
    $db = openDatabaseConnection();

    $Firstname = isset($_POST['Firstname']) ? $_POST['Firstname'] : '';
    $Lastname = isset($_POST['Lastname']) ? $_POST['Lastname'] : '';
	$Email = isset($_POST['Email']) ? $_POST['Email'] : '';
	$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
	$ConfirmPass = isset($_POST['ConfirmPassword']) ? $_POST['ConfirmPassword'] : '';
    $Active = 0;
    $isAdmin = 0;

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
        $sql = "INSERT INTO users (Firstname, Lastname, Password, Email, Active, isAdmin) VALUES (:Firstname, :Lastname, :Password, :Email, :Active, :isAdmin)";
        $query = $db->prepare($sql);
        $Password = hash('sha256', $Password);
        $query->execute(array(
            ':Firstname' => $Firstname,
            ':Lastname' => $Lastname,
            ':Email' => $Email,
            ':Password' => $Password,
            ':Active' => $Active,
            ':isAdmin' => $isAdmin
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
