<?php
include './assets/ajax/conexionBD.php';
session_start();

// Opcional: para depurar, coméntalo una vez que termines
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";

// Verificar que el usuario sea un funcionario
if ($_SESSION['usuario']['tipo'] !== 'funcionarios') {
    header("Location: logout.php");
    exit;
}

// Verificar que se reciba el idServicio por GET
if (!isset($_GET['idServicio'])) {
    echo "No se ha especificado un servicio.";
    exit;
}

$idServicio = (int)$_GET['idServicio'];

// Consultar los datos del servicio a partir del idServicio
$sql = "SELECT s.*, 
               c.nombre AS nombre_cliente, c.apellidos AS apellido_cliente, 
               f.nombre AS nombre_funcionario, f.apellidos AS apellido_funcionario 
        FROM servicios s 
        LEFT JOIN clientes c ON s.idcliente = c.idcliente 
        LEFT JOIN funcionarios f ON s.idFuncionario = f.idFuncionarios
        WHERE s.idServicio = :idServicio";
$stmt = $conexion->prepare($sql);
$stmt->bindValue(':idServicio', $idServicio, PDO::PARAM_INT);
$stmt->execute();
$servicio = $stmt->fetch(PDO::FETCH_ASSOC);

// Si no se encontró el servicio, se muestra un error
if (!$servicio) {
    echo "Servicio no encontrado.";
    exit;
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

    <!-- Migas de pan -->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="index.php"><img src="./assets/images/house.svg" alt=""></a>
            </li>
            <li class="breadcrumb-item">Area Principal</li>
            <li class="breadcrumb-item">Pagina de contratación</li>
        </ol>
    </nav>
    <!-- Fin migas de pan -->

    <div class="pTrabajo">
        <!-- Caja de detalles -->
        <div class="CajaDetalle">
            <p><b>Titulo:</b> <?php echo htmlspecialchars($servicio['titulo']); ?></p>
            <p><b>Tipo:</b> <?php echo htmlspecialchars($servicio['tipoServicio']); ?></p>
            <p><b>Valor:</b> <?php echo htmlspecialchars($servicio['valor']); ?> €</p>
            <p><b>Dia:</b> <?php echo htmlspecialchars($servicio['diaServicio']); ?></p>
            <p><b>Cliente:</b> <?php echo htmlspecialchars($servicio['nombre_cliente'] . ' ' . $servicio['apellido_cliente']); ?></p>
            <p><b>Dirección:</b> <?php echo htmlspecialchars($servicio['direccion']); ?></p>
            <p><b>Provincia:</b> <?php echo htmlspecialchars($servicio['provincia']); ?></p>
            <p><b>Ciudad:</b> <?php echo htmlspecialchars($servicio['ciudad']); ?></p>
            <p><b>Descripción:</b> <?php echo htmlspecialchars($servicio['descripcion']); ?></p>
            <!-- El botón redirige a paginaContratacion.php pasando el idServicio -->
            <a href="paginaContratacionFuncionario.php?idServicio=<?php echo $servicio['idServicio']; ?>">
                <button>Aplicar a trabajo</button>
            </a>
        </div>

        <!-- Sección de Valoraciones (en este ejemplo se muestra un placeholder) -->
        <div class="valoraciones">
            <h2>Valoraciones de Clientes:</h2>
            <div class="espacioValoraciones">
                <img src="./assets/images/nodataicon.svg" alt="">
                <h3>No hay valoraciones</h3>
            </div>
        </div>
    </div>

    <?php include_once './assets/footer.php'; ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>
