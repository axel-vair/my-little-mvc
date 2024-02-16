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
            $user = $_SESSION['user'];
            $userFromDatabase = $this->user->findOneById($user['id']);
            require __DIR__ . '/../View/profile.php';
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

    public function updateProfil(string $fullname, string $email, string $password){
        if(User::isLoggedIn()){
            $success = $this->user->update($fullname, $email, $password);
            if($success){
                $user = $this->user->findOneById($_SESSION['user']['id']);
                return ['success', $success, $user];

            }else{
                return ['success', $success, null];
            }
        }else{
            header('Location: /my-little-mvc/login');
            exit();

        }
    }

}
