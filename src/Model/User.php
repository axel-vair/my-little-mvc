<?php

namespace App\Model;

use PDO;

class User
{
    private ?int $id = null;
    private ?string $fullname = null;
    private ?string $email = null;
    private ?string $password = null;
    private ?array $role = [];

    public function findOneById($id)
    {
        $pdo = new PDO('mysql:host=localhost:5432;dbname=mvc', 'user', 'pass');
        $sql = "SELECT * FROM user WHERE id = :id";
        $statement = $pdo->prepare($sql);
        $statement->bindValue(':id', $id);
        $statement->execute();
        $user = $statement->fetchAll(PDO::FETCH_ASSOC);
        return $user;
    }


    public function findAll()
    {

    }

    public function create()
    {

    }

    public function update()
    {

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

    public function getRole(): ?array
    {
        return $this->role;
    }

    public function setRole(?array $role): User
    {
        $this->role = $role;
        return $this;
    }


}