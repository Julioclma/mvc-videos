<?php

$dbname = "projeto_videos";
$hostName = "localhost";
$userName = "root";
$password = "1234";

$pdo = new PDO("mysql:host=$hostName;dbname=$dbname", "$userName", "$password");


$sql = 'ALTER TABLE videos ADD COLUMN image_path VARCHAR(255)';

$stmt = $pdo->prepare($sql);
$check = $stmt->execute();

if ($check) {
    echo 'coluna image_path adicionada com sucesso!';
}
