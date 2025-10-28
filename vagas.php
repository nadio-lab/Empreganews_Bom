<?php
session_start();
include_once("conexao.php");
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'candidato') {
    header('Location: index.php');
    exit;
}
$result = $conn->query("SELECT * FROM vagas ORDER BY created DESC");

if (isset($_GET['id'])) {
    $candidato_id = $_SESSION['candidato_id'];
    $aula_id = intval($_GET['id']);
    $sql = "INSERT IGNORE INTO `candidaturas` (candidato_id, vaga_id) VALUES (?, ?)";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("ii", $candidato_id, $vaga_id);
    $stmt->execute();
    header("Location: vagas.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style_Version2.css">
    <link rel="shortcut icon" href="./img/img/4.png" type="image/x-icon">
    <title>Vagas Disponivies</title>
     <style type="text/css">

    .btn-candidatar {
    text-decoration: none;
    padding: 7px 5px;
    border-radius: 6px;
    border: none;
    background: #2d8cff;
    color: #fff;
    cursor: pointer;
    transition: background .2s, color .2s;
}
    .btn-candidatar:hover {
    background: #2d8cff;
    color: #fff;
    font-weight: bold;
} 
/**/
    </style>
</head>
<body>

    <!-- Cabeçalho -->
    <header>
      <div class="logo">
        <h1>Emprega<span style="color: #ffc20a;">New</span></h1>
      </div>
          <nav>
            <a href="index.php" class="nav-login">HOME</a>
            <a href="index.php" id="portal-candidato-link">Sair</a>
          </nav>
    </header>
	
   <main>
        <section class="depoimentos">
            <h2>Vagas Diponíveis</h2>
              <!-- Modal de Detalhe da Vaga -->
         <div class="depoimentos-container">
    <?php while ($vaga = $result->fetch_assoc()): ?> 
    <div class="depoimento">                 
    <h2><?php echo htmlspecialchars($vaga['nome']); ?></h2>
    <p><?php echo htmlspecialchars($vaga['nome_empresa']); ?> - <?php echo htmlspecialchars($vaga['cidade']); ?></p>
    <p><b>Área:</b> <?php echo htmlspecialchars($vaga['area']); ?> | <b>Nível:</b> <?php echo htmlspecialchars($vaga['nivel']); ?></p>
   <a class="btn-candidatar" href="./proc_vaga/detalhes.php?id=<?php echo $vaga['id']; ?>">ver detalhes</a>
    </div>
 <?php endwhile; ?>
       </div>
</section>
    
    <!-- Blog / Dicas de Carreira -->
        <section class="blog">
            <h2>Dicas de Carreira</h2>
            <div class="blog-cards">
                <div class="blog-card">
                    <h3>Como preparar um bom currículo</h3>
                    <p>Dicas essenciais para destacar seu CV no mercado.</p>
                </div>
                <div class="blog-card">
                    <h3>Como se sair bem em entrevistas</h3>
                    <p>Veja o que os recrutadores mais valorizam em entrevistas online e presenciais.</p>
                </div>
                <div class="blog-card">
                    <h3>Tendências do mercado de trabalho</h3>
                    <p>Descubra as profissões em alta e como se preparar para elas.</p>
                </div>
            </div>
        </section>

        <!-- Depoimentos -->
</main>

   

   <!-- Footer -->
    <footer>
        <div class="footer-main">
            <div class="footer-logo">
               <h1>Emprega<span style="color: #ffc20a;">News</span></h1>
            </div>
            <div class="footer-links">
                <a href="mailto:empreganews@gmail.com?subject=Contato%20via%20site&body=Olá, gostaria de entrar em contato.">Contato</a>
                <a href="https://wa.me/932906604?text=Olá, gostaria de saber mais sobre a plataforma." target="_blank">WhatsApp</a>
                <a href="#">Termos de Uso</a>
            </div>
        </div>
        <div class="footer-copy">
            &copy; 2025 EmpregaNews. Todos os direitos reservados.
        </div>
    </footer>

    <script src="script.js"></script>
</body>
</html>