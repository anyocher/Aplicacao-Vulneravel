<?php
require_once 'config.php';

if (!isset($_SESSION)) session_start();

if (!isset($_SESSION['comments'])) {
    $_SESSION['comments'] = [];
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $author = $_POST['author'] ?? 'Anônimo';
    $comment = $_POST['comment'] ?? '';

    // ARMAZENAMENTO em sessão para simplificar; intencionalmente não sanitizamos ao exibir
    $_SESSION['comments'][] = [
        'author' => $author,
        'comment' => $comment,
        'ts' => date('Y-m-d H:i:s')
    ];
}
?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title>XSS - Mini DVWA</title>
</head>
<body>
<h2>XSS (Comentários)</h2>
<p>Envie um comentário. A aplicação exibe os comentários sem escapar — intencionalmente vulnerável a XSS.</p>

<form method="post" action="">
    <label>Autor: <input type="text" name="author"></label><br><br>
    <label>Comentário: <br><textarea name="comment" rows="4" cols="60"></textarea></label><br><br>
    <button type="submit">Enviar</button>
</form>

<h3>Comentários</h3>
<ul>
    <?php
    foreach ($_SESSION['comments'] as $c) {
        // Exibição intencionalmente sem escaping para demonstrar XSS
        echo "<li><strong>{$c['author']}</strong> ({$c['ts']}): <div>{$c['comment']}</div></li>";
    }
    ?>
</ul>

<p><a href="index.php">Voltar</a></p>
</body>
</html>
