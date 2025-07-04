<?php
include_once('database.php');

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome = $_POST['nome'];
    $sobrenome = $_POST['sobrenome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];
    $cep = $_POST['cep'];
    $rua = $_POST['rua'];
    $bairro = $_POST['bairro'];
    $cidade = $_POST['cidade'];

    $stmt = $conexao->prepare("INSERT INTO inscricao (nome, sobrenome, email, senha, cep, rua, bairro, cidade)VALUES (?, ?, ?, ?, ?, ?, ?, ?)");

    $stmt->bind_param("ssssssss", $nome, $sobrenome, $email, $senha, $cep, $rua, $bairro, $cidade);

    if ($stmt->execute()) {
        echo "Inscrição realizada com sucesso!";
        header("Location: templates/homepage.html");
        exit();
    } else {
        echo "Erro ao salvar: " . $stmt->error;
    }

    $stmt->close();
    $conexao->close();
}

?>