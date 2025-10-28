<?php
require 'conexao.php';
//$_SESSION['candidato_id'] = $id['id'];
$user_type = $_POST['user_type'];
$nome = $_POST['nome'];
$email = $_POST['email'];
//$password = $_POST['password'];
//criptogra a password
$password = password_hash($_POST['password'], PASSWORD_DEFAULT);
//password_hash($_POST['password'], PASSWORD_DEFAULT);

if ($user_type == 'empresa') {
    $nif = $_POST['nif'];
    $empresa_nome = $_POST['empresa_nome'];
    $empresa_endereco = $_POST['empresa_endereco'];
    $empresa_contacto = $_POST['empresa_contacto'];
    if (empty($nif) || empty($empresa_nome) || empty($empresa_endereco) || empty($empresa_contacto)) {
        header('Location: register.php?error=Preencha todos os campos da empresa!');
        exit;
    }
}


// Verifica se o e-mail já existe
$stmt = $conn->prepare("SELECT id FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();
if ($stmt->num_rows > 0) {
    header('Location: register.php?error=E-mail já cadastrado! tente outro');
    exit;
}
$stmt->close();

if ($user_type == 'empresa') {
    $stmt = $conn->prepare("INSERT INTO users (nome, email, password, user_type, nif, empresa_nome, empresa_endereco, empresa_contacto, data) VALUES (?, ?, ?, ?, ?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssssssss", $nome, $email, $password, $user_type, $nif, $empresa_nome, $empresa_endereco, $empresa_contacto);
  
} else {
    $stmt = $conn->prepare("INSERT INTO users (nome, email, password, user_type, data) VALUES (?, ?, ?, ?, NOW())");
    $stmt->bind_param("ssss", $nome, $email, $password, $user_type);
}

if ($stmt->execute()) {
    header('Location: index.php');
} else {
    header('Location: register.php?error=Erro ao cadastrar!');
}
$stmt->close();
$conn->close();
?>