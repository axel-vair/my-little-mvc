<?php

namespace App\Model;

use PDO;

class User
{
    private ?int $id = null;
    private ?string $fullname = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?string $role = null;

    public function findOneById($id): ?User
    {
        $pdo = new PDO('mysql:host=localhost:5432;dbname=mvc', 'user', 'pass');
        $sql = "SELECT * FROM user WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $userData = $statement->fetch(PDO::FETCH_ASSOC);

        if ($userData) {
            $user = new User();
            $user->setId($userData['id'])
                ->setFullname($userData['fullname'])
                ->setEmail($userData['email'])
                ->setPassword($userData['password'])
                ->setRole($userData['role']);
            return $user;
        } else {
            return null;
        }
    }


    public function findAll()
    {
        $pdo = new PDO('mysql:host=localhost:5432;dbname=mvc', 'user', 'pass');
        $sql = "SELECT * FROM user";
        $statement = $pdo->prepare($sql);
        $statement->execute();
        $users = $statement->fetchAll(\PDO::FETCH_ASSOC);
        return $users;
    }

    public function verifUser($email)
    {
        $pdo = new PDO('mysql:host=localhost:5432;dbname=mvc', 'user', 'pass');
        $sql = "SELECT * FROM user WHERE email = :email";
        $sql_exe = $pdo->prepare($sql);
        $sql_exe->execute([
            'email' => $email,
        ]);
        $results = $sql_exe->fetch(PDO::FETCH_ASSOC);
        if ($results) {
            return true;
        } else {
            return false;
        }
    }

    public function create($fullname, $email, $password)
    {
        if (empty($email) || empty($password)) {
            return false;
        }
        $pdo = new PDO('mysql:host=localhost:5432;dbname=mvc', 'user', 'pass');
        $role = "customer";
        if (!$this->verifUser($email)) {
            $sql = "INSERT INTO user (fullname, email, password, role)
                    VALUES (:fullname, :email, :password, :role)";
            $sql_exe = $pdo->prepare($sql);
            $hashedPassword = password_hash($password, PASSWORD_DEFAULT);
            $sql_exe->execute([
                'fullname' => $fullname,
                'email' => $email,
                'password' => $hashedPassword,
                'role' => $role,
            ]);
            if ($sql_exe) {
                return true;
            } else {
                return false;
            }
        } else {
            return false;
        }
    }

    public function deleteUser($id)
    {
        $pdo = new PDO('mysql:host=localhost:5432;dbname=mvc', 'user', 'pass');
        $sql = "DELETE FROM user WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->execute(['id' => $id]);
        return $statement->rowCount() > 0;
    }

    public function update($fullname, $email, $password)
    {
        $pdo = new PDO('mysql:host=localhost:5432;dbname=mvc', 'user', 'pass');
        $sql = "UPDATE user SET fullname = :fullname, email = :email, password = :password WHERE id = :id";
        $sql_exe = $pdo->prepare($sql);
        $sql_exe->execute([
            'fullname' => htmlspecialchars($fullname),
            'email' => htmlspecialchars($email),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'id' => $_SESSION['user']['id'],

        ]);
        if ($sql_exe) {
            return true;
        } else {
            return false;
        }
    }

    public function updateUser($id, $fullname, $email, $password, $role){
        $pdo = new PDO('mysql:host=localhost:5432;dbname=mvc', 'user', 'pass');
        $sql = "UPDATE user SET fullname = :fullname, email = :email, password = :password, role = :role WHERE id = :id";
        $sql_exe = $pdo->prepare($sql);
        $sql_exe->execute([
            'id' => $id,
            'fullname' => htmlspecialchars($fullname),
            'email' => htmlspecialchars($email),
            'password' => password_hash($password, PASSWORD_DEFAULT),
            'role' => htmlspecialchars($role),
        ]);
        if ($sql_exe) {
            return true;
        } else {
            return false;
        }
    }
    public static function isLoggedIn(){
        return $_SESSION['user'];
    }

    public function connection($email, $password)
    {
        $pdo = new PDO('mysql:host=localhost:5432;dbname=mvc', 'user', 'pass');
        $sql = "SELECT * FROM user WHERE email = :email";
        $sql_exe = $pdo->prepare($sql);
        $sql_exe->execute([
            'email' => $email
        ]);

        $user = $sql_exe->fetch(PDO::FETCH_ASSOC);
        if ($user) {
            $hashed_password = $user['password'];
            if (password_verify($password, $hashed_password)) {
                if (!$_SESSION) {
                    $_SESSION['user'] = $user;
                }
                header('Location: /my-little-mvc/shop');
                return true;
            } else {
                $_SESSION['error'] = "Les identifiants fournis ne correspondent à aucun utilisateur";
                header('Location: /my-little-mvc/login');
                return false;
            }
        } else {
            $_SESSION['error'] = "Les identifiants fournis ne correspondent à aucun utilisateur";
            header('Location: /my-little-mvc/login');
            return false;
        }
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): User
    {
        $this->id = $id;
        return $this;
    }

    public function getFullname(): ?string
    {
        return $this->fullname;
    }

    public function setFullname(?string $fullname): User
    {
        $this->fullname = $fullname;
        return $this;
    }

    public function getEmail(): ?string
    {
        return $this->email;
    }

    public function setEmail(?string $email): User
    {
        $this->email = $email;
        return $this;
    }

    public function getPassword(): ?string
    {
        return $this->password;
    }

    public function setPassword(?string $password): User
    {
        $this->password = $password;
        return $this;
    }

    public function getRole(): ?string {
        return $this->role;
    }

    public function setRole(?string $role): User
    {
        $this->role = $role;
        return $this;
    }


}