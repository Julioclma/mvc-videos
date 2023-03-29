<?php

namespace Alura\Mvc\Entity;

class Usuario
{
    private string $email;
    private string $password;

    public function __construct(string $email, string $password)
    {
        // $this->setEmail($email);
        $this->email=$email;
        $this->password = $password;
    }

    private function setEmail(string $email): void
    {
        if (strpos($email, '@')) {
            $this->email = $email;
        }
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getPassword(): string
    {
        return $this->password;
    }
}
