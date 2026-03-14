<?php
include_once './connect.php';

$id = $_GET['id'];

try {
    $stmt = $pdo->prepare("DELETE FROM users WHERE id = ?");
    $stmt->execute([$id]);
    header('Location: ../pages/users.php?r=sucesso');
} catch (Exception $e) {
    header('Location: ../pages/users.php?r=erro');
}