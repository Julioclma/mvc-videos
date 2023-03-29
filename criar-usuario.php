<?php

$dbname = "projeto_videos";
$hostName = "localhost";
$userName = "root";
$password = "1234";

$pdo = new PDO("mysql:host=$hostName;dbname=$dbname", "$userName", "$password");


$email = $argv[1];
$password = $argv[2];

$hash = password_hash($password, PASSWORD_ARGON2ID);

$sql = 'INSERT INTO users (email, password) VALUES (:email, :password)';

$stmt = $pdo->prepare($sql);
$stmt->bindValue(':email', $email);
$stmt->bindValue(':password', $hash);
$check = $stmt->execute();

if ($check) {
    echo 'usuário criado com sucesso!';
}
