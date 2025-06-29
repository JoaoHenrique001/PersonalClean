<?php
$errores = [];
$mensaje = "";
include './assets/ajax/conexionBD.php';

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    echo "Solicitud POST recibida.<br>";

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
    $descripcion = $_POST["descripcion"] ?? "";

    if (!$nombre || !$apellidos || !$email || !$pass || !$confPass || !$telefono || !$fechaNacimiento || !$tipoUsuario || !$provincia || !$ciudad || !$cp || !$direccion) {
        $errores[] = "Todos los campos son obligatorios.";
    }

    if (!$email) {
        $errores[] = "Email no válido.";
    }

    if ($pass !== $confPass) {
        $errores[] = "Las contraseñas no coinciden.";
    }

    if (empty($errores)) {
        try {

            if ($tipoUsuario === "funcionarios") {
                $sql = "INSERT INTO funcionarios (nombre, apellidos, email, contraseña, telefono, f_nacimiento, descripcion, direccion, provincia, ciudad, codigoPostal, notaMedia) 
                        VALUES (:nombre, :apellidos, :email, :password, :telefono, :fechaNacimiento, :descripcion, :direccion, :provincia, :ciudad, :codigoPostal, :notaMedia)";
                $stmt = $conexion->prepare($sql);
                $stmt->bindValue(':notaMedia', 0);
            } else {
                $sql = "INSERT INTO clientes (nombre, apellidos, email, contraseña, telefono, f_nacimiento, direccion, provincia, ciudad, codigoPostal) 
                        VALUES (:nombre, :apellidos, :email, :password, :telefono, :fechaNacimiento, :direccion, :provincia, :ciudad, :codigoPostal)";
                $stmt = $conexion->prepare($sql);
            }

            $stmt->bindParam(':nombre', $nombre);
            $stmt->bindParam(':apellidos', $apellidos);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':password', $pass);
            $stmt->bindParam(':telefono', $telefono);
            $stmt->bindParam(':fechaNacimiento', $fechaNacimiento);
            $stmt->bindParam(':direccion', $direccion);
            $stmt->bindParam(':provincia', $provincia);
            $stmt->bindParam(':ciudad', $ciudad);
            $stmt->bindParam(':codigoPostal', $cp);

            if ($tipoUsuario === "funcionarios") {
                $stmt->bindParam(':descripcion', $descripcion);
            }

            if ($stmt->execute()) {
                $mensaje = "Registro exitoso. Puedes <a href='login.php'>iniciar sesión aquí</a>.";
            } else {
                $errores[] = "Error al registrar. Intenta más tarde.";
            }

            $conexion = null;
        } catch (PDOException $e) {
            echo "Error en la inserción: " . $e->getMessage();
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro | Personal Clean</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/estilos.css">
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico">
    <script src="./assets/js/modoOscuro.js"></script>
    <script src="./assets/js/registro.js"></script>
</head>
<body>
    <?php
    include './assets/switchModoClaroOscuro.php';
    ?>
    <div class="cajaformEnter">
    <form method="POST" id="formRegistro" class="formEnter">
    <a href="./index.php"><img src="./assets/images/logo.png" width="10px" height="10px" alt="logo"></a>

    <div class="nombreCompleto">
        <input type="text" placeholder="Nombre" name="nombreInput" id="nombreInput" required>
        <input type="text" placeholder="Apellidos" name="apellidoInput" id="apellidoInput" required>
    </div>
    <span id="nombreSpan"></span>

    <input type="text" placeholder="Email" name="emailInput" id="emailInput" required>
    <span id="emailSpan"></span>

    <input type="text" placeholder="Contraseña" name="contraseñaInput" id="contraseñaInput" required>
    <span id="contraSpan"></span>

    <input type="text" placeholder="Confirmar Contraseña" name="confcontraseñaInput" id="confcontraseñaInput" required>
    <span id="confcontraSpan"></span>

    <input type="text" placeholder="Numero telefono ej: 444 44 44 44" name="numTelefono" id="numTelefono" required>
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

    <input type="text" name="cp" id="cp" maxlength="5" placeholder="Codigo Postal ej:44444" required>
    <span id="cpSpan"></span>

    <input type="text" name="direccion" id="direccion" placeholder="Direccion" required>
    <span id="direcSpan"></span>

    <button type="submit">Registrar</button>
    <p>¿Ya tienes cuenta? <a href="./login.php">hacer Log-in</a></p>
</form>
    </div>

    <?php
    include_once './assets/footer.php'
    ?>

</body>
</html>