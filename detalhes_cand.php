<?php
session_start();
include_once("../conexao.php");

$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$empresa_id = filter_input(INPUT_GET, 'empresa_id', FILTER_SANITIZE_NUMBER_INT);
$result_usuario = "SELECT * FROM `candidatos` WHERE id = '$id'";
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
    <title>Detalhes de Candidaturas</title>
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
      
     
    <p><b>Idade:</b> <?php echo htmlspecialchars($row_usuario['idade']); ?> | <b>Gênero:</b> <?php echo htmlspecialchars($row_usuario['sexo']); ?></p>
    <p><b>Contacto:</b> <?php echo $row_usuario['contacto']; ?></p>
    <p><b>Criada Em:</b> <?php echo $row_usuario['created']; ?></p>
    
    <p><b>Descrição:</b> <?php echo $row_usuario['descricao']; ?></p>
   
    <section>
        
        </section>
        
        <br><br><div class="row">
            <div class="col-md-8">
                <a class="btn-candidatar"  href="vagas_candidatos.php">Voltar</a>
             <a class="btn-candidatar"  href="../textes/contrato.php?id=<?php echo $id; ?>">imprimir Curriculo</a>
                                                                                        

    <div class="col-md-7 offset-md-2">
        <div class="col-md-3">

                                                                                    <!--div class="row">
                                                                                        <div class="col-md-8">
                                                                                            <button type='submit'
                                                                                                name="Aluguel"
                                                                                                class="btn btn-primary">Submeter</button>
                                                                                        </div>
                                                                                        <div class="col-md-3">
                                                                                            <button type="button"
                                                                                                class="btn btn-secondary"
                                                                                                data-dismiss="modal">Cancelar</button>
                                                                                        </div>
                                                                                    </div-->


                                                                                </div>

</body>
</html>
