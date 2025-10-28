<?php
session_start();
include_once("../conexao.php");
$result = $conn->query("SELECT * FROM vagas ORDER BY created DESC");


$result_usuarios = "SELECT * FROM `users`";
$resultado_usuarios = mysqli_query($conn, $result_usuarios);
              
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/style_Version2.css">
    <link rel="shortcut icon" href="../img/img/4.png" type="image/x-icon">
    <title>Controlar Vagas Publicadas</title>
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
   .btn-candidatar1 {
    text-decoration: none;
    padding: 7px 5px;
    border-radius: 6px;
    border: none;
    background: #2d8cff;
    color: #fff;
    cursor: pointer;
    transition: background .2s, color .2s;
}
   .btn-candidatar1:hover {
    background: red;
    color: #fff;
    font-weight: bold;
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
main {
    display: flex;
    gap: 40px;
    max-width: 1000px;
    margin: 30px auto;
    flex-wrap: wrap;
    justify-content: center;
}

form {
    display: flex;
    flex-direction: column;
    gap: 12px;
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
    background: #1976d2;
    color: #fff;
    border: none;
    cursor: pointer;
    transition: background .2s;
}
button:hover {
    background: #1250a5;
}
/**/

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
    gap: 12px;

}

.portais a{
    color:  #2d8cff;
    text-decoration: none;
    margin-left: 36px;
    font-size: 1.1rem;
    font-weight: 500;
    transition: text-decoration 0.2s;
}

.portais a:hover {
    border-bottom: 2px solid #ffc20a;
    
}
a img{
    width: 40px;
    height: 40px;
    cursor: pointer;
    margin-left: 10px;
     
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
    <!-- Área para empresas -->

     <main>

<section class="motivacional" id="msg">
     <?php
        if(isset($_SESSION['msg'])){
            echo $_SESSION['msg'];
            unset($_SESSION['msg']);
        }
        ?>
            <h2>Controlar Vagas Publicadas</h2>
         <table>
        <thead>
            <tr>
                <th>Empresas</th>
                <th>Título</th>
                <th>Tipo</th>
                <th>Area</th>
                <th>Nivel</th>
                <th>Cidade</th>             
                <th>Criada em</th>
                <th>Ver</th>
                <th>Eliminar</th>
                <th>Editar</th>
            </tr>
        </thead>
        <tbody>
        <?php while ($vaga = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo htmlspecialchars($vaga['nome_empresa']); ?></td>
                <td><?php echo htmlspecialchars($vaga['nome']); ?></td>
                <td><?php echo htmlspecialchars($vaga['tipo']); ?></td>
                <td><?php echo htmlspecialchars($vaga['area']); ?></td>
                <td><?php echo htmlspecialchars($vaga['nivel']); ?></td>
                <td><?php echo htmlspecialchars($vaga['cidade']); ?></td>
                <td><?php echo $vaga['created']; ?></td>

                <td>
                   <a class="btn-candidatar" href="detalhes.php?id=<?php echo $vaga['id']; ?>">detalhes</a>
                </td>

                <td>
                    <a  href="../delete.php?id=<?php echo $vaga['id']; ?>" onclick="return confirm('Tem certeza que deseja excluir?')">
                        <img src="images/lix.png"  alt="Excluir">
                    </a>
                 </td>
                <td>
                     <a   href="../edit_usuario.php?id=<?php echo $vaga['id']; ?>">
                        <img src="images/editar-vagas.png"  alt="Editar">
                     </a>
                </td>
              
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

  </section>
       <section class="motivacional">
            <h2>Empresas cadastradas</h2>

         <table>
        <thead>
            <tr>
                <th>Empresas</th>
            
            </tr>
        </thead>
        <tbody>
        <?php while ($row_usuario = mysqli_fetch_assoc($resultado_usuarios)): ?>
            <tr>
                <td><?php echo htmlspecialchars($row_usuario['empresa_nome']); ?></td>
            </tr>
        <?php endwhile; ?>
        </tbody>
    </table>

  </section>
  </main>

    <script src="script_Version2.js"></script>
</body>
</html>