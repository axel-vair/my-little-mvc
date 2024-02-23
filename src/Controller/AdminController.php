<?php

namespace App\Controller;

use App\Model\User;

class AdminController
{
    private object $user;

    public function __construct()
    {
        $this->user = new User();
        session_start();
    }

    public function getAllUsers()
    {
        $allUsers = $this->user->findAll();
        require_once __DIR__ . '/../View/admin.php';
    }

    public function getUserById($id)
    {
        $userById = $this->user->findOneById($id);
        require_once __DIR__ . '/../View/admin-show.php';
    }

    public function showUser($id)
    {
        $userToUpdate =  $this->user->findOneById($id);
        require_once __DIR__ . '/../View/admin-edit.php';

    }
    public function editUser($id, $fullname, $email, $password, $role)
    {
        $userToUpdate = $this->user->findOneById($id);

        $success = $this->user->updateUser($id, $fullname, $email, $password, $role);
        require_once __DIR__ . '/../View/admin-edit.php';
        header('location: /my-little-mvc/admin/user/edit/'.$id);
    }

    public function deleteUser($id)
    {
        $success = $this->user->deleteUser($id);
        if ($success) {
            header('Location: /my-little-mvc/admin/users/list');
        } else {
            echo "Une erreur s'est produite lors de la suppression de l'utilisateur.";
        }
    }

}