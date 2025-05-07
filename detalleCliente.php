<?php 
session_start();
include './assets/ajax/conexionBD.php';

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'administradores') {
    header("Location: login.php");
    exit;
}

if (isset($_GET['idCliente'])) {
    $id = $_GET['idCliente'];

    $stmt = $conexion->prepare("SELECT * FROM clientes WHERE idCliente = ?");
    $stmt->execute([$id]);

    $cliente = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$cliente) {
        echo "Cliente no encontrado.";
        exit;
    }
} else {
    echo "ID de cliente no especificado.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrador | Detalle Cliente</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet">
    <link rel="stylesheet" href="./assets/estilos.css">
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico">
    <script src="./assets/js/modoOscuro.js"></script>
</head>
<body>
    <?php include './assets/switchModoClaroOscuro.php'; ?>

    <main>
        <h1 class="preAd">Perfil usuario: <span><?php echo $_SESSION['usuario']['nombre']; ?></span>
            <a href="./logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16"> 
                    <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/> 
                    <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/>
                </svg>
            </a>
        </h1>

        <div class="areaDetalle">
            <table class="tablaDetalle">
                <tr><td>ID Cliente:</td><td><?php echo $cliente['idCliente']; ?></td></tr>
                <tr><td>Nombre:</td><td><?php echo $cliente['nombre']; ?></td></tr>
                <tr><td>Apellidos:</td><td><?php echo $cliente['apellidos']; ?></td></tr>
                <tr><td>Email:</td><td><?php echo $cliente['email']; ?></td></tr>
                <tr><td>Contraseña:</td><td><?php echo $cliente['contraseña']; ?></td></tr>
                <tr><td>Teléfono:</td><td><?php echo $cliente['telefono']; ?></td></tr>
                <tr><td>Fecha de nacimiento:</td><td><?php echo $cliente['f_nacimiento']; ?></td></tr>
                <tr><td>Nota media:</td><td><?php echo $cliente['notaMedia']; ?></td></tr>
                <tr><td>Dirección:</td><td><?php echo $cliente['direccion']; ?></td></tr>
                <tr><td>Provincia:</td><td><?php echo $cliente['provincia']; ?></td></tr>
                <tr><td>Ciudad:</td><td><?php echo $cliente['ciudad']; ?></td></tr>
                <tr><td>Código postal:</td><td><?php echo $cliente['codigoPostal']; ?></td></tr>
            </table>
        </div>
    </main>
</body>
</html>
