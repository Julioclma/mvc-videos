<?php

namespace Alura\Mvc\Controller;

class LoginViewController implements Controller, VerifyLogged
{

    public function __construct()
    {
        $this->verifyLogged();
    }

    public function processaRequisicao(): void
    {
        require_once __DIR__ . "/../../views/login.php";
    }

    public function verifyLogged(): void
    {
        session_start();
        if (array_key_exists('logado', $_SESSION)) {
            header('Location: /');
            exit();
        };
    }
}
