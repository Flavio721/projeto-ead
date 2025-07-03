<?php
include_once('database.php');

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nome_aluno = $_POST['nome'] ?? '';
    $materia = $_POST['disciplina'] ?? '';
    $nota = $_POST['nota'] ?? '';


    $result_aluno = $conexao->query("SELECT id FROM alunos WHERE nome = '$nome_aluno'");
    $linha_aluno = $result_aluno->fetch_assoc();
    if ($linha_aluno) {
        $id_aluno = $linha_aluno['id'];
    } else {
        die("Aluno não encontrado.");
    }


    $result_materia = $conexao->query("SELECT id FROM materias WHERE nome = '$materia'");
    $linha_materia = $result_materia->fetch_assoc();
    if ($linha_materia) {
        $id_materia = $linha_materia['id'];
    } else {
        die("Aluno não encontrado.");
    }
    
    $sql = "INSERT INTO notas (aluno_id, materia_id, nota) VALUES (?, ?, ?)";
    $stmt = $conexao->prepare($sql);
    $stmt->bind_param("iid", $id_aluno, $id_materia, $nota);
    $stmt->execute();

    if($stmt->affected_rows > 0){
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