<?php

// This function does the database sided updating for the users
function updateeUser($Firstname, $Lastname, $Password, $Email, $Active, $isAdmin, $Id){
    $db = openDatabaseConnection();

    //$Password = hash('sha256', $Password);

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
function updateeStock($Name, $Price, $Amount,$Id){
    $db = openDatabaseConnection();

    //$Password = hash('sha256', $Password);

    $sql = "UPDATE stock SET Name = :Name, Price = :Price, Amount = :Amount WHERE Id = :Id";
    $query = $db->prepare($sql);
    $query->execute(array(
        ':Name' => $Name,
        ':Price' => $Price,
        ':Amount' => $Amount,
        ':Id' => $Id
    ));

    $db = null;

    $message = "Successfully updated info";
    $_SESSION['message'] = $message;
}

function createStocks(){
    $db = openDatabaseConnection();

    $Name = isset($_POST['Name']) ? $_POST['Name'] : null;
	$Price = isset($_POST['Price']) ? $_POST['Price'] : null;
	$Amount = isset($_POST['Amount']) ? $_POST['Amount'] : null;

	if (strlen($Name) == 0 || strlen($Price) == 0 || strlen($Amount) == 0) {
		return false;
	}

   $sql = "INSERT INTO stock(Name, Price, Amount) VALUES (:Name, :Price, :Amount)";
    $query = $db->prepare($sql);
	$query->execute(array(
		':Name' => $Name,
		':Price' => $Price,
		':Amount' => $Amount
    ));

    $db = null;


    if($query->rowCount() >= 1){
        echo "Bitch we made it";
        $message = "Successfully created new stock";
    }else{
        $message = "An error accured while trying to create stock, please try again";
    }
    header('Location: ' . URL . 'admin/stock');
    $_SESSION['message'] = $message;
}

function deleteStockFromDatabase($Id){
    $db = openDatabaseConnection();

    $sql = "DELETE FROM stock WHERE Id = :Id";
    $result = $db->prepare($sql);
    $parameters = array(
        ':Id' => $Id
    );
    $result->execute($parameters);
    $db = null;

    if($result->rowCount() < 1){
        $message = "Failed to delete stock.";
        header('Location: ' . URL . 'admin/stock');
    }else{
        $message = "Successfully deleted stock.";
        header('Location: ' . URL . 'admin/stock');
    }

    $_SESSION['message'] = $message;
}
