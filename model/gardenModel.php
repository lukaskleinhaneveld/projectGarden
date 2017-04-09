<?php

function Login($Email, $Password){
    $db = openDatabaseConnection();

    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    $sql = "SELECT * FROM users WHERE Email = :Email && Password = :Password";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':Email' => $Email,
        ':Password' => $Password
    ));

    $results = $query->fetch(PDO::FETCH_ASSOC);

    $db = null;
}

function Logout(){
    
}

function Register($Firstname, $Password, $Email, $Password){

    $Firstname = $_POST['Firstname'];
    $Lastname = $_POST['Lastname'];
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];
    $Active = 0;

    $db = openDatabaseConnection();

    $sql = "INSERT INTO users ("Firstname, Lastname, Password, Email, Active") VALUES (:Firstname, :Lastname, :Password, :Email, :Active)";
    $query = $db->prepare($sql);
    $query->execute(array(
		':Firstname' => $Firstname,
    	':Lastname' => $Lastname,
		':Password' => password_hash($Password, PASSWORD_BCRYPT),
		':Email' => $Email
    ));
            $db = null;
}
