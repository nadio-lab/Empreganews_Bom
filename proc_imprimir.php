<?php
session_start();
include_once("../conexao.php");
/*
//$id = $_GET['id'];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
 $stmt = $conn->prepare("SELECT corriculo FROM candidatos WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($destino);
$stmt->fetch();

echo htmlspecialchars($destino);
*/
//ta bom maiii
 //$id = $_GET['id'];
$id = filter_input(INPUT_GET, 'id', FILTER_SANITIZE_NUMBER_INT);
$stmt = $conn->prepare("SELECT corriculo FROM `candidatos` WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->bind_result($destino);

if ($stmt->fetch()) {
       //header('Content-Type: text/plain');
       //header('Content-Type: application/pdf');
       //header('Content-Disposition: inline');
       //header('Cache-Control: no-cache');
       //header('Pragma-Disposition: no-cache');
       //header('Expires:0');
 echo'<html><head><title>Imprimir Ficheiro</title></head><body>';
echo'<div style="wihth: 100px;height: 100px;padding: 20px;">';
echo htmlspecialchars($destino);
echo'</div>';
echo'<script>
window.print();</script>';
echo'</body></html>';
 
       
       exit;
    }else{
echo"Ficheiro não encontrado.";
}
$stmt->close();
$conn->close();


?>