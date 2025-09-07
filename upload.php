<?php
require_once 'config.php';

$upload_msg = '';
$upload_dir = __DIR__ . '/uploads/';

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['file'])) {
    $f = $_FILES['file'];
    if ($f['error'] === UPLOAD_ERR_OK) {
        // NENHUMA validação de tipo ou extensão — intencionalmente vulnerável
        $dest = $upload_dir . basename($f['name']);
        if (move_uploaded_file($f['tmp_name'], $dest)) {
            $upload_msg = "Arquivo enviado: " . htmlspecialchars($f['name']);
        } else {
            $upload_msg = "Falha ao mover arquivo.";
        }
    } else {
        $upload_msg = "Erro no upload.";
    }
}

$files = array_diff(scandir($upload_dir), ['.', '..']);
?>
<!doctype html>
<html lang="pt-BR">
<head>
<meta charset="utf-8">
<title>File Upload - Mini DVWA</title>
</head>
<body>
<h2>File Upload (vulnerável)</h2>
<p>Esta funcionalidade aceita qualquer arquivo e salva em <code>uploads/</code> sem validação.</p>

<form method="post" enctype="multipart/form-data" action="">
    <input type="file" name="file"><br><br>
    <button type="submit">Enviar</button>
</form>

<p><?php echo htmlspecialchars($upload_msg); ?></p>

<h3>Arquivos enviados</h3>
<ul>
    <?php foreach ($files as $f): ?>
    <li><a href="uploads/<?php echo urlencode($f); ?>" target="_blank"><?php echo htmlspecialchars($f); ?></a></li>
    <?php endforeach; ?>
</ul>

<p><a href="index.php">Voltar</a></p>
</body>
</html>
