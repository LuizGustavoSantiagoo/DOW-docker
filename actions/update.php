<?php
include "./connect.php";

$id = $_POST['id'];
$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$data_nasc = $_POST['data_nasc'];
$endereco = $_POST['endereco'];

try {
    $stmt = $pdo->prepare("UPDATE users SET nome = ?, telefone = ?, data_nasc = ?, endereco = ? WHERE id = ?");
    $stmt->execute([$nome, $telefone, $data_nasc, $endereco, $id]);
    header("Location: ../index.php?id=$id&r=sucesso");
} catch (Exception $e) {
    header("Location: ../index.php?id=$id&r=erro");
}