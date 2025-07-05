<?php
include_once('database.php');

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nomeAluno = $_POST['nome'] ?? '';
    $sobrenomeAluno = $_POST['sobrenome'] ?? '';
    $emailAluno = $_POST['email'] ?? '';
    $SenhaAluno = $_POST['senha'] ?? '';
    
    $sql = $conexao->query("SELECT * FROM alunos WHERE email = '$emailAluno'");

    if($sql->num_rows > 0){
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