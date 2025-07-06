<?php
ini_set('display_errors', 1);
error_reporting(E_ALL);
include_once('database.php');

$nome = $_GET['nome'] ?? '';

if (!$nome) {
    echo json_encode(["id" => null]);
    exit;
}

$nome = $_GET['nome'] ?? '';

$sql = $conexao->prepare("SELECT * FROM alunos WHERE nome = ?");
$sql->bind_param('s', $nome);
$sql->execute();
$result = $sql->get_result();

if($row = $result->fetch_assoc()){
    echo json_encode(["id" => $row["id"]]);
}
else{
    echo json_encode(["id" => null]);
}

?>