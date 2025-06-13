<?php 
session_start();
include './assets/ajax/conexionBD.php';

if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo'] !== 'administradores') {
    header("Location: login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['id'])) {
    $idServicio = $_POST['id'];

    $stmt = $conexion->prepare("DELETE FROM servicios WHERE idServicio = :id");
    $stmt->bindParam(':id', $idServicio, PDO::PARAM_INT);
    $stmt->execute();
}

$sql = "SELECT 
            s.idServicio,
            c.nombre AS nombreCliente,
            f.nombre AS nombreFuncionario,
            s.fechaServicio,
            s.estado,
            s.titulo,
            s.valor,
            s.provincia,
            s.ciudad
        FROM servicios s
        INNER JOIN clientes c ON s.idCliente = c.idCliente
        INNER JOIN funcionarios f ON s.idFuncionario = f.idfuncionarios";

$resultado = $conexion->query($sql);
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
        <h1 class="preAd">Gestionar servicios: <span><?php echo $_SESSION['usuario']['nombre']; ?></span>
            <a href="./logout.php">
                <svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-door-open" viewBox="0 0 16 16">
                    <path d="M8.5 10c-.276 0-.5-.448-.5-1s.224-1 .5-1 .5.448.5 1-.224 1-.5 1"/>
                    <path d="M10.828.122A.5.5 0 0 1 11 .5V1h.5A1.5 1.5 0 0 1 13 2.5V15h1.5a.5.5 0 0 1 0 1h-13a.5.5 0 0 1 0-1H3V1.5a.5.5 0 0 1 .43-.495l7-1a.5.5 0 0 1 .398.117M11.5 2H11v13h1V2.5a.5.5 0 0 0-.5-.5M4 1.934V15h6V1.077z"/>
                </svg>
            </a>
        </h1>

        <div class="areaTabla">
            <table class="tablaGestion">
                <thead class="table-dark">
                    <tr>
                        <th>Cliente</th>
                        <th>Funcionario</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th>Título</th>
                        <th>Valor (€)</th>
                        <th>Provincia</th>
                        <th>Ciudad</th>
                        <th>Ver más</th>
                        <th>Eliminar</th>
                    </tr>
                </thead>
                <tbody>
                <?php while ($servicio = $resultado->fetch(PDO::FETCH_ASSOC)): ?>
                    <tr>
                        <td><?php echo $servicio['nombreCliente']; ?></td>
                        <td><?php echo $servicio['nombreFuncionario']; ?></td>
                        <td><?php echo $servicio['fechaServicio']; ?></td>
                        <td><?php echo $servicio['estado']; ?></td>
                        <td><?php echo $servicio['titulo']; ?></td>
                        <td><?php echo $servicio['valor']; ?>€</td>
                        <td><?php echo $servicio['provincia']; ?></td>
                        <td><?php echo $servicio['ciudad']; ?></td>
                        
                        <td>
                            <a href="detalleServicio.php?idServicio=<?php echo $servicio['idServicio']; ?>" class="btn btn-sm btn-primary">Ver</a>
                        </td>

                        <td>
                            <form action="" method="POST" onsubmit="return confirm('¿Estás seguro de que deseas eliminar este servicio?');">
                                <input type="hidden" name="id" value="<?php echo $servicio['idServicio']; ?>">
                                <button type="submit" class="btn btn-sm btn-danger">🗑</button>
                            </form>
                        </td>
                    </tr>
                <?php endwhile; ?>
                </tbody>
            </table>
        </div>
    </main>
</body>
</html>
