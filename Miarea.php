<?php
include './assets/ajax/conexionBD.php';
session_start();

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

$tipoUsuario = $_SESSION['usuario']['tipo'];
$idUsuario = ($tipoUsuario === 'clientes') ? $_SESSION['usuario']['idCliente'] : $_SESSION['usuario']['idFuncionarios'];

$sqlActivos = "SELECT s.*, c.nombre AS nombre_cliente, f.nombre AS nombre_funcionario 
               FROM servicios s 
               LEFT JOIN clientes c ON s.idcliente = c.idcliente 
               LEFT JOIN funcionarios f ON s.idFuncionario = f.idFuncionarios
               WHERE s.estado IN ('activo', 'confirmacion')
               AND " . ($tipoUsuario === 'clientes' ? "s.idCliente = :idUsuario" : "s.idFuncionario = :idUsuario");

$stmtActivos = $conexion->prepare($sqlActivos);
$stmtActivos->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
$stmtActivos->execute();
$serviciosActivos = $stmtActivos->fetchAll(PDO::FETCH_ASSOC);

$sqlHistorico = "SELECT s.*, c.nombre AS nombre_cliente, f.nombre AS nombre_funcionario 
                 FROM servicios s 
                 LEFT JOIN clientes c ON s.idcliente = c.idcliente 
                 LEFT JOIN funcionarios f ON s.idFuncionario = f.idFuncionarios
                 WHERE s.estado = 'terminado'
                 AND " . ($tipoUsuario === 'clientes' ? "s.idCliente = :idUsuario" : "s.idFuncionario = :idUsuario");

$stmtHistorico = $conexion->prepare($sqlHistorico);
$stmtHistorico->bindValue(':idUsuario', $idUsuario, PDO::PARAM_INT);
$stmtHistorico->execute();
$serviciosHistorico = $stmtHistorico->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi Área | Personal Clean</title>
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

    <nav style="--bs-breadcrumb-divider: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%278%27 height=%278%27%3E%3Cpath d=%27M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z%27 fill=%27%236c757d%27/%3E%3C/svg%3E');" aria-label="breadcrumb">
        <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="index.php"><img src="./assets/images/house.svg" alt=""></a>
            </li>
            <li class="breadcrumb-item active"> <a href="<?php echo ($_SESSION['usuario']['tipo'] == 'funcionarios') ? 'area_funcionarios.php' : 'area_clientes.php'; ?>">Area Principal</a></li>
            <li class="breadcrumb-item">Mi area</li>
        </ol>
    </nav>

    <h3 class="centrado">Mis servicios:</h3>

    <div class="soyPrincipal">
        <div class="listadoGeneral">
            <?php if (!empty($serviciosActivos)): ?>
                <?php foreach ($serviciosActivos as $servicio): ?>
                    <div class="elementoCaja">
                        <p class="elementoCaja-timeinfo">Creado hace <span><?php echo tiempoTranscurrido($servicio['fechaServicio']); ?></span></p>
                        <p class="elementoCaja-tituloServ"><?php echo htmlspecialchars($servicio['titulo']); ?></p>
                        <p class="elementoCaja-timeinfo"><?php echo htmlspecialchars($servicio['diaServicio']); ?></p>
                        <p class="elementoCaja-descripcion"><?php echo htmlspecialchars($servicio['descripcion']); ?></p>
                        <div class="elementoCaja-data">
                            <p class="data-dinero"><span><?php echo htmlspecialchars($servicio['valor']); ?></span>€</p>
                            <p class="data-localidad"><img src="./assets/images/mappoint.svg" alt=""> <?php echo htmlspecialchars($servicio['provincia'] . " - " . $servicio['ciudad']); ?></p>
                            <p class="data-person"><img src="./assets/images/personpc.svg" alt=""><span>Funcionario: <?php echo htmlspecialchars($servicio['nombre_cliente']); ?></span></p>
                            <p class="data-twork"><img src="./assets/images/handwork.svg" alt=""><span>Tipo:</span> <?php echo htmlspecialchars($servicio['tipoServicio']); ?></p>
                            <p class="data-estado">
                                <?php 
                                    echo "Estado: " . ucfirst($servicio['estado']); 
                                    $clase = ($servicio['estado'] === 'activo') ? 'estado-activo' : 'estado-confirmacion';
                                ?>
                                <span class="estado-indicador <?php echo $clase; ?>"></span>
                            </p>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <p class="centrado">No hay servicios activos.</p>
            <?php endif; ?>
        </div>
    </div>

    <h3 class="centrado">Histórico de Servicios:</h3>

    <div class="soyPrincipal">
        <div class="listadoGeneral">
            <?php if (!empty($serviciosHistorico)): ?>
                <?php foreach ($serviciosHistorico as $servicio): ?>
                    <div class="elementoCaja">
                        <p class="elementoCaja-timeinfo">Creado hace <span><?php echo tiempoTranscurrido($servicio['fechaServicio']); ?></span></p>
                        <p class="elementoCaja-tituloServ"><?php echo htmlspecialchars($servicio['titulo']); ?></p>
                        <p class="elementoCaja-timeinfo"><?php echo htmlspecialchars($servicio['diaServicio']); ?></p>
                        <p class="elementoCaja-descripcion"><?php echo htmlspecialchars($servicio['descripcion']); ?></p>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <div class="noHayHistorioco">
                    <img class="centrado" src="./assets/images/historylogo.svg" alt="">
                    <h3>No hay histórico</h3>
                </div>
            <?php endif; ?>
        </div>
    </div>

    <?php include_once './assets/footer.php'; ?>
</body>
</html>
