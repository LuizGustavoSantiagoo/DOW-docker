<?php
    include_once './connect.php';


$nome = $_POST['nome'];
$telefone = $_POST['telefone'];
$data_nasc = $_POST['data_nasc'];
$endereco = $_POST['endereco'];

if($nome && $telefone && $data_nasc && $endereco) {
    $sql = "INSERT INTO users (nome, telefone, data_nasc, endereco) VALUES ('$nome', '$telefone', '$data_nasc', '$endereco')";
    $pdo->query($sql);
    header("Location: ../index.php?r=sucesso");
    exit();
}else {
    header("Location: ../index.php?r=erro");
    exit(); 
}
