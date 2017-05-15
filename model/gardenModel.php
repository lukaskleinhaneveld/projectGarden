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

function loadStock(){
    $db = openDatabaseConnection();

    $sql = "SELECT * FROM stock";
    $stocks = $db->prepare($sql);
    $stocks->execute();

    return $stocks->fetchAll();

    $db = null;
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
		':Amount' => $Amount));

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

    
	
