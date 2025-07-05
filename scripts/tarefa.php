<?php
include_once('database.php');

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $materia = $_POST['materia'] ?? '';
    $data_postagem = $_POST['postagem'] ?? '';
    $prazo = $_POST['prazo'] ?? '';
    $objetivo = $_POST['objetivo'] ?? '';

    $sql = "INSERT INTO tarefas (materia, data_postagem, data_limite, objetivo) VALUES (?, ?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("ssss", $materia, $data_postagem, $prazo, $objetivo);
    $stmt->execute();

    if($stmt->affected_rows > 0){
        echo 'Sucesso';
    }
    else{
        echo "nenhuma_linha_afetada";
    }
}
else{
    echo "metodo_invalido";
}
?>