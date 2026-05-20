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

$name = $_POST['name'] ?? '';
$species = $_POST['species'] ?? '';
$gender = $_POST['gender'] ?? '';
$location = $_POST['location'] ?? '';

if(!$id){

    echo json_encode([
        'success' => false,
        'message' => 'ID inválido.'
    ]);

    exit;
}

$stmt = $db->prepare("
    UPDATE characters
    SET
        name = ?,
        species = ?,
        gender = ?,
        location = ?,
        updated_at = CURRENT_TIMESTAMP
    WHERE id = ?
    AND user_id = ?
");

$success = $stmt->execute([
    $name,
    $species,
    $gender,
    $location,
    $id,
    $_SESSION['user']['id']
]);

if($success){

    echo json_encode([
        'success' => true,
        'message' => 'Personagem atualizado com sucesso!'
    ]);

} else {

    echo json_encode([
        'success' => false,
        'message' => 'Erro ao atualizar personagem.'
    ]);
}