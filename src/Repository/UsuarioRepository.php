<?php

namespace Alura\Mvc\Repository;

use Alura\Mvc\Entity\Usuario;
use PDO;

class UsuarioRepository
{
    private PDO $pdo;
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }

    public function login(Usuario $usuario): bool
    {
        $valid = filter_var($usuario->getEmail(), FILTER_VALIDATE_EMAIL);

        if (!$valid) {
            header('Location: /?valid=0');
            exit();
        }

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");

        $stmt->bindValue(':email', $usuario->getEmail());

        $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data) {
            return false;
        }    

       return password_verify($_POST['password'], $data['password']);
    }
}
