<!DOCTYPE html>
<html lang="pt">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="../img/img/4.png" type="image/x-icon">
    <title>Cadastro</title>
    <link rel="stylesheet" href="style.css">
    <script>
    function showFields() {
        var type = document.querySelector('input[name="user_type"]:checked').value;
        document.getElementById('empresa_fields').style.display = (type === 'empresa') ? 'block' : 'none';
    }
    </script>
</head>
<body>
    <h2>Cadastro</h2>
    <form action="process_register.php" method="POST">
        <label><input type="radio" name="user_type" value="candidato" checked onclick="showFields()"> Candidato</label>
        <label><input type="radio" name="user_type" value="empresa" onclick="showFields()"> Empresa</label><br><br>
        <input type="text" name="nome" placeholder="Nome do Proprietário " required><br>
        <input type="email" name="email" placeholder="E-mail" required><br>
        <input type="password" name="password" placeholder="Senha" required><br>
        <div id="empresa_fields" style="display:none;">
            <input type="text" name="nif" placeholder="NIF da Empresa"><br>
            <input type="text" name="empresa_nome" placeholder="Nome da Empresa"><br>
            <input type="text" name="empresa_endereco" placeholder="Endereço da Empresa"><br>
            <input type="text" name="empresa_contacto" placeholder="Contacto telefónico"><br>
        </div>
        <button type="submit">Cadastrar</button>
    </form>
    <p>Já tem cadastro? <a href="index.php">Faça login</a></p>
    <?php if (isset($_GET['error'])): ?>
        <p class="error"><?php echo htmlspecialchars($_GET['error']); ?></p>
    <?php endif; ?>
    <script>showFields();</script>
</body>
</html>