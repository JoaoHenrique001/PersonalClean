<?php
session_start();
$_SESSION = array();
session_destroy();
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="refresh" content="2;url=login.php">
    <title>Cerrando sesión...</title>
    <style>
        body {
            font-family: sans-serif;
            text-align: center;
            padding-top: 100px;
        }
    </style>
</head>
<body>
    <h2>Has cerrado sesión correctamente.</h2>
    <p>Serás redirigido al login en unos segundos...</p>
</body>
</html>
