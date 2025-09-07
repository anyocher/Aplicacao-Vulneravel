<?php
// config.php
// Configurações simples 
$db_host = '127.0.0.1';
$db_user = 'root';
$db_pass = ''; // colocar senha do seu MySQL/MariaDB local
$db_name = 'mini_dvwa';

$mysqli = new mysqli($db_host, $db_user, $db_pass, $db_name);
if ($mysqli->connect_errno) {
    die("Falha na conexão com DB: " . $mysqli->connect_error);
}

// NOTA: intencionalmente NÃO usa práticas seguras.

