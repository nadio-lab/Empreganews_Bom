  <?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'empresa') {
    header('Location: index.php');
    exit;
}
require '../conexao.php';

// Buscar dados do usuário
$stmt = $conn->prepare("SELECT nome, empresa_nome, empresa_endereco, nif, foto FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($nome, $empresa_nome, $empresa_endereco, $nif, $destino);
$stmt->fetch();
$stmt->close();

?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <title>Área da Empresa</title>
    <link rel="shortcut icon" href="../img/img/4.png" type="image/x-icon">
    <link rel="stylesheet" href="style2.css">
</head>
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
.img{
     
     width: 200px;
     height: 150px;
     border-radius: 50%;
     display: flex;
    align-items: center;
    justify-content: center;
    
}
img{
     width: 100%;
     height: 100%;
     border-radius: 50%;
}
.img a{
    width: 140px;
    height: 140px;
    text-decoration: none;
    
}
label{
     cursor:pointer;
    color:#2d8cff;
    font-size:17px;
     font-weight: bold;
     display: flex;
    align-items: center;
    justify-content: center;
}
  label:hover {
    color: rgb(0, 54, 119);
} 
</style>
<body>
       <!-- Cabeçalho -->
    <header>
      <div class="logo">
        <h1>Emprega<span style="color: #ffc20a;">New</span></h1>
      </div>
          <nav>
          <div class="link">
          <a href="../index.php" class="nav-login">HOME</a>
          <a href="logout.php">Sair</a>
          </div>
      </nav>
    </header>
  <main>
     <!-- Depoimentos -->
        <section class="depoimentos">
         <div class="img">
            <a href="edit_perfil_empre.php?id=<?php echo $_SESSION['user_id']; ?>">
        <img src="<?php echo htmlspecialchars($destino); ?>" alt="imagem-Perfil">
                <label>Alterar Foto</label>
            </a></div>
   
			<br><br>
            <div class="depoimentos-container">
                <div class="depoimento">
                   <p>
                   Bem-vindo(a), <?php echo htmlspecialchars($nome); ?>
                   </p>
                </div>
                <div class="depoimento">
                    <p><strong>Empresa:</strong> <?php echo htmlspecialchars($empresa_nome); ?></p>
                </div>
                <div class="depoimento">
                    <p><strong>Endereço:</strong> <?php echo htmlspecialchars($empresa_endereco); ?></p>
                </div>
                <div class="depoimento">
                 <p><strong>NIF:</strong> <?php echo htmlspecialchars($nif); ?></p>
                </div>
                <div class="depoimento">
                 <p><strong>Divulgar</strong> <a style="text-decoration:none;color: #225fa2;" href="../divolgar.php">vagas</a></p>
                </div>
            </div>
        </section>
  </main>

     <!-- Footer -->
    <footer>
        <div class="footer-main">
            <div class="logo">
             <h1>Emprega<span style="color: #ffc20a;">New</span></h1>
            </div>
            <div class="footer-links">
                <nav>
                <a href="mailto:empreganews@gmail.com?subject=Contato%20via%20site&body=Olá, gostaria de entrar em contato.">Contacto</a>
                <a href="https://wa.me/932906604?text=Olá, gostaria de saber mais sobre a plataforma." target="_blank">WhatsApp</a>
                </nav>
            </div>
         </div>
         <div class="footer-copy">
            &copy; 2025 EmpregaNews. Todos os direitos reservados.
         </div>
         </div>

    </footer>
</body>
</html>