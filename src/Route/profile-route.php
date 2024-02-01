<?php

namespace App\Route;
use App\Controller\ProfileController;

$router->map('GET', '/profile', function (){
    $profileController = new ProfileController();
    $profileController->showPage();
});
