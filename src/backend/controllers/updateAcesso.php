<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

require_once '../config/connection.php';

$jsonData = $_POST['data'];
$data = json_decode($jsonData, true);
$id  = $data['id'];
$permisao  = $data['permissao'];
$id  = $data['id'];

$sql = "UPDATE `colaborador` SET `permissao` = '$permisao' WHERE `id` = '$id'";

$stmt = $conn->prepare($sql);

if ($stmt->execute()) {
    $response = array(
        'error' => false,
        'message' => 'Dados Atualizados'
    );
    echo json_encode($response);
} else {
    $response = array(
        'error' => true,
        'message' => 'Dados Não Atualizado'
    );
    echo json_encode($response);
}



?>