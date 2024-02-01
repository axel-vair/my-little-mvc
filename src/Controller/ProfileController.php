<?php

namespace App\Controller;

use App\Model\User;

class ProfileController
{
    public object $user;

    public function __construct(){
        $this->user = new User();
        session_start();
    }

    public function showPage(){
        $user = $this->profile();
        require __DIR__ . '/../View/profile.php';

        return $user;
    }

    public function profile(){
       if(User::isLoggedIn()){
           $user = $_SESSION['user'];
           return $user;
       }else{
           header('Location: /my-little-mvc/login');
           exit();
       }

    }

}
