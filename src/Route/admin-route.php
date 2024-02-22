<?php


namespace App\Route;

use App\Controller\AdminController;

$router->map('GET', '/admin/users/list', function () {
    $adminController = new AdminController();
    $adminController->getAllUsers();
});

$router->map('GET', '/admin/users/show/[i:id]', function ($id){
    $adminController = new AdminController();
    $adminController->getUserById($id);
});

$router->map('GET', '/admin/user/edit/[i:id]', function ($id){
    $adminController = new AdminController();
    $adminController->editUser($id);
});


$router->map('POST', '/admin/user/edit/[i:id]', function ($id){

    $fullname = $_POST['fullname'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $adminController = new AdminController();
    $adminController->editUser($id, $fullname, $email, $password, $role);
});
