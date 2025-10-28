<?php
session_start();
include_once("../conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$empresa_id = filter_input(INPUT_GET, 'empresa_id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM vagas WHERE id = '$id'";
$resultado_usuario = mysqli_query($conn, $result_usuario);
$row_usuario = mysqli_fetch_assoc($resultado_usuario);
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <link rel="stylesheet" href="../css/style_Version2.css">
    <link rel="shortcut icon" href="../img/img/4.png" type="image/x-icon">
    <title>Detalhes da vaga</title>
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
body {
    font-family: Arial, sans-serif;
    background: #f3f3f3;
    max-width: 400px;
    margin: 50px auto;
    padding: 30px;
    border-radius: 8px;
    background: white;
    box-shadow: 0 2px 8px rgba(0,0,0,0.1);
}


    </style>
</head>
<body>

    <h2><?php echo htmlspecialchars($row_usuario['nome']); ?></h2>
    <p><?php echo htmlspecialchars($row_usuario['nome_empresa']); ?> - <?php echo htmlspecialchars($row_usuario['cidade']); ?></p>
    <p><b>Tipo:</b> <?php echo htmlspecialchars($row_usuario['tipo']); ?> | <b>Área:</b> <?php echo htmlspecialchars($row_usuario['area']); ?> | <b>Nível:</b> <?php echo htmlspecialchars($row_usuario['nivel']); ?></p>
    <p><b>Cidade:</b> <?php echo $row_usuario['cidade']; ?></p>
    <p><b>Requisitos:</b> <?php echo $row_usuario['requisitos']; ?></p>
    <p><b>Beneficios:</b> <?php echo $row_usuario['beneficios']; ?></p>

    
    <p><b>Carga Horária:</b> <?php echo $row_usuario['carga']; ?></p>

    <p><b>Descrição:</b> <?php echo $row_usuario['descricao']; ?></p>
    <a class="btn-candidatar"  href="divolgar_empresas.php">Voltar</a>

</body>
</html>