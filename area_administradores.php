<?php 
session_start();
include './assets/ajax/conexionBD.php';

// Verifica si está logueado
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'administradores') {
    header("Location: logout.php");
    exit;
}

// Consultas para contar elementos
$consultaFuncionarios = $conexion->query("SELECT COUNT(*) AS total FROM funcionarios");
$totalFuncionarios = $consultaFuncionarios->fetch(PDO::FETCH_ASSOC)['total'];

$consultaClientes = $conexion->query("SELECT COUNT(*) AS total FROM clientes");
$totalClientes = $consultaClientes->fetch(PDO::FETCH_ASSOC)['total'];

$consultaServicios = $conexion->query("SELECT COUNT(*) AS total FROM servicios");
$totalServicios = $consultaServicios->fetch(PDO::FETCH_ASSOC)['total'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Administrador | Personal Clean</title>
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
        <h1 class="preAd">Hola Administrador: <span><?php echo $_SESSION['usuario']['nombre']; ?></span><a href="./logout.php"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16"> <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/> <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/></svg></a></h1>

        <div class="cajas">
            <div class="cajaControl">
                <h2>Funcionarios</h2>
                <div class="cajaContador">
                    <h3><?php echo $totalFuncionarios; ?></h3>
                    <img src="./assets/images/person-fill.svg" alt="person">
                </div>
                <h4><a href="./gestionarFuncionarios.php">Gestionar</a></h4>
            </div>

            <div class="cajaControl">
                <h2>Servicios</h2>
                <div class="cajaContador">
                    <h3><?php echo $totalServicios; ?></h3>
                    <img src="./assets/images/person-fill.svg" alt="person">
                </div>
                <h4><a href="./gestionarServicios.php">Gestionar</a></h4>
            </div>

            <div class="cajaControl">
                <h2>Clientes</h2>
                <div class="cajaContador">
                    <h3><?php echo $totalClientes; ?></h3>
                    <img src="./assets/images/person-fill.svg" alt="person">
                </div>
                <h4><a href="./gestionarClientes.php">Gestionar</a></h4>
            </div>
        </div>
    </main>
</body>
</html>
