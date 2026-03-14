<?php

$hotst = 'db';
$dbname = 'mydb';
$user = 'user';
$password = 'password';

try {
    $dns = "mysql:host=$hotst;dbname=$dbname;charset=utf8mb4";
    $pdo = new PDO($dns, $user, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}catch (PDOException $e) {
    echo "<h1>Erro ao conectar com o banco de dados:</h1>";
    echo "<p>" . $e->getMessage() . "</p>";
}

?>