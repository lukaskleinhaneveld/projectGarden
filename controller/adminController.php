<?php

require(ROOT."model/gardenModel.php");

 function index(){
	if(empty($_SESSION['isAdmin'])){
		header('location: ' . URL . 'admin/index');
	}else{
		render("admin/index");
		 $users = loadUsers();
	}
}

     function editUser($user_id)
    {
	if(empty($_SESSION['isAdmin'])){
		header('location: ' . URL . 'admin/index');
	}else{
        if (isset($user_id)) {
            $users = getUser($user_id);
            render("admin/edit");
        } 
        else 
            {
            header('location: ' . URL . 'admin/index');
            }
        }
    }
    
    function updateUser()
    {
        if (isset($_POST["submit_update_user"])) {
            updateUser($_POST["name"], $_POST["comment"], $_POST["comment_id"]);
        }
        header('location: ' . URL . 'comments/admin');
    }