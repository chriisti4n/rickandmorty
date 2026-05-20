<?php

session_start();

require_once '../config/database.php';

header('Content-Type: application/json');

if(!isset($_SESSION['user'])){

    echo json_encode([
        'success' => false,
        'message' => 'Usuário não autenticado.'
    ]);

    exit;
}

$db = Database::getConnection();

$id = $_POST['id'] ?? null;

if(!$id){

    echo json_encode([
        'success' => false,
        'message' => 'ID inválido.'
    ]);

    exit;
}

$stmt = $db->prepare("
    DELETE FROM characters
    WHERE id = ?
    AND user_id = ?
");

$success = $stmt->execute([
    $id,
    $_SESSION['user']['id']
]);

if($success){

    echo json_encode([
        'success' => true,
        'message' => 'Personagem excluído com sucesso!'
    ]);

} else {

    echo json_encode([
        'success' => false,
        'message' => 'Erro ao excluir personagem.'
    ]);
}