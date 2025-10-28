 <?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'candidato') {
    header('Location: index.php');
    exit;
}
require '../conexao.php';

$stmt = $conn->prepare("SELECT nome, email FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($nome, $email);
$stmt->fetch();
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/style_Version2.css">
    <link rel="shortcut icon" href="../img/img/4.png" type="image/x-icon">
    <title>editar perfil</title>
     <style type="text/css">
   .watch-btn1 {
    text-decoration: none;
    padding: 7px 14px;
    border-radius: 6px;
    border: none;
    background: #ccc;
    color: #2d8cff;
    font-weight: bold;
    cursor: pointer;
    transition: background .2s, color .2s;
}
    .watch-btn1:hover {
    background: #225fa2;
    color: #fff;
}
    .watch-btn2 {
    text-decoration: none;
    padding: 7px 14px;
    border-radius: 6px;
    border: none;
    background: #ccc;
    color: #225fa2;
    font-weight: bold;
    cursor: pointer;
    transition: background .2s, color .2s;
}
    .watch-btn2:hover {
    background: #2d8cff;
    color: #fff;
} 
/**/
main {
    display: flex;
    gap: 40px;
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
    min-width: 60%;
    max-width: 420px;
    flex: 1 0 320px;
}
form {
    display: flex;
    flex-direction: column;
    gap: 8px;
    margin-bottom: 16px;
}
input, select, button {
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #b3c3db;
    font-size: 16px;
}
input:focus, select:focus {
    outline: 2px solid #1976d2;
    border-color: #1976d2;
}
button {
    background: #1976d2;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background .2s;
}
button:hover {
    background: #1250a5;
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
            
            <a href="../index.php" class="nav-login">VOLTAR</a>
          </nav>
    </header>
	
   	<main>
        <section class="publicidades">
		<h2>Editar Perfil</h2>
		
		<form method="POST" action="proc_perfil_candi.php?id=<?php echo $_SESSION['user_id']; ?>" enctype="multipart/form-data"><br>
            <label>Envie a sua Foto:</label>
            <input type="file" name="foto[]" multiple="multiple">
			<input type="submit" name="SendCadImg" value="Enviar" class="watch-btn1">
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