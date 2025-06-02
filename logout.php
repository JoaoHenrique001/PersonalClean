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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <script src="./assets/js/modoOscuro.js"></script>
    <style>
        .switchCO{
            display: none;
        }
    </style>
</head>
<body>
     <div class="switchCO" id="varCO">
      <input type="checkbox" class="checkbox" id="chk"/>
      <label class="modoCO" for="chk">
        <i class="fas fa-moon"></i>
        <i class="fas fa-sun"></i>
        <div class="ball"></div>
      </label>
    </div>
    <main class="logout">
        <img src="./assets/images/personalClean.png" alt="">
    <div class="loader"></div>
    <h1>Te has deslogueado</h1>
    <h2>Gracias por usar Personal Clean</h2>
    </main>
</body>
</html>
