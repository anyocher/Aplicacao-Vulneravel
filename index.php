<?php
require_once 'config.php';
?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title>Mini DVWA - Página Inicial</title>
<meta name="viewport" content="width=device-width,initial-scale=1">
<style>
    body{font-family:Arial,Helvetica,sans-serif;max-width:900px;margin:20px auto;padding:10px;}
    nav a{margin-right:12px;}
    .danger{color:#8b0000;}
</style>
</head>
<body>
<h1>Mini DVWA (apenas para treino local)</h1>
<p class="danger"><strong>Aviso:</strong> Este site é propositalmente vulnerável. Use apenas em ambiente local isolado.</p>

<nav>
    <a href="sql_injection.php">SQL Injection (Login vulnerável)</a>
    <a href="xss.php">XSS (Comentários)</a>
    <a href="upload.php">File Upload (vulnerável)</a>
</nav>

<hr>
<p>Objetivo: praticar identificação e defesa contra vulnerabilidades comuns (apenas para uso em laboratório).</p>
</body>
</html>
