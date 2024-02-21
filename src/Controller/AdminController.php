<?php

namespace App\Controller;

use App\Model\User;

class AdminController
{
    private object $user;

    public function __construct()
    {
        $this->user = new User();
    }

    public function getAllUsers()
    {
        $allUsers = $this->user->findAll();
        require_once __DIR__ . '/../View/admin.php';
    }

}