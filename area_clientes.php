<?php
session_start();
include './assets/ajax/conexionBD.php';

if ($_SESSION['usuario']['tipo'] !== 'clientes') {
    header("Location: logout.php");
    exit;
}

$sql = "SELECT f.idFuncionarios, f.nombre, f.apellidos, f.descripcion, f.telefono, f.provincia, f.ciudad 
        FROM funcionarios f";

$consulta = $conexion->prepare($sql);
$consulta->execute();
$funcionarios = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal de <?php echo $_SESSION['usuario']['nombre'] ?> | Personal Clean</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/estilos.css" />
    <script src="./assets/js/modoOscuro.js"></script>
    <script src="./assets/js/cajaAviso.js"></script>
    <link rel="icon" type="image/ico" href="/assets/images/logo.ico">
</head>
<body>
    <?php include_once './assets/headerLogueado.php'; ?>

    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
    <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
    <li class="breadcrumb-item active" aria-current="page"><a href="index.php"><img src="./assets/images/house.svg" alt=""></a></li>
    <li class="breadcrumb-item">Area Principal</li>
    </ol>
    </nav>

    <div class="soyPrincipal">
        <div class="listadoGeneral">
            <?php foreach ($funcionarios as $funcionario) { ?>
                <a href="paginaFuncionario.php?idFuncionarios=<?php echo $funcionario['idFuncionarios']; ?>">
                    <div class="elementoCaja elementoCajaFuncionario">
                        <p class="elementoCaja-tituloServ"><?php echo htmlspecialchars($funcionario['nombre'] . " " . $funcionario['apellidos']); ?></p>
                        <p class="elementoCaja-descripcion"><?php echo htmlspecialchars($funcionario['descripcion']); ?></p>
                        <div class="elementoCaja-data">
                            <p class="data-localidad"><img src="./assets/images/mappoint.svg" alt=""> 
                                <?php echo htmlspecialchars($funcionario['provincia'] . " - " . $funcionario['ciudad']); ?>
                            </p>
                            <p class="data-twork"><img src="./assets/images/telephoneicon.svg" alt="">
                                <?php echo htmlspecialchars($funcionario['telefono']); ?>
                            </p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
        <div class="notificaciones">
            <h1>Notificaciones</h1>

            <a href="./chat.php">
            <div class="notificacionCaja">
                <img src="./assets/images/chatIcon.svg" alt="">
                <h2>Chats</h2>
            </div>
            </a>

            <a href="./crearServicio.php">
            <div class="notificacionCaja">
                <img src="./assets/images/addicon.svg" alt="">
                <h2>Crear Servicio</h2>
            </div>
            </a>

            <a href="./Miarea.php">
            <div class="notificacionCaja">
                <img src="./assets/images/perServ.svg" alt="">
                <h2>Mis Servicios</h2>
            </div>
            </a>

            <a href="./pedidosServicio.php">
            <div class="notificacionCaja">
                <img src="./assets/images/heyBuddy.svg" alt="">
                <h2>Pedidos Servicios</h2>
            </div>
            </a>

            <a href="./valoraciones.php">
            <div class="notificacionCaja" id="btnValoraciones">
                <img src="./assets/images/Starinbox.svg" alt="">
                <h2>Dar Valoraciones</h2>
            </div>
            </a>
        </div>
    </div>

    <?php include_once './assets/footer.php'; ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>