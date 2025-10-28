<?php
session_start();
include_once("../conexao.php");

$result_usuarios = "SELECT * FROM `candidatos`";
$resultado_usuarios = mysqli_query($conn, $result_usuarios);

?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="css/style.css">
    <link rel="shortcut icon" href="../img/img/4.png" type="image/x-icon">
    <title>Controlar candidatura e candidatos</title>
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

main {
    display: flex;
    gap: 40px;
    max-width: 1000px;
    margin: 30px auto;
    flex-wrap: wrap;
    justify-content: center;
}

table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 1em;
    background: #fff;
}
th, td {
    border: 1px solid #eee;
    padding: 8px;
    text-align: left;
}
th {
    background: #2a6dad;
    color: #fff;
}
nav img{
    width: 50px;
    height: 40px;
    border-radius:50%;  
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
             <img src="images/admin.png" alt="Admin">
                <h2 style="font-size:17px;">Portal Administrador</h2>  
          <div class="link">
          <a href="admin.php" class="nav-login">Voltar</a>
          </div>
          </nav>
    </header>
	
   <main>
        
<section class="publicidades">
            <h2>Controlar candidatos</h2>
            <!-- Filtros -->
            <div class="filtros-vagas" >
               <table>
        <thead>
            <tr>
                <th>Candidatos</th>
                <th>E-mail</th>
                <th>Nascimento</th>
                <th>Género</th>
                <th>Contacto</th>
               <th>Criada em</th>
               <th>Acões</th>
                
            </tr>
        </thead>
        <tbody>
        <?php while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row_usuario['nome']); ?></td>
                <td><?php echo htmlspecialchars($row_usuario['email']); ?></td>
                <td><?php echo htmlspecialchars($row_usuario['idade']); ?></td>
                <td><?php echo htmlspecialchars($row_usuario['sexo']); ?></td>
                <td><?php echo htmlspecialchars($row_usuario['contacto']); ?></td>
                <td><?php echo $row_usuario['created']; ?></td>

                 <td>    
                    <a class="btn-candidatar"  href="detalhes_cand.php?id=<?php echo $row_usuario['id']; ?>">detalhes</a>
                </td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
       
            </div>

</section>

        
<section class="publicidades">
            <h2>Candidaturas Confirmadas</h2>
            <!-- Filtros -->
            <div class="filtros-vagas" >
               <table>
        <thead>
            <tr>
                <th>Candidatos</th>
               <th>Criada em</th>
               
                
            </tr>
        </thead>
        <tbody>
        <?php 
        $result_usuarios ="SELECT * FROM `candidaturas`";
        $resultado_usuarios = mysqli_query($conn, $result_usuarios);

        while ($row_usuarios = mysqli_fetch_assoc($resultado_usuarios)): 

            ?>
            <tr>
                <td><?php echo htmlspecialchars($row_usuarios['nome_candidato']); ?></td>
                <td><?php echo htmlspecialchars($row_usuarios['data']); ?></td>
                
               
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>
       
            </div>

</section>
  
</main>
  
    <script src="script_Version2.js"></script>
</body>
</html>