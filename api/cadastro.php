<?php

require_once '../config/database.php';

header('Content-Type: application/json');

$db = Database::getConnection();

$name = $_POST['name'] ?? '';
$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if(empty($name) || empty($email) || empty($password)){

    echo json_encode([
        'success' => false,
        'message' => 'Preencha todos os campos.'
    ]);

    exit;
}

$stmt = $db->prepare("
    SELECT id FROM users WHERE email = ?
");

$stmt->execute([$email]);

$user = $stmt->fetch();

if($user){

    echo json_encode([
        'success' => false,
        'message' => 'E-mail já cadastrado.'
    ]);

    exit;
}

$passwordHash = password_hash($password, PASSWORD_DEFAULT);

$stmt = $db->prepare("
    INSERT INTO users(name, email, password)
    VALUES(?, ?, ?)
");

$success = $stmt->execute([
    $name,
    $email,
    $passwordHash
]);

if($success){

    echo json_encode([
        'success' => true,
        'message' => 'Cadastro realizado com sucesso!'
    ]);

}else{

    echo json_encode([
        'success' => false,
        'message' => 'Erro ao cadastrar.'
    ]);
}