<?php

function loginUser(){
    $db = openDatabaseConnection();

    $Password = md5(sha1($_POST['Password']));
    $Email = $_POST['Email'];

    $sql = "SELECT * FROM users WHERE Email=:Email";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':Email' => $Email
    ));
    $users = $query->fetch();

    if($users != null){
        if($Password == $users['Password'] && $Email == $users['Email']){
            $message = "Success!";
            $_SESSION['LoggedIn'] = 1;

            $sql = "SELECT Firstname, Lastname FROM users WHERE Email=:Email";
            $query = $db->prepare($sql);
            $query->execute(array(
                ':Email' => $Email
            ));
            $users = $query->fetch();

            $Firstname = $users['Firstname'];
            $Lastname = $users['Lastname'];

            $_SESSION['Firstname'] = $Firstname;
            $_SESSION['Lastname'] = $Lastname;

            header('Location :' .URL. 'garden/index');
                $_SESSION['message'] = $message;
        }else{
            $message = "This password does not exist. Please try again.";
                $_SESSION['message'] = $message;
        }
    }else{
        $message = "This email does not exist. Please try again or register.";
            $_SESSION['message'] = $message;
    }

    $db = null;

    $_SESSION['message'] = $message;
}

function logoutUser(){

}

function registerUser($Firstname, $Password, $Email, $Password){
    $db = openDatabaseConnection();

    $Firstname = isset($_POST['Firstname']) ? $_POST['Firstname'] : '';
    $Lastname = isset($_POST['Lastname']) ? $_POST['Lastname'] : '';
	$Password = isset($_POST['Password']) ? $_POST['Password'] : '';
	$Email = isset($_POST['Email']) ? $_POST['Email'] : '';
    $Active = 0;

    if (strlen($Firstname) == 0 || strlen($Lastname) == 0 || strlen($Password) == 0 || strlen($Email) == 0) {
		return "Niet alle velden zijn correct ingevuld";
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

function getAllGardens(){

}
