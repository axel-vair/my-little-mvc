<?php

namespace App\Route;
use App\Controller\AuthenticationController;

$router->map('GET', '/register', function (){
    echo "Welcome to register page";
    $registerController = new AuthenticationController();
    $registerController->showPage();
});
$router->map('POST', '/register', function() {
    /* require __DIR__ . '/src/View/shop.php'; */

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $registerController = new AuthenticationController();
    $response = $registerController->register($fullname, $email, $password);

    echo json_encode($response);
}, 'register');