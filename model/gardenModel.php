<?php

function loginUser($Email, $Password){
    $db = openDatabaseConnection();

    $Password = md5(sha1($_POST['Password']));
    $Email = $_POST['Email'];

    $sql = "SELECT * FROM users WHERE Email=:Email AND Active=1";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':Email' => $Email
    ));
    $users = $query->fetch();

    if($users != null){
        if($Password == $users['Password'] && $Email == $users['Email']){

            $sql = "SELECT Firstname, Lastname, isAdmin FROM users WHERE Email=:Email";
            $query = $db->prepare($sql);
            $query->execute(array(
                ':Email' => $Email
            ));
            $users = $query->fetch();

            $Firstname = $users['Firstname'];
            $Lastname = $users['Lastname'];
            $isAdmin = $users['isAdmin'];

            $message = "Logged in!";

            $_SESSION['Firstname'] = $Firstname;
            $_SESSION['Lastname'] = $Lastname;
            $_SESSION['isAdmin'] = $isAdmin;
            $_SESSION['LoggedIn'] = 1;
            $_SESSION['message'] = $message;
        }else{
            $message = "This password does not exist. Please try again.";
            $_SESSION['message'] = $message;
        }
    }else{
        $message = "This email does not exist or this account is not active. Please try again later or register.";
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
        $sql = "INSERT INTO users (Firstname, Lastname, Password, Email) VALUES (:Firstname, :Lastname, :Password, :Email)";
        $query = $db->prepare($sql);
        $Password = md5(sha1($Password));
        $query->execute(array(
            ':Firstname' => $Firstname,
            ':Lastname' => $Lastname,
            ':Email' => $Email,
            ':Password' => $Password,
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


     function getUser($user_id)
    {
        $sql = "SELECT Id, Email, Active FROM users WHERE id = :user_id LIMIT 1";
        $query = $db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);

        return $query->fetch();
    }

    function updateeUser($Email, $Active, $user_id)
    {
        $sql = "UPDATE users SET Email = :Email, Active = :Active  WHERE Id = :user_id";
        $query = $db->prepare($sql);
        $parameters = array(':Email' => $Email, ':Active' => $Active, ':user_id' => $user_id);
        $query->execute($parameters);
    }

     function loadUsers()
    {
        $db = openDatabaseConnection();
        $sql = "SELECT * FROM users ORDER BY id ASC";
        $query = $db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

      function foo()
  {
    echo "I don't exist until program execution reaches me.\n";
  }
