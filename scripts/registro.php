<?php
include_once('database.php');

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $sql = $conexao->prepare("INSERT INTO professores (nome, email, senha) VALUES (?, ?, ?)");
    $sql->bind_param('sss', $nome, $email, $senha);

    if($sql->execute()){
        echo "Sucesso";
    }
    else{
        echo "nenhuma_linha_afetada";
    }
}
else{
    echo "metodo_invalido";
}

?>