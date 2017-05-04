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
<<<<<<< HEAD

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

    $search = $_GET['search'];

    $sql = "SELECT * FROM users WHERE Email LIKE '%".$search."%'";
    $results = $db->prepare($sql);

    $results->execute();
    return $results->fetchAll();
    
    $db = null;
}
=======
>>>>>>> 9a7567c876ff2b70ffddc814c009e55e58b1174a
