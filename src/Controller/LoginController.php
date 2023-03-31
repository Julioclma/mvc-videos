<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Entity\Usuario;
use Alura\Mvc\Repository\UsuarioRepository;

class LoginController implements Controller
{


    private UsuarioRepository $repository;

    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function processaRequisicao(): void
    {

        $result =  $this->repository->login(new Usuario($_POST['email'], $_POST['password']));

        if ($result) {
            $_SESSION['logado'] = true;
            header('Location: /?message=logado com sucesso');
            exit();
        }   

        header('Location: /login?sucess=0');
    }    
}
