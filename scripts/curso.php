<?php
include_once('database.php');

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $nomeCurso = $_POST['nome'];
    $areaCurso = $_POST['area'];
    $cargaCurso = $_POST['carga'];

    $sql = $conexao->prepare("INSERT INTO cursos (nome, area, carga) VALUES (?, ?, ?)");
    $sql->bind_param("ssi", $nomeCurso, $areaCurso, $cargaCurso);

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