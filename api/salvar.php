<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

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

try {

    $db = Database::getConnection();

    $userId = $_SESSION['user']['id'];

    $name = $_POST['name'] ?? '';
    $species = $_POST['species'] ?? '';
    $gender = $_POST['gender'] ?? '';
    $location = $_POST['location'] ?? '';
    $image = $_POST['image'] ?? '';
    $url = $_POST['url'] ?? '';

    if(
        empty($name) ||
        empty($species) ||
        empty($image) ||
        empty($url)
    ){

        echo json_encode([
            'success' => false,
            'message' => 'Dados do personagem inválidos.'
        ]);

        exit;
    }

    $check = $db->prepare("
        SELECT id
        FROM characters
        WHERE user_id = ?
        AND url = ?
    ");

    $check->execute([
        $userId,
        $url
    ]);

    $exists = $check->fetch();

    if($exists){

        echo json_encode([
            'success' => false,
            'message' => 'Personagem já salvo.'
        ]);

        exit;
    }

    $stmt = $db->prepare("
        INSERT INTO characters (
            user_id,
            name,
            species,
            gender,
            location,
            image,
            url
        )
        VALUES (?, ?, ?, ?, ?, ?, ?)
    ");

    $success = $stmt->execute([
        $userId,
        $name,
        $species,
        $gender,
        $location,
        $image,
        $url
    ]);

    if($success){

        echo json_encode([
            'success' => true,
            'message' => 'Personagem salvo com sucesso!'
        ]);

    } else {

        echo json_encode([
            'success' => false,
            'message' => 'Erro ao salvar personagem.'
        ]);
    }

} catch(Exception $e){

    echo json_encode([
        'success' => false,
        'message' => $e->getMessage()
    ]);
}