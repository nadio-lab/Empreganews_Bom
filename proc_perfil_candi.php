<?php
session_start();
require '../conexao.php';
 // Acessa o IF quando o usuário clicar no botão
 
$dados = filter_input_array(INPUT_POST, FILTER_DEFAULT);
   if (!empty($dados['SendCadImg'])) {
	$arquivo = $_FILES['foto'];
	 for ($cont = 0; $cont < count([$arquivo['name']]); $cont++){
		 $destino = "img/" . $arquivo['name'][$cont];
		 if (move_uploaded_file($arquivo['tmp_name'][$cont], $destino)) {
                $_SESSION['msg'] = "<p style='color: green;'>Upload realizado com sucesso!</p>";
            } else {
                $distino = "<p style='color: #f00;'>imagem vazia</p>";
            }
	 }
	  }
	

        // Receber os arquivos do formulário

    // Imprimir a mensagem de erro ou sucesso da variável global
/* 
echo "E-mail: $destino <br>";
*/
//$conn->query("INSERT INTO empresa (nome, email, foto, created) VALUES ('$nome', '$email', '$destino')");
$id=filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$conn->query("UPDATE users SET foto='$destino' WHERE id='$id'");
	header("Location: area_candidato.php");
    exit();
	
	//echo "<img src='.$destino.'; width='120px'; heigth='120px'; alt=imagem-Perfil>";

    
?>