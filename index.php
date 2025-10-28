<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/img/4.png" type="image/x-icon">
    <title>Login</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h2><a href="../index.php">Login</h2></a>
    <form action="process_login.php" method="POST">
        <input type="text" name="email" placeholder="E-mail" required><br>
        <input type="password" name="password" placeholder="Senha" required><br>
        <button type="submit">Entrar</button>
    </form>
    <p>Não tem cadastro? <a href="register.php">Cadastre-se</a></p>
    <?php if (isset($_GET['error'])): ?>
        <p class="error"><?php echo htmlspecialchars($_GET['error']); echo " Recuperar <a href='../recuperar/recuperar_senha.php'>Senha</a> ?"; ?></p>
    <?php endif; ?>
</body>
</html>