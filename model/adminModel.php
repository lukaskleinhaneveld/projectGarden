<?php

// This function does the database sided updating for the users
function updateeUser($Firstname, $Lastname, $Password, $Email, $Active, $isAdmin, $Id){
    $db = openDatabaseConnection();

    $Password = hash('sha256', $Password);

    $sql = "UPDATE users SET Firstname = :Firstname, Lastname = :Lastname, Password = :Password, Email = :Email, Active = :Active, isAdmin = :isAdmin WHERE Id = :Id";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':Firstname' => $Firstname,
        ':Lastname' => $Lastname,
        ':Password' => $Password,
        ':Email' => $Email,
        ':Active' => $Active,
        ':isAdmin' => $isAdmin,
        ':Id' => $Id
    ));

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


function deleteUserFromDatabase($Id){
    $db = openDatabaseConnection();

    $sql = "DELETE FROM users WHERE Id = :Id";
    $result = $db->prepare($sql);
    $parameters = array(
        ':Id' => $Id
    );
    $result->execute($parameters);
    $db = null;

    if($result->rowCount() < 1){
        $message = "Failed to delete user.";
        header('Location: ' . URL . 'admin/users');
    }else{
        $message = "Successfully deleted user.";
        header('Location: ' . URL . 'admin/users');
    }

    $_SESSION['message'] = $message;
}
