<?php
session_start();
include_once("../conexao.php");
$result = $conn->query("SELECT * FROM vagas ORDER BY created DESC");

?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../img/img/4.png" type="image/x-icon">
</head>
<style type="text/css">
select {
    padding: 10px;
    border-radius: 4px;
    border: 1px solid #b3c3db;
    font-size: 16px;
}
select:focus,{
    outline: 2px solid #1976d2;
    border-color: #1976d2;
}
.portais {
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 12px;
    


}

.portais a{
    color:  #2d8cff;
    text-decoration: none;
    font-size: 1.1rem;
    font-weight: 500
    ;margin:20px;
    transition: text-decoration 0.2s;
}

.portais a:hover {
    border-bottom: 2px solid #ffc20a;
    
}
  .watch-btn2 {
    text-decoration: none;
    padding: 5px 5px;
    border-radius: 5px;
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
img{
    width: 50px;
    height: 40px;
    border-radius:50%;  
}
 
</style>
<body>
 

    <header>
      <div class="logo">
        <h1>Emprega<span style="color: #ffc20a;">New</span></h1>
      </div>
        <nav>
                <img src="images/admin.png" alt="Admin">
                <h2 style="font-size:17px;">Administrador</h2>  
            <a href="../index.php" id="portal-candidato-link">Sair</a>
        </nav>
    </header>

    

    <main>

            <!-- Carrossel motivacional -->
        <section class="motivacional">
            
            <div class="portais">
            <a  href="divolgar_empresas.php">Administrar vagas de Empresas</a>
            <a href="vagas_candidatos.php" >Administrar Candidatos</a>
            </div>  
           
        </section>

        <!-- Depoimentos -->
        <section class="depoimentos">
            <h2>Depoimentos</h2>
           <div class="depoimentos-container">
                <div class="depoimento">
                    <p>"Consegui meu primeiro emprego graças ao EmpregaNews! Recomendo para todos!"</p>
                    <span>- Ines Andre, Desenvolvedora Júnior</span>
                </div>
                <div class="depoimento">
                    <p>"Divulgamos nossas vagas e tivemos ótimos candidatos. Plataforma simples e eficiente."</p>
                    <span>- Fernando Miranda, RH da ABC Corp</span>
                </div>
                <div class="depoimento">
                    <p>"Achei um estágio perfeito para mim, foi muito fácil e rápido!"</p>
                    <span>- Adilson Molumbila, Estagiário Financeiro</span>
                </div>
            </div>
        </section>

 
  <!-- FAQ -->
        <section class="faq">
            <h2>Resultados</h2>
            <div class="faq-lista">
                <details>
                    <summary>Quantas empresas publicam suas vagas?</summary>
                    <p>
                    
                <?php
                $result_usuarios = "SELECT * FROM `users`";
                $resultado_usuarios = mysqli_query($conn, $result_usuarios);
                while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                echo "<li>" . $row_usuario['empresa_nome'] . "</li>";
           
                }
                   ?>
                    </p>
                </details>
                <details>
                      <summary>Quantos Candidatos Cadastrados?</summary>
                    <p>
                     
                <?php
                $result_usuarios = "SELECT * FROM `candidatos`";
                $resultado_usuarios = mysqli_query($conn, $result_usuarios);
                while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                echo "<br><li>" . $row_usuario['nome'] . "</li>";
           
                }
                   ?>
                    </p>
                </details>
                <details>
                     <summary>Ver Candidatura efetuadas?</summary>
                <?php
                $result_usuarios = "SELECT * FROM `candidaturas`";
                $resultado_usuarios = mysqli_query($conn, $result_usuarios);
                while($row_usuario = mysqli_fetch_assoc($resultado_usuarios)){
                echo "<li>" . $row_usuario['nome_candidato'] . "</li> ";
           
                }
         
                ?>
                    </p>
                </details>
               
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
                <a href="https://wa.me/932906604?text=Olá, gostaria de saber mais sobre a plataforma." target="_blank">WhatsApp</a></i>
                <a href="cadastro/index.php" >iniciar sessão</a>
                </nav>
            </div>
        </div>
        <div class="footer-copy">
            &copy; 2025 EmpregaNews. Todos os direitos reservados.
        </div>
    </footer>
    <script src="../script.js"></script>
</body>
</html>