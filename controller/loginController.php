<?php
require(ROOT . "model/loginModel.php");

function index()
{
    if (!empty($_SESSION['LoggedIn'])) {
        header('location: ' . URL . 'home/index');
    } else {
        render("login/index");
    }
}

function loginProcess()
{
    $message = "";
    $Email = $_POST['Email'];
    $Password = $_POST['Password'];

    loginUser($Email, $Password);

    if (isset($_SESSION['Firstname']) && isset($_SESSION['Lastname'])) {
        header('Location: ' . URL . 'home/index');
    } else {
        header('Location: ' . URL . 'login/index');
        $message = "Login failed!";
    }


}

function logout()
{
    $message = "";
    if (!empty($_SESSION['Firstname']) && !empty($_SESSION['Lastname'])) {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['Yes'])) {
                session_unset($_SESSION['LoggedIn']);
                $message = "Logged out";
                header('Location: ' . URL . 'home/index');
                $_SESSION['message'] = $message;
            } else {
                header('Location: ' . URL . 'home/index');
            }
        }
    } else {
        header('Location: ' . URL . 'login/index');
    }
    $_SESSION['message'] = $message;


    render("login/logout");
}
