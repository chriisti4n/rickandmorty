<?php

session_start();

require_once '../config/database.php';

header('Content-Type: application/json');

$db = Database::getConnection();

$email = $_POST['email'] ?? '';
$password = $_POST['password'] ?? '';

if(empty($email) || empty($password)){

    echo json_encode([
        'success' => false,
        'message' => 'Preencha todos os campos.'
    ]);

    exit;
}

$stmt = $db->prepare("
    SELECT * FROM users WHERE email = ?
");

$stmt->execute([$email]);

$user = $stmt->fetch(PDO::FETCH_ASSOC);

if(!$user){

    echo json_encode([
        'success' => false,
        'message' => 'Usuário não encontrado.'
    ]);

    exit;
}

if(!password_verify($password, $user['password'])){

    echo json_encode([
        'success' => false,
        'message' => 'Senha incorreta.'
    ]);

    exit;
}

$_SESSION['user'] = [
    'id' => $user['id'],
    'name' => $user['name'],
    'email' => $user['email']
];

echo json_encode([
    'success' => true,
    'message' => 'Login realizado com sucesso!'
]);