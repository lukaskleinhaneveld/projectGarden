<?php
// This function fethces all gardens
function getAllGardens(){
    $db = openDatabaseConnection();

    $sql = "SELECT Gardens FROM users";
    $gardens = $db->prepare($sql);
    $gardens->execute();

    return $gardens->fetch();

    $db = null;
}

// This function fetches the users from the database
function loadUsers(){
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM users ORDER BY Id ASC";
    $users = $db->prepare($sql);
    $users->execute();

    return $users->fetchAll();

    $db = null;
}

// This function fetches only one user with the admin supplied user id
function loadUser($Id){
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM users WHERE Id = :Id LIMIT 1";
    $user = $db->prepare($sql);
    $parameters = array(
        ':Id' => $Id
    );
    $user->execute($parameters);

    return $user->fetch();

    $db = null;
}

// This function does the database sided updating for the users
function updateeUser($Firstname, $Lastname, $Password, $Email, $Active, $isAdmin, $Id){
    $db = openDatabaseConnection();

    $Password = md5(sha1($Password));

    $sql = "UPDATE `users` SET `Firstname` = :Firstname,`Lastname` = :Lastname, `Password` = :Password, `Email` = :Email,`Active` = :Active,`isAdmin` = :isAdmin WHERE `Id` = :Id";
    $user = $db->prepare($sql);
    $parameters = array(
        ':Firstname' => $Firstname,
        ':Lastname' => $Lastname,
        ':Password' => $Password,
        ':Email' => $Email,
        ':Active' => $Active,
        ':isAdmin' => $isAdmin,
        ':Id' => $Id
    );
    $user->execute($parameters);
    return $user->fetch();

    $db = null;

    $message = "Successfully updated info";
    $_SESSION['message'] = $message;
}

// This function fetches al users from the database and then filters out the one user that the administrator was search for
function searchThroughUsers(){
    $db = openDatabaseConnection();

    $Email = $_POST['search'];

    $sql = "SELECT * FROM users WHERE Email = :Email";
    $results = $db->prepare($sql);
    $parameters = array(
        ':Email' => $Email
    );
    $results->execute($parameters);

    return $resutls->fetch();

    $db = null;
}
