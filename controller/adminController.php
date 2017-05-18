<?php

require(ROOT."model/gardenModel.php");
require(ROOT."model/adminModel.php");
require(ROOT."model/loginModel.php");


// This function displays the "admin/index" page
function index(){
    if($_SESSION['isAdmin'] != 1){
        $message = "You are not authorized to go to that page";
        $_SESSION['message'] = $message;
		header('location: ' . URL . 'home/index');
	}else{
		render("admin/index", array(
            'users' => loadUsers()
        ));
	}
}

function test(){
    if($_SESSION['isAdmin'] != 1){
        $message = "You are not authorized to go to that page";
        $_SESSION['message'] = $message;
		header('location: ' . URL . 'home/index');
	}else{
		render("admin/test", array(
            'stock' => loadStock()
        ));
	}
}

// This function displays the "admin/user" page
function editUser($Id){
    if(empty($_SESSION['isAdmin'])){
        header('location: ' . URL . 'admin/users');
    }else{
        if (isset($Id)) {
            $user = loadUser($Id);
            render("admin/edit", array(
                'Id' => $user['Id'],
                'user' => loadUser($Id)
            ));
        }else{
            header('location: ' . URL . 'admin/users');
        }
    }
}

// This function updates the user information
function updateUser($Id){
    if(empty($_SESSION['isAdmin'])){
        header('location: ' . URL . 'home/index');
        $message = "You are not authorised to do that.";
    }else{
        $user = loadUser($Id);
        loadUser($Id);
        // Check if the user has changed their info, else: use the know information
        if(isset($_POST['submit_update_user'])){
            if(isset($_POST['Firstname'])){
                $Firstname = $_POST['Firstname'];
            }else{
                $Firstname = $user['Firstname'];
            };
            if(isset($_POST['Lastname'])){
                $Lastname = $_POST['Lastname'];
            }else{
                $Lastname = $user['Lastname'];
            };
            if(isset($_POST['Password'])){
                $Password = $_POST['Password'];
            }else{
                $Password = $user['Password'];
            };
            if(isset($_POST['Email'])){
                $Email = $_POST['Email'];
            }else{
                $Email = $user['Email'];
            };
            if(isset($_POST['Active'])){
                $Active = $_POST['Active'];
            }else{
                $Active = $user['Active'];
            };
            if(isset($_POST['isAdmin'])){
                $isAdmin = $_POST['isAdmin'];
            }else{
                $isAdmin = $user['isAdmin'];
            };

            updateeUser($Firstname, $Lastname, $Password, $Email, $Active, $isAdmin, $Id);
            render("home/index", array(
                'user' => loadUser($Id)
            ));
            header('Location: ' . URL . 'admin/users');
        }
    }
}

// Function to display the "admin/users" page
function users(){
    if(!empty($_SESSION['LoggedIn'])){
        render("admin/users", array(
            'users' => loadUsers()
        ));
	}else{
		header('location: ' . URL . 'login/index');
    }

}

// This function is activated by the search function in the search bar in "admin/users"
function findUser(){
    if(!empty($_SESSION['isAdmin'])){

        if (isset($_GET['search'])) {
                // Activates the searchThroughUsers function in the "gardenModel"
                $results = searchThroughUsers();
            } else{ header('location: ' . URL . 'login/index'); }
    }else{
        $message = "Please enter a valid search request";
    }
        render("admin/searchResults", array(
            'results' => $results
        ));
    //$_SESSION['message'] = $message;
}

function deleteUser($Id){
    deleteUserFromDatabase($Id);
}

function stock(){
    if(!empty($_SESSION['isAdmin'])){
        render("admin/stock", array(
            'stocks' => loadStock()
        ));
	}else{
		header('location: ' . URL . 'login/index');
    }
}

function createStock(){
    if(!empty($_SESSION['isAdmin'])){
        render("admin/createStock");
        createStocks();
	}else{
		header('location: ' . URL . 'login/index');
    }
}
function deleteStock($Id){
    deleteStockFromDatabase($Id);
}

function updateStock($Id){
    if(empty($_SESSION['isAdmin'])){
        header('location: ' . URL . 'home/index');
        $message = "You are not authorised to do that.";
    }else{
        $user = loadUser($Id);
        loadUser($Id);
        // Check if the user has changed their info, else: use the know information
        if(isset($_POST['submit_update_user'])){
            if(isset($_POST['Name'])){
                $Name = $_POST['Name'];
            }else{
                $Name = $user['Name'];
            };
            if(isset($_POST['Price'])){
                $Price = $_POST['Price'];
            }else{
                $Price = $user['Price'];
            };
            if(isset($_POST['Amount'])){
                $Amount = $_POST['Amount'];
            }else{
                $Amount = $user['Amount'];
            };
            if(isset($_POST['isAdmin'])){
                $isAdmin = $_POST['isAdmin'];
            }else{
                $isAdmin = $user['isAdmin'];
            };

            updateeStock($Name, $Price, $Amount, $isAdmin, $Id);
            render("home/index", array(
                'user' => loadUser($Id)
            ));
            header('Location: ' . URL . 'admin/users');
        }
    }
}
