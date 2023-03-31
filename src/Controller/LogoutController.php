<?php

namespace Alura\Mvc\Controller;

use Alura\Mvc\Repository\UsuarioRepository;

class LogoutController implements Controller
{

    public UsuarioRepository $repository;
    
    public function __construct(UsuarioRepository $repository)
    {
        $this->repository = $repository;
    }

    public function processaRequisicao(): void
    {
      $result =  $this->repository->logout();
     
      if($result)
      {
        header('Location: /login?message=deslogado com sucessso!');
      }
    

    }
}
