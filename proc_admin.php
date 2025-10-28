
<?php
session_start();
/*
if (isset($_SESSION['user_id'])) {
    if ($_SESSION['user_type'] == 'empresa') {
        header('Location: area_empresa.php');
    } else {
        header('Location: area_candidato.php');
    }
    exit;
}
*/
if ((isset($_POST['email'])) && (isset($_POST['password']))){
    $admin = $_POST['email'];
    $pass = $_POST['password'];
    if (($admin === 'admin@gmail.com')&& ($pass === 'admin')){
        header('Location: ../admin/admin.php');
    }else{
    	header('Location: process_login.php');

    }
    //e-mail: admin@gmail.com
    //pass: admin
}
?>

