<?php

namespace Alura\Mvc\Controller;

class LoginViewController implements Controller
{

    public function __construct()
    {
    }

    public function processaRequisicao(): void
    {
        require_once __DIR__ . "/../../views/login.php";
    }

}
