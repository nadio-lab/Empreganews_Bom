<?php
session_start();
include_once("conexao.php");


/*dados do candidato*/

$nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);
$password = filter_input(INPUT_POST, 'password', FILTER_SANITIZE_STRING);
$tipo = filter_input(INPUT_POST, 'tipo', FILTER_SANITIZE_STRING);

//echo "Nome: $nome <br>";
//echo "E-mail: $email <br>";

$result_usuario = "INSERT INTO `usuarios` (nome, email, password, tipo, created) VALUES ('$nome', '$email','$password', '$tipo', NOW())";
$resultado_usuario = mysqli_query($conn, $result_usuario);

if(mysqli_insert_id($conn)){
    $_SESSION['msg'] = "<p style='color:green;'>Usuário foi cadastrado com sucesso</p>";
    header("Location: ./cadastro/cadastrar_proc.php");
}else{
	$_SESSION['msg'] = "<p style='color:red;'>Usuário não foi cadastrado com sucesso cadastra-se novamente</p>";
	header("Location: ./cadastro/cadastro.php");
}
/*
	//Incluindo a conexão com banco de dados
//O campo usuário e senha preenchido entra no if para validar
	if((isset($_POST['tipo']))){
	   $tipo =  $_POST['tipo'];
		if ($tipo === 'Empresa'){
			header("Location: divolgar.php");
		}if($tipo === 'Candidato'){
			header("Location: vagas.php");
		}
		//Não foi encontrado um usuario na tabela usuário com os mesmos dados digitado no formulário
		//redireciona o usuario para a página de login
		}else{	
			//Váriavel global recebendo a mensagem de erro
			$_SESSION['msg'] = "<p style='color:red;'>Usuário nao foi possivel com sucesso</p>";
			header("Location: ./cadastro/cadastro.php");
		}
	//O campo usuário e senha não preenchido entra no else e redireciona o usuário para a página de login
	*/

?>
  
