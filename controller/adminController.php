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

// This function displays the "admin/user" page
function editUser($Id){
    if(empty($_SESSION['isAdmin'])){
        header('location: ' . URL . 'admin/index');
    }else{
        if (isset($Id)) {
            $user = loadUser($Id);
            render("admin/edit", array(
                'Id' => $user['Id'],
                'user' => loadUser($Id)
            ));
        }else{
            header('location: ' . URL . 'admin/index');
        }
    }
}

// This function updates the user information
function updateUser($Id){
    if(empty($_SESSION['isAdmin'])){
        header('location: ' . URL . 'admin/index');
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


//if(!empty($_REQUEST['search'])){
//
//    $search = $_REQUEST['search'];
//
//    $sql = "SELECT * FROM schoenmerk WHERE schoenmerk LIKE '%".$search."%'"; 
//    $r_query = mysqli_query($connection, $sql); 
//
//    while ($row = mysqli_fetch_array($r_query)){  
//       $id = $row["id"];
//	$schoenmerk = $row["schoenmerk"];
//
//	$tpl->newBlock( "schoenmerk");
//    $tpl->assign( "id", $id );
//	$tpl->assign( "schoenmerk", $schoenmerk );
//        
//           $getSize = "select * from sizes where schoenmerk_id =$id";
//
//    $size_result = mysqli_query($connection, $getSize);
//    
//    while ($row_size = mysqli_fetch_assoc ($size_result))
//    {
//        $id = $row_size["id"];
//        $schoenmerk_id = $row_size["schoenmerk_id"];
//        $size = $row_size["size"];
//
//        $tpl->newBlock( "size");
//        $tpl->assign( "id", $id );
//        $tpl->assign( "schoenmerk_id", $schoenmerk_id );
//        $tpl->assign( "size", $size );
//    }
//    
//    }
//    
//}else{
//    echo "<h1>Please enter a valid search request</h1>";
//}


function findUser(){
    if(!empty($_SESSION['isAdmin'])){
     
        if (isset($_GET['search'])) {
                // Activates the searchThroughUsers function in the "gardenModel"
                $results = searchThroughUsers();
            } else{ header('location: ' . URL . 'login/index'); }
    }else{
        $message = "Please enter a valid search request";
    }
<<<<<<< HEAD
        render("admin/searchResults", array(
            'results' => $results
        ));
    //$_SESSION['message'] = $message;
}
=======
}

function deleteUser($Id){
    deleteUserFromDatabase($Id);
}
>>>>>>> 9a7567c876ff2b70ffddc814c009e55e58b1174a
