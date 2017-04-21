<?php
function getAllGardens(){

}


function getUser($user_id){
        $sql = "SELECT Id, Email, Active FROM users WHERE id = :user_id LIMIT 1";
        $query = $db->prepare($sql);
        $parameters = array(':user_id' => $user_id);
        $query->execute($parameters);

        return $query->fetch();
}

function updateeUser($Email, $Active, $user_id){
        $sql = "UPDATE users SET Email = :Email, Active = :Active  WHERE Id = :user_id";
        $query = $db->prepare($sql);
        $parameters = array(':Email' => $Email, ':Active' => $Active, ':user_id' => $user_id);
        $query->execute($parameters);
}

function loadUsers(){
        $db = openDatabaseConnection();
        $sql = "SELECT * FROM users ORDER BY id ASC";
        $query = $db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
}
