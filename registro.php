<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Personal Clean</title>

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
    <script src="./script.js"></script>
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

        <div class="nombreCompleto">
            <input type="text" placeholder="Nombre" name="nombreInput" id="nombreInput">
            <input type="text" placeholder="Apellidos" name="apellidoInput" id="apellidoInput">
        </div>
        <span id="nombreSpan"></span>

        <input type="text" placeholder="Email" id="emailInput">
        <span id="emailSpan"></span>

        <input type="password" placeholder="Contraseña" id="contraseñaInput">
        <span id="contraSpan"></span>

        <input type="password" placeholder="Confirmar Contraseña" id="confcontraseñaInput">
        <span id="confcontraSpan"></span>

        <label for="fechaNacimiento">Fecha nacimiento:</label>
        <input type="date" name="fnacimiento" id="fnacimiento">
        <span id="fnacSpan"></span>

        <select name="tipoUsuario" id="tipoUsuario">
            <option value="">Tipo de Usuario</option>
            <option value="funcionario">Funcionario</option>
            <option value="cliente">Cliente</option>
        </select>

        <div class="ProvCiud">
        <select name="" id="provincia">
            <option value="">Provincia</option>
        </select>

        <select name="" id="ciudad">
            <option value="">Ciudad</option>
        </select>
        </div>

        <input type="number" id="cp" placeholder="Codigo Postal ej:44444">
        <span id="cpSpan"></span>

        <input type="text" id="direccion" placeholder="Direccion">
        <span id=direcSpan></span>

        <button type="submit">Registrar</button>
        <p>¿Ya tienes cuenta? <a href="./login.php">hacer Log-in</a></p>
    </form>
    </div>
</body>
</html>