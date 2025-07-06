<?php
include_once('database.php');

$id_aluno = $_GET['id'] ?? 0;

$stmt = $conexao->prepare("
    SELECT m.nome AS materia, n.nota
    FROM notas n
    JOIN materias m ON n.materia_id = m.id
    WHERE n.aluno_id = ?
");
$stmt->bind_param("i", $id_aluno);
$stmt->execute();
$result = $stmt->get_result();

$materias = [];
$notas = [];

while ($row = $result->fetch_assoc()) {
    $materias[] = $row['materia'];
    $notas[] = floatval($row['nota']);
}

echo json_encode([
    "labels" => $materias,
    "data" => $notas
]);
?>

