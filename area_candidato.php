<?php
session_start();
if (!isset($_SESSION['user_id']) || $_SESSION['user_type'] != 'candidato') {
    header('Location: index.php');
    exit;
}
require '../conexao.php';

$stmt = $conn->prepare("SELECT nome, email, foto FROM users WHERE id = ?");
$stmt->bind_param("i", $_SESSION['user_id']);
$stmt->execute();
$stmt->bind_result($nome, $email, $destino);
$stmt->fetch();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/img/4.png" type="image/x-icon">
    <title>Área da Candidato</title>
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
} .img{
     
     width: 150px;
     height: 150px;
     border-radius: 50%;
     display: flex;
    align-items: center;
    justify-content: center;
    
}
a img{
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
         <a href="../index.php">Voltar</a>
          </div>
      </nav>
    </header>

    <main>
     <!-- Depoimentos -->
        <section class="depoimentos">
            
        <?php 
        ?>

         <div class="img">
            <a href="edit_perfil_candi.php?id=<?php echo $_SESSION['user_id']; ?>">
                <img src="<?php echo htmlspecialchars($destino); ?>" alt="imagem-Perfil">
             <br>
                <label>Editar Foto</label>
            </a></div>
            <br><br>       
         
				<div class="depoimentos-container">
                <div class="depoimento">
                    <p><strong>Email:</strong> <?php echo htmlspecialchars($email); ?></p>
                </div>
                <div class="depoimento">
   <p>
Bem-vindo(a), <?php echo htmlspecialchars($nome); ?>
</p>                 </div>
                 <div class="depoimento">
                  <p><strong>Vagas</strong> <a style="text-decoration:none; color: #225fa2;" href="../vagas.php">Disponiveis</a></p>
                 </div>
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
                    <a href="#" style="text-decoration: none; color: rgb(41, 40, 40);">
                        <h3>Como se sair bem em entrevistas</h3>
                    <p style="color: rgb(63, 64, 66);">Veja o que os recrutadores mais valorizam em entrevistas online e presenciais.</p>
                    </a>
                </div>
                <div class="blog-card">
                    <h3>Tendências do mercado de trabalho</h3>
                    <p>Descubra as profissões em alta e como se preparar para elas.</p>
                </div>
            </div>
        </section>

         <!-- FAQ -->
        <section class="faq">
            <h2>Perguntas Frequentes</h2>
            <div class="faq-lista">
                <details>
                    <summary>Como me cadastro como candidato?</summary>
                    <p>Clique em "Portal Candidato" no topo da página e preencha o formulário com seus dados.</p>
                </details>
                <details>
                    <summary>Como empresas divulgam vagas?</summary>
                    <p>Clique em "Portal Empresa", faça o cadastro e anuncie suas oportunidades.</p>
                </details>
                <details>
                    <summary>O cadastro é gratuito?</summary>
                    <p>Sim! Tanto para candidatos quanto para empresas o cadastro é 100% gratuito.</p>
                </details>
                <details>
                    <summary>Como entro em contato com o suporte?</summary>
                    <p>Pelo e-mail  empreganews@gmail.com ou pelo formulário no rodapé do site.</p>
                </details>
            </div>
        </section>
  </main>
          <!-- Footer -->
    <footer>
        <div class="footer-main">
            <div class="footer-logo">
               <h1>Emprega<span style="color: #ffc20a;">News</span></h1>
            </div>
            <div class="footer-links">
                <a href="mailto:empreganews@gmail.com?subject=Contato%20via%20site&body=Olá, gostaria de entrar em contato.">Contato</a>
                <a href="#">Política de Privacidade</a>
                <a href="#">Termos de Uso</a>
            </div>
        </div>
        <div class="footer-copy">
            &copy; 2025 EmpregaNews. Todos os direitos reservados.
        </div>
         </div>
    </footer>
</body>
</html>