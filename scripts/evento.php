<?php
include_once('database.php');

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $dataEvento = $_POST['dia'];
    $dataVolta = $_POST['volta'];
    $nomeEvento = $_POST['nome'];

    $sql = $conexao->prepare("INSERT INTO feriados (data_evento, data_volta, nome_evento) VALUES (?, ?, ?)");
    $sql->bind_param('sss', $dataEvento, $dataVolta, $nomeEvento);

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