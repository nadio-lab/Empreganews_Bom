<?php
session_start();
include_once("conexao.php");

$id = filter_input(INPUT_POST, 'id', FILTER_SANITIZE_NUMBER_INT);
$nome_empresa = filter_input(INPUT_POST, 'nome_empresa', FILTER_SANITIZE_STRING);
$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);
$area = filter_input(INPUT_POST, 'area', FILTER_SANITIZE_STRING);
$nivel = filter_input(INPUT_POST, 'nivel', FILTER_SANITIZE_STRING);
$cidade = filter_input(INPUT_POST, 'cidade', FILTER_SANITIZE_STRING);
$requisitos = filter_input(INPUT_POST, 'requisitos', FILTER_SANITIZE_STRING);
$beneficios = filter_input(INPUT_POST, 'beneficios', FILTER_SANITIZE_STRING);
$descricao = filter_input(INPUT_POST, 'descricao', FILTER_SANITIZE_STRING);
 
$carga = filter_input(INPUT_POST, 'carga', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";


$result_usuario = "UPDATE vagas SET nome_empresa='$nome_empresa', nome='$nome', tipo='$tipo', area='$area', nivel='$nivel', cidade='$cidade', requisitos='$requisitos',
beneficios='$beneficios', descricao='$descricao', carga='$carga', modified=NOW() WHERE id='$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_affected_rows($conn)){
	$_SESSION['msg'] = "<p style='color:green;'>Vaga alterada com sucesso</p>";
    header('Location: ./admin/divolgar_empresas.php?id=$id#msg');
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Não foi editado com sucesso</p>";
	header("Location: edit_usuario.php?id=$id");
}

?>