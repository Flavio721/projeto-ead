<?php 
include_once("database.php");
if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST['nome'] ?? '';
    $sobrenome = $_POST['sobrenome'] ?? '';
    $email = "$nome.$sobrenome@gmail.com";
    $senha = "SenhaInicial";
    $cep = $_POST['cep'] ?? '';
    $rua = $_POST['rua'] ?? '';
    $bairro = $_POST['bairro'] ?? '';
    $cidade = $_POST['cidade'] ?? '';

    $sql = $conexao->prepare("INSERT INTO alunos (nome, sobrenome, email, senha, cep, rua, bairro, cidade) VALUES (?, ?, ?, ?, ?, ?, ?, ?)");
    $sql->bind_param("ssssisss", $nome, $sobrenome, $email, $senha, $cep, $rua, $bairro, $cidade);
    $sql->execute();

    if($sql->affected_rows > 1){
        echo"Sucesso";
    }
    else{
        echo "nenhuma_linha_afetada";
    }
}
else{
    echo "metodo_invalido";
}
?>