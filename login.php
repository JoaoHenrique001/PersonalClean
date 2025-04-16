<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Personal Clean</title>

    <!--inicio framework fontawesome-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <!--fin framework fontawesome-->

    <!--enlace de css-->
    <link rel="stylesheet" href="./assets/estilos.css">
    <!--enlace de css-->

    <!--inicio logo de la pagina ventana-->
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico">
    <!--fin logo de la pagina ventana-->

    <!--enlace de script.js-->
    <script src="./assets/js/modoOscuro.js"></script>
    <!--enlace de script.js-->
</head>
<body>
     <!--inicio modo oscuro y claro-->
     <div class="switchCO" id="varCO">
      <input type="checkbox" class="checkbox" id="chk"/>
      <label class="modoCO" for="chk">
        <i class="fas fa-moon"></i>
        <i class="fas fa-sun"></i>
        <div class="ball"></div>
      </label>
    </div>
    <!--fin modo oscuro y claro-->

    <div class="cajaformEnter">
    <form action="" class="formEnter">
        <a href="./index.php"><img src="./assets/images/logo.png" width="10px" height="10px" alt="logo"></a>
        <input type="text" placeholder="Email" name="emailInput" id="emailInput">
        <span id="emailSpan"></span>
        <input type="password" placeholder="Contraseña" name="contraseñaInput" id="contraseñaInput">
        <span id="contraSpan"></span>
        <button type="submit">Entrar</button>
        <p>¿No tienes cuenta? <a href="./registro.php">Registrate</a></p>
    </form>
    </div>
</body>
</html>