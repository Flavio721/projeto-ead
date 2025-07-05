<?php 
include_once("database.php");
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST['nome'] ?? '';
    $sobrenome = $_POST['sobrenome'] ?? '';
    $email = "$nome.$sobrenome@gmail.com";
    $senha = "SenhaInicial";

    $sql = $conexao->prepare("INSERT INTO alunos (nome, sobrenome, email, senha) VALUES (?, ?, ?, ?)");
    $sql->bind_param("ssss", $nome, $sobrenome, $email, $senha);

    if($sql->execute()){
        echo"Sucesso";
        header("Location: ../templates/admin.html");
        exit();
    }
    else{
        echo "nenhuma_linha_afetada";
    }
}
else{
    echo "metodo_invalido";
}
?>