<?php

namespace App\Controller;

use App\Model\User;

class AuthenticationController{

    public object $user;

    public function __construct(){
        $this->user = new User();
    }

    public function showPage(){
        require __DIR__  . '/../View/register.php';
    }
    public function register(string $fullname, string $email, string $password){
        $success = $this->user->create($fullname, $email, $password);
        return ['success' => $success];

    }
}