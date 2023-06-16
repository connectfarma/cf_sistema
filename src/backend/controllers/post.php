<?php
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Origin: *");

require_once '../config/connection.php';

$jsonData = $_POST['data'];
$data = json_decode($jsonData, true);

//cadastro de seção
if ($data['tabela'] == 'secao') {
    $sql = "INSERT INTO `secao` (`codigo`,`localizacao`)VALUES(:codigo, :localizacao)";
    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':codigo', $data['codigo']);
    $stmt->bindParam(':localizacao', $data['localizacao']);

    if ($stmt->execute()) {
        $response = array(
            'error' => false,
            'message' => 'Seção Cadastrada'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'error' => true,
            'message' => 'Seção Não Cadastrado'
        );
        echo json_encode($response);
    }
}


;//cadastro de fornecedores
if ($data['tabela'] == 'fornecedores') {
   
    $sql = "INSERT INTO `fornecedores` (`nome_fantasia`, `cnpj`, `email`, `telefone`, `endereco`) VALUES(:nome_fantasia, :cnpj, :email, :telefone, :endereco)";

    $stmt = $conn->prepare($sql);
    $stmt->bindParam(':nome_fantasia', $data['nome_fantasia']);
    $stmt->bindParam(':cnpj', $data['cnpj']);
    $stmt->bindParam(':email', $data['email']);
    $stmt->bindParam(':telefone', $data['telefone']);
    $stmt->bindParam(':endereco', $data['endereco']);
    if ($stmt->execute()) {
        $response = array(
            'error' => false,
            'message' => 'Fornecedor Cadastrado.'
        );
        echo json_encode($response);
    } else {
        $response = array(
            'error' => true,
            'message' => 'Fornecedor Não Cadastrado.'
        );
        echo json_encode($response);
    }
}

?>