<?php
include_once("conexao.php");
if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $conn->query("DELETE FROM vagas WHERE id = $id");
}
$_SESSION['msg'] = "<p style='color:green;'>Vaga Eliminada</p>";
header('Location: ./admin/divolgar_empresas.php?id=$id#msg');
exit();
?>