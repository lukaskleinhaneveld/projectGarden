<?php

function loginUser($Email, $Password){
    $db = openDatabaseConnection();

    $Password = $_POST['Password'];
    $Email = $_POST['Email'];

    $sql = "SELECT * FROM register WHERE Email=:Email";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':Email' => $Email
    ));
    $users = $query->fetch();


    if($users != null){
        if($Password == $users['Password']){
            echo "Success!";
        }else{
        echo "This password does not exist. Please try again.";
        }
    }else{
        echo "This email does not exist. Please try again or register.";
    }

    $db = null;

    return $query->fetchAll();
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


    $sql = "INSERT INTO users (Firstname, Lastname, Password, Email, Active) VALUES (:Firstname, :Lastname, :Password, :Email, :Active)";
    $query = $db->prepare($sql);

    $Password = password_hash($Password, PASSWORD_BCRYPT);

    $query->execute(array(
        ':Firstname' => $Firstname,
        ':Lastname' => $Lastname,
        ':Email' => $Email,
        ':Password' => $Password,
        ':Active' => $Active
    ));

    return $query->fetchAll();

    $db = null;
}

function forgotPassword(){

}

function getAllGardens(){

}
