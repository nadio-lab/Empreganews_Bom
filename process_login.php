<?php
session_start();
require 'conexao.php';
$email = $_POST['email'];
 
$password = $_POST['password'];

//Admin

$stmt = $conn->prepare("SELECT id, password, user_type FROM users WHERE email = ?");
$stmt->bind_param("s", $email);
$stmt->execute();
$stmt->store_result();

if ($stmt->num_rows == 1) {
    $stmt->bind_result($id, $hash, $user_type);
    $stmt->fetch();
    if ($password) {
        $_SESSION['user_id'] = $id;
        $_SESSION['user_type'] = $user_type;
        if ($user_type == 'empresa') {
        header('Location: area_empresa.php');
        } if($user_type == 'candidato') {
            header('Location: area_candidato.php');
        }
        exit;
    }
   
}
    //e-mail: admin@gmail.com
    //pass: admin
 if (($email === 'admin@gmail.com') || ($password === 'admin')) {
            header('Location: ../admin/admin.php');
            exit;
         }


header('Location: index.php?error=E-mail ou senha inválidos!');
?>