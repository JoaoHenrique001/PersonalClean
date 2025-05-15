<?php
session_start();

// Redirige si no hay sesión iniciada correctamente
if (empty($_SESSION['usuario']) || empty($_SESSION['tipo_usuario'])) {
    header("Location: login.php");
    exit;
}

$usuarioLogueado = $_SESSION['usuario'];
$tipoUsuario = $_SESSION['tipo_usuario']; // 'cliente' o 'funcionario'

// Conexión
include './assets/ajax/conexionBD.php';

try {
    $conexion->exec("SET NAMES 'utf8'");

    $tabla = ($tipoUsuario === 'cliente') ? 'clientes' : (($tipoUsuario === 'funcionario') ? 'funcionarios' : null);

    if (!$tabla) {
        die("Tipo de usuario no válido.");
    }

    // Si se envió el formulario
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $campos = [
            'nombre', 'apellido', 'email', 'contraseña', 'telefono', 'fnacimiento',
            'direccion', 'provincia', 'ciudad', 'codigo_postal', 'descripcion'
        ];
        $datos = [];
        foreach ($campos as $campo) {
            $datos[$campo] = $_POST[$campo] ?? '';
        }

        $stmtUpdate = $conexion->prepare("
            UPDATE $tabla SET
                nombre = :nombre,
                apellido = :apellido,
                email = :email,
                contraseña = :contraseña,
                telefono = :telefono,
                fnacimiento = :fnacimiento,
                direccion = :direccion,
                provincia = :provincia,
                ciudad = :ciudad,
                codigo_postal = :codigo_postal,
                descripcion = :descripcion
            WHERE usuario = :usuario
        ");

        $stmtUpdate->execute([
            ':nombre' => $datos['nombre'],
            ':apellido' => $datos['apellido'],
            ':email' => $datos['email'],
            ':contraseña' => $datos['contraseña'], // ← debería ir hasheada en producción
            ':telefono' => $datos['telefono'],
            ':fnacimiento' => $datos['fnacimiento'],
            ':direccion' => $datos['direccion'],
            ':provincia' => $datos['provincia'],
            ':ciudad' => $datos['ciudad'],
            ':codigo_postal' => $datos['codigo_postal'],
            ':descripcion' => $datos['descripcion'],
            ':usuario' => $usuarioLogueado
        ]);

        echo "<div class='alert alert-success'>Datos actualizados correctamente.</div>";
    }

    // Obtener los datos actuales del usuario
    $stmt = $conexion->prepare("
        SELECT nombre, apellido, email, contraseña, telefono, fnacimiento,
               direccion, provincia, ciudad, codigo_postal, descripcion
        FROM $tabla WHERE usuario = :usuario
    ");
    $stmt->execute([':usuario' => $usuarioLogueado]);
    $usuario = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$usuario) {
        die("Usuario no encontrado.");
    }

} catch (PDOException $e) {
    die("Error de conexión: " . $e->getMessage());
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Editar Perfil | Personal Clean</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/estilos.css" />
    <script src="./assets/js/modoOscuro.js"></script>
    <script src="./assets/js/edit.js"></script>
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico" />
</head>
<body>

<?php include_once './assets/headerLogueado.php'; ?>

<nav style="--bs-breadcrumb-divider: url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'8\' height=\'8\'><path d=\'M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z\' fill=\'%236c757d\'/></svg>');" aria-label="breadcrumb">
  <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
    <li class="breadcrumb-item active" aria-current="page"><a href="index.php"><img src="./assets/images/house.svg" alt="" /></a></li>
    <li class="breadcrumb-item"><?php echo htmlspecialchars($usuario['nombre']); ?></li>
    <li class="breadcrumb-item">Edición Perfil</li>
  </ol>
</nav>

<div class="edicionArea">
<form class="edicionForm" method="POST">
    <div class="apartado1 campos">
        <img src="./assets/images/userIcon.svg" alt="" />
        <button type="button">Cambiar</button>

        <label class="labeledit" for="nombre">Nombre:</label>
        <input type="text" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" name="nombre" class="campoedit" id="nombre" required />

        <label class="labeledit" for="apellido">Apellido:</label>
        <input type="text" value="<?php echo htmlspecialchars($usuario['apellido']); ?>" name="apellido" class="campoedit" id="apellido" required />

        <label class="labeledit" for="email">Email:</label>
        <input type="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" name="email" class="campoedit" id="email" required />
    </div>

    <div class="apartado2 campos">
        <label class="labeledit" for="contraseña">Contraseña:</label>
        <input type="text" value="<?php echo htmlspecialchars($usuario['contraseña']); ?>" name="contraseña" class="campoedit" id="contraseña" required />

        <label class="labeledit" for="telefono">Teléfono:</label>
        <input type="text" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" name="telefono" class="campoedit" id="telefono" required />

        <label class="labeledit" for="fnacimiento">Fecha nacimiento:</label>
        <input type="date" value="<?php echo htmlspecialchars($usuario['fnacimiento']); ?>" name="fnacimiento" class="campoedit" id="fnacimiento" required />

        <label class="labeledit" for="direccion">Dirección:</label>
        <input type="text" value="<?php echo htmlspecialchars($usuario['direccion']); ?>" name="direccion" class="campoedit" id="direccion" required />

        <label class="labeledit" for="provincia">Provincia:</label>
        <select name="provincia" class="campoedit" id="provincia" required>
            <option value="">Provincia</option>
            <option value="Madrid" <?php if ($usuario['provincia'] === 'Madrid') echo 'selected'; ?>>Madrid</option>
        </select>

        <label class="labeledit" for="ciudad">Ciudad:</label>
        <select name="ciudad" class="campoedit" id="ciudad" required>
            <option value="">Ciudad</option>
            <option value="<?php echo htmlspecialchars($usuario['ciudad']); ?>" selected><?php echo htmlspecialchars($usuario['ciudad']); ?></option>
        </select>
    </div>

    <div class="apartado3 campos">
        <label class="labeledit" for="codigo_postal">Código Postal:</label>
        <input type="text" value="<?php echo htmlspecialchars($usuario['codigo_postal']); ?>" name="codigo_postal" class="campoedit" id="codigo_postal" required />

        <label class="labeledit" for="descripcion">Descripción:</label>
        <textarea name="descripcion" class="editDescripcion campoedit" id="descripcion"><?php echo htmlspecialchars($usuario['descripcion']); ?></textarea>

        <input type="submit" value="Guardar" class="btn btn-primary mt-3" />
    </div>
</form>
</div>

<?php include_once './assets/footer.php'; ?>

<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>AOS.init();</script>
</body>
</html>
