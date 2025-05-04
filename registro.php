<?php
$errores = [];
$mensaje = "";
include './assets/ajax/conexionBD.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    // Sanitizar entradas
    $nombre = htmlspecialchars(trim($_POST["nombreInput"]));
    $apellidos = htmlspecialchars(trim($_POST["apellidoInput"]));
    $email = filter_var(trim($_POST["emailInput"]), FILTER_VALIDATE_EMAIL);
    $pass = trim($_POST["contraseñaInput"]);
    $confPass = trim($_POST["confcontraseñaInput"]);
    $telefono = htmlspecialchars(trim($_POST["numTelefono"]));
    $fechaNacimiento = $_POST["fnacimiento"];
    $tipoUsuario = $_POST["tipoUsuario"];
    $provincia = $_POST["provincia"];
    $ciudad = $_POST["ciudad"];
    $cp = htmlspecialchars(trim($_POST["cp"]));
    $direccion = htmlspecialchars(trim($_POST["direccion"]));

    // Validaciones
    if (!$nombre || !$apellidos || !$email || !$pass || !$confPass || !$telefono || !$fechaNacimiento || !$tipoUsuario || !$provincia || !$ciudad || !$cp || !$direccion) {
        $errores[] = "Todos los campos son obligatorios.";
    }

    if (!$email) {
        $errores[] = "Email no válido.";
    }

    if ($pass !== $confPass) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    // Si no hay errores, insertar en la base de datos
    if (empty($errores)) {
        $passHash = password_hash($pass, PASSWORD_DEFAULT);

        $stmt = $conexion->prepare("INSERT INTO usuarios (nombre, apellidos, email, password, telefono, fecha_nacimiento, tipo_usuario, provincia, ciudad, codigo_postal, direccion) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");
        $stmt->bind_param("sssssssssss", $nombre, $apellidos, $email, $passHash, $telefono, $fechaNacimiento, $tipoUsuario, $provincia, $ciudad, $cp, $direccion);

        if ($stmt->execute()) {
            $mensaje = "Registro exitoso. Puedes <a href='login.php'>iniciar sesión aquí</a>.";
        } else {
            $errores[] = "Error al registrar. Intenta más tarde.";
        }

        $stmt->close();
    }

    $conexion->close();
}
?>

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
    <script src="./assets/js/modoOscuro.js"></script>
    <script src="./assets/js/registro.js"></script>
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
    <form id="formRegistro"  class="formEnter">
        <a href="./index.php"><img src="./assets/images/logo.png" width="10px" height="10px" alt="logo"></a>

        <div class="nombreCompleto">
            <input type="text" placeholder="Nombre" name="nombreInput" id="nombreInput" required>
            <input type="text" placeholder="Apellidos" name="apellidoInput" id="apellidoInput" required>
        </div>
        <span id="nombreSpan"></span>

        <input type="text" placeholder="Email" id="emailInput" required>
        <span id="emailSpan"></span>

        <input type="text" placeholder="Contraseña" id="contraseñaInput" required>
        <span id="contraSpan"></span>

        <input type="text" placeholder="Confirmar Contraseña" id="confcontraseñaInput" required>
        <span id="confcontraSpan"></span>

        <input type="text" placeholder="Numero telefono ej: 444 44 44 44" id="numTelefono" required>
        <span id="numTelefonoSpan"></span>

        <label for="fechaNacimiento">Fecha nacimiento:</label>
        <input type="date" name="fnacimiento" id="fnacimiento" required>
        <span id="fnacSpan"></span>

        <select name="tipoUsuario" id="tipoUsuario" required>
            <option value="">Tipo de Usuario</option>
            <option value="funcionarios">Funcionario</option>
            <option value="clientes">Cliente</option>
        </select>
        <span id="tipoSpan"></span>


        <div class="ProvCiud">
        <select name="provincia" id="provincia" required>
            <option value="">Provincia</option>
            <option value="Madrid">Madrid</option>
        </select>
        <span id="proviSpan"></span>

        <select name="ciudad" id="ciudad" required>
            <option value="">Ciudad</option>
        </select>
        </div>
        <span id="ciudadSpan"></span>

        <input type="text" id="cp" maxlength="5" placeholder="Codigo Postal ej:44444" required>
        <span id="cpSpan"></span>

        <input type="text" id="direccion" placeholder="Direccion" required>
        <span id=direcSpan></span>

        <button type="submit">Registrar</button>
        <p>¿Ya tienes cuenta? <a href="./login.php">hacer Log-in</a></p>
    </form>
    </div>
</body>
</html>