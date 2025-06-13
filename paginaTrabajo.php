<?php
include './assets/ajax/conexionBD.php';
session_start();

if ($_SESSION['usuario']['tipo'] !== 'funcionarios') {
    header("Location: logout.php");
    exit;
}

if (!isset($_GET['idServicio'])) {
    echo "No se ha especificado un servicio.";
    exit;
}

$idServicio = (int)$_GET['idServicio'];

$sql = "SELECT s.*, 
               c.idcliente, c.nombre AS nombre_cliente, c.apellidos AS apellido_cliente, 
               f.nombre AS nombre_funcionario, f.apellidos AS apellido_funcionario 
        FROM servicios s 
        LEFT JOIN clientes c ON s.idcliente = c.idcliente 
        LEFT JOIN funcionarios f ON s.idFuncionario = f.idFuncionarios
        WHERE s.idServicio = :idServicio";
$stmt = $conexion->prepare($sql);
$stmt->bindValue(':idServicio', $idServicio, PDO::PARAM_INT);
$stmt->execute();
$servicio = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$servicio) {
    echo "Servicio no encontrado.";
    exit;
}

$idClienteServicio = $servicio['idcliente'];
$sqlValoraciones = "SELECT estrellas, comentario 
                    FROM valoraciones_servicios 
                    WHERE idCliente = :idCliente";
$stmtValoraciones = $conexion->prepare($sqlValoraciones);
$stmtValoraciones->bindValue(':idCliente', $idClienteServicio, PDO::PARAM_INT);
$stmtValoraciones->execute();
$valoraciones = $stmtValoraciones->fetchAll(PDO::FETCH_ASSOC);
$hayValoraciones = count($valoraciones) > 0;

function renderEstrellas($estrellasValoracion) {
    $fullStars = floor($estrellasValoracion / 2);
    $hollowStars = 5 - $fullStars;
    $html = "";
    for ($i = 0; $i < $fullStars; $i++) {
        $html .= '<img src="./assets/images/fullstar.svg" alt="Full Star">';
    }
    for ($i = 0; $i < $hollowStars; $i++) {
        $html .= '<img src="./assets/images/hollowstar.svg" alt="Hollow Star">';
    }
    return $html;
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalle del Trabajo | Personal Clean</title>
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
            <li class="breadcrumb-item active">
                <a href="<?php echo ($_SESSION['usuario']['tipo'] == 'funcionarios') ? 'area_funcionarios.php' : 'area_clientes.php'; ?>">Area Principal</a>
            </li>
            <li class="breadcrumb-item">Pagina de contratación</li>
        </ol>
    </nav>

    <div class="pTrabajo">
        <div class="CajaDetalle">
            <p><b>Título:</b> <?php echo htmlspecialchars($servicio['titulo']); ?></p>
            <p><b>Tipo:</b> <?php echo htmlspecialchars($servicio['tipoServicio']); ?></p>
            <p><b>Valor:</b> <?php echo htmlspecialchars($servicio['valor']); ?> €</p>
            <p><b>Día:</b> <?php echo htmlspecialchars($servicio['diaServicio']); ?></p>
            <p><b>Cliente:</b> <?php echo htmlspecialchars($servicio['nombre_cliente'] . ' ' . $servicio['apellido_cliente']); ?></p>
            <p><b>Dirección:</b> <?php echo htmlspecialchars($servicio['direccion']); ?></p>
            <p><b>Provincia:</b> <?php echo htmlspecialchars($servicio['provincia']); ?></p>
            <p><b>Ciudad:</b> <?php echo htmlspecialchars($servicio['ciudad']); ?></p>
            <p><b>Descripción:</b> <?php echo htmlspecialchars($servicio['descripcion']); ?></p>
            <a href="paginaContratacionFuncionario.php?idServicio=<?php echo $servicio['idServicio']; ?>">
                <button>Aplicar a trabajo</button>
            </a>
        </div>

        <div class="valoraciones">
            <h2>Valoraciones de Clientes:</h2>
            <div class="espacioValoraciones">
                <?php if ($hayValoraciones): ?>
                    <?php foreach ($valoraciones as $val): ?>
                        <div class="dataValoracion">
                            <div class="cantidadEstrellas">
                                <?php echo renderEstrellas($val['estrellas']); ?>
                            </div>
                            <p>
                                <b><?php echo htmlspecialchars(round($val['estrellas']/2,1)); ?></b>
                                <?php echo htmlspecialchars($val['comentario']); ?>
                            </p>
                        </div>
                    <?php endforeach; ?>
                <?php else: ?>
                    <img src="./assets/images/nodataicon.svg" alt="">
                    <h3>No hay valoraciones</h3>
                <?php endif; ?>
            </div>
        </div>
    </div>

    <?php include_once './assets/footer.php'; ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>
