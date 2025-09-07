<?php
require_once 'config.php';
$msg = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $username = $_POST['username'] ?? '';
    $password = $_POST['password'] ?? '';

    // CONSULTA VULNERÁVEL: concatenação direta — intencionalmente insegura
    $sql = "SELECT id, username FROM users WHERE username = '$username' AND password = '$password' LIMIT 1";
    $result = $mysqli->query($sql);

    if ($result && $result->num_rows === 1) {
        $user = $result->fetch_assoc();
        $msg = "Login bem-sucedido como: " . htmlspecialchars($user['username']);
    } else {
        $msg = "Credenciais inválidas.";
    }
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title>SQL Injection - Mini DVWA</title>
</head>
<body>
<h2>SQL Injection (Login vulnerável)</h2>
<p>Esta página ilustra um formulário de login que constrói a query de forma insegura.</p>

<form method="post" action="">
    <label>Usuário: <input type="text" name="username"></label><br><br>
    <label>Senha: <input type="password" name="password"></label><br><br>
    <button type="submit">Entrar</button>
</form>

<p><strong>Resultado:</strong> <?php echo htmlspecialchars($msg); ?></p>

<p><a href="index.php">Voltar</a></p>
</body>
</html>
