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
            return false;
        }

        $stmt = $this->pdo->prepare("SELECT * FROM users WHERE email = :email");

        $stmt->bindValue(':email', $usuario->getEmail());

        $check =  $stmt->execute();

        $data = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$data || !$check) {
            return false;
        }

        return password_verify($_POST['password'], $data['password']);
    }

    public function logout(): bool
    {

        if (array_key_exists('logado', $_SESSION)) {
            session_destroy();
            return true;
        }

        return false;
    }
}
