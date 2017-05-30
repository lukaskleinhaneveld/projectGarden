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

function loadStocks(){
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM stock";
    $stock = $db->prepare($sql);
    $stock->execute();

    return $stock->fetchAll();

    $db = null;
}
function loadStock($Id){
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM stock WHERE Id = :Id LIMIT 1";
    $user = $db->prepare($sql);
    $parameters = array(
        ':Id' => $Id
    );
    $user->execute($parameters);

    return $user->fetch();

    $db = null;
}

function saveDroppableToDb(){
    $db = openDatabaseConnection();

    $sql = "INSERT INTO customGardens (User_Id, PosLeft, PosTop) VALUES (:User_Id, :PosLeft, :PosTop)";
    $garden = $db->prepare($sql);
    $garden->execute(array(
        ':User_Id' => $_SESSION['Id'],
        ':PosLeft' => $posLeft,
        ':PosTop' => $posTop
    ));

    return $garden->fetchAll();

    $db = null;
}
