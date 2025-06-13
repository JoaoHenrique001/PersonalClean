<?php
include './assets/ajax/conexionBD.php';
session_start();

// Mostrar datos de depuración (opcional)
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";

// Verificar que el usuario sea un funcionario
if ($_SESSION['usuario']['tipo'] !== 'funcionarios') {
    header("Location: logout.php");
    exit;
}

function tiempoTranscurrido($fecha) {
    $ahora = new DateTime();
    $fechaServicio = new DateTime($fecha);
    $diferencia = $ahora->diff($fechaServicio);

    if ($diferencia->y > 0) {
        return $diferencia->y . " año(s)";
    } elseif ($diferencia->m > 0) {
        return $diferencia->m . " mes(es)";
    } elseif ($diferencia->d > 0) {
        return $diferencia->d . " día(s)";
    } elseif ($diferencia->h > 0) {
        return $diferencia->h . " hora(s)";
    } elseif ($diferencia->i > 0) {
        return $diferencia->i . " minuto(s)";
    } else {
        return "Hace instantes";
    }
}

// Obtener servicios disponibles (trabajos) de la base de datos.  
// Se excluyen aquellos con estado "terminado".
$sql = "SELECT s.*, c.nombre AS nombre_cliente, f.nombre AS nombre_funcionario 
        FROM servicios s 
        LEFT JOIN clientes c ON s.idcliente = c.idcliente 
        LEFT JOIN funcionarios f ON s.idFuncionario = f.idFuncionarios
        WHERE s.estado != 'terminado'";
$consulta = $conexion->prepare($sql);
$consulta->execute();
$servicios = $consulta->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pagina Principal Funcionario | Personal Clean</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/estilos.css" />
    <script src="./assets/js/modoOscuro.js"></script>
    <script src="./assets/js/cajaAviso.js"></script>
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico" />
</head>
<body>
    <?php include_once './assets/headerLogueado.php'; ?>

    <!-- Migas de pan -->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="index.php"><img src="./assets/images/house.svg" alt=""></a>
            </li>
            <li class="breadcrumb-item">Area Principal</li>
        </ol>
    </nav>
    <!-- Fin migas de pan -->

    <div class="soyPrincipal">
        <!-- Listado de trabajos disponibles -->
        <div class="listadoGeneral">
            <?php foreach ($servicios as $servicio) { ?>
                <!-- Cada tarjeta es un enlace que dirige a paginaTrabajo.php pasando el idServicio -->
                <a href="paginaTrabajo.php?idServicio=<?php echo $servicio['idServicio']; ?>">
                    <div class="elementoCaja">
                        <p class="elementoCaja-timeinfo">
                            Creado hace <span><?php echo tiempoTranscurrido($servicio['fechaServicio']); ?></span>
                        </p>    
                        <p class="elementoCaja-tituloServ">
                            <?php echo htmlspecialchars($servicio['titulo']); ?>
                        </p>
                        <p class="elementoCaja-timeinfo">
                            <?php echo htmlspecialchars($servicio['diaServicio']); ?>
                        </p> 
                        <p class="elementoCaja-descripcion">
                            <?php echo htmlspecialchars($servicio['descripcion']); ?>
                        </p>
                        <div class="elementoCaja-data">
                            <p class="data-dinero">
                                <span><?php echo htmlspecialchars($servicio['valor']); ?></span>€
                            </p>
                            <p class="data-localidad">
                                <img src="./assets/images/mappoint.svg" alt=""> 
                                <?php echo htmlspecialchars($servicio['provincia'] . " - " . $servicio['ciudad']); ?>
                            </p>
                            <p class="data-person">
                                <img src="./assets/images/personpc.svg" alt="">
                                <span><?php echo htmlspecialchars($servicio['nombre_cliente']); ?></span>
                            </p>
                            <p class="data-twork">
                                <img src="./assets/images/handwork.svg" alt="">
                                <span>Tipo:</span> <?php echo htmlspecialchars($servicio['tipoServicio']); ?>
                            </p>
                            <p class="data-estado">
                                <?php 
                                    echo "Estado: " . ucfirst($servicio['estado']); 
                                    $estado = $servicio['estado'];
                                    $clase = '';
                                    if ($estado == 'activo') $clase = 'estado-activo';
                                    elseif ($estado == 'confirmacion') $clase = 'estado-confirmacion';
                                    elseif ($estado == 'terminado') $clase = 'estado-terminado';
                                ?>
                                <span class="estado-indicador <?php echo $clase; ?>"></span>
                            </p>
                        </div>
                    </div>
                </a>
            <?php } ?>
        </div>
        <!-- Sección de Notificaciones -->
        <div class="notificaciones">
            <h1>Notificaciones</h1>
            <a href="./chat.php">
                <div class="notificacionCaja">
                    <img src="./assets/images/chatIcon.svg" alt="">
                    <h2>Chats</h2>
                </div>
            </a>
            <a href="./Miarea.php">
                <div class="notificacionCaja">
                    <img src="./assets/images/listIcon.svg" alt="">
                    <h2>Mi Servicios</h2>
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
