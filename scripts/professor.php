<?php
include_once('database.php');

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST['nome'] ?? '';
    $email = $_POST['email'] ?? '';
    $senha = $_POST['senha'] ?? '';

    $sql = $conexao->query("SELECT * FROM professores WHERE email = '$email'");

    if($sql->num_rows > 0){
        echo "Sucesso";
    }
    else{
        echo "Erro";
    }
}
else{
    echo "metodo_invalido";
}
?>