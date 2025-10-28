<?php
session_start();
include_once("conexao.php");
//$conn->query("SELECT * FROM vagas WHERE id = '$id'");
/*
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $vaga = $conn->query("SELECT * FROM vagas WHERE id = $id");
}*/
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM vagas WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="./img/img/4.png" type="image/x-icon">
    <title>Editar Vagas</title>
    <style type="text/css">

main {
    display: flex;
 
    max-width: 1000px;
    margin: 30px auto;
    flex-wrap: wrap;
    justify-content: center;
}
section {
    background: #fff;
    border-radius: 8px;
    box-shadow: 0 2px 8px #0001;
    padding: 28px 24px;
    min-width: 320px;
    max-width: 520px;
    flex: 1 0 320px;
}
form {
    display: flex;
    flex-direction: column;
    margin-bottom: 16px;
}
input, textarea, button {
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #b3c3db;
    font-size: 16px;
}
input:focus, textarea:focus {
    outline: 2px solid #1976d2;
    border-color: #1976d2;
}
button {
    text-decoration: none;
    padding: 7px 5px;
    border-radius: 6px;
    border: none;  
    background: #2d8cff;
    color: #fff;
    cursor: pointer;
    transition: background .2s, color .2s;
}
button:hover {
    color: #fff;
    background:rgb(13, 70, 150);
}
 
    </style>
</head>
<body>

	<!-- Cabeçalho -->
    <header>
      <div class="logo">
        <h1>Emprega<span style="color: #ffc20a;">New</span></h1>
      </div>
          <nav>
          <div class="link">
          <a href="index.php" class="nav-login">HOME</a>
          </div>
      </nav>
    </header>
     <main> 
         <!-- Área para empresas -->
		<section  id="empresa-login-section" class="publicidades">
		<h1>Editar Vagas da Empresa</h1>
		  <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>

	 	<form method="POST" action="proc_edit_usuario.php">
       <input type="hidden" name="id" value="<?php echo $row_usuario['id']; ?>"><br>
       
       <input type="text" name="nome_empresa" minlength="5" maxlength="50" value="<?php echo $row_usuario['nome_empresa']; ?>" required><br>

       <input type="text" name="nome"  value="<?php echo $row_usuario['nome']; ?>" required><br>

        <input type="text" name="tipo"  value="<?php echo $row_usuario['tipo']; ?>" required><br>

        <input type="text" name="area"  value="<?php echo $row_usuario['area']; ?>"  required><br>

        <input type="text" name="nivel"  value="<?php echo $row_usuario['nivel']; ?>"  required><br>

        <input type="text" name="cidade"  value="<?php echo $row_usuario['cidade']; ?>" required><br>

        <input type="text" name="requisitos" value="<?php echo $row_usuario['requisitos']; ?>" required><br>

        <input type="text" name="beneficios" value="<?php echo $row_usuario['beneficios']; ?>" required><br>

        <input type="text" name="carga" value="<?php echo $row_usuario['carga']; ?>" required><br>
        
        <label>Descrição:</label>
        <textarea name="descricao" minlength="5" maxlength="50"  placeholder="Qual é a descrição desta vaga" value="<?php echo $row_usuario['descricao']; ?>"  required></textarea>
        <br>
        <button type="submit">Editar</button>

		</form>

			</section>

 </main> 

		<!-- Footer -->
		 <footer>
        <div class="footer-main">
            <div class="footer-logo">
               <h1>Emprega<span style="color: #ffc20a;">News</span></h1>
            </div>
            <div class="footer-links">
                <a href="#">Contato</a>
                <a href="#">Política de Privacidade</a>
                <a href="#">Termos de Uso</a>
            </div>
        </div>
        <div class="footer-copy">
            &copy; 2025 EmpregaNews. Todos os direitos reservados.
        </div>
    </footer>

    <script src="script_Version2.js"></script>
	</body>
</html>


    
    
    
           