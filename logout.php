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
    <title>Cerrando sesión... | Personal Clean</title>
    <link rel="stylesheet" href="./assets/estilos.css">
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico">
    <script src="./assets/js/modoOscuro.js"></script>
</head>
<body>
    <main class="logout">
        <img src="./assets/images/personalClean.png" alt="">
    <div class="loader"></div>
    <h1>Te has deslogueado</h1>
    <h2>Gracias por usar Personal Clean</h2>
    </main>
</body>
</html>
