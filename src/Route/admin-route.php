<?php


namespace App\Route;

use App\Controller\AdminController;

$router->map('GET', '/admin/users/list', function () {
    $adminController = new AdminController();
    $adminController->getAllUsers();
});
