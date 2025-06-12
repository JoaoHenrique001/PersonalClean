<?php
session_start();
include './assets/ajax/conexionBD.php';

// Lógica para procesar la acción cuando el formulario se envía
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['action'], $_POST['idpedido'])) {
    $idpedido = $_POST['idpedido'];

    if ($_POST['action'] === 'accept') {
        // Primero, obtener los datos del pedido: idServicio e idFuncionario
        $sql = "SELECT idServicio, idFuncionario FROM pedidos_servicios WHERE idpedidoServicio = :idpedido";
        $stmt = $conexion->prepare($sql);
        $stmt->bindValue(':idpedido', $idpedido, PDO::PARAM_INT);
        $stmt->execute();
        $pedido = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($pedido) {
            $idServicio = $pedido['idServicio'];
            $idFuncionario = $pedido['idFuncionario'];

            // Actualizar la tabla servicios asignándole el idFuncionario correspondiente
            $sqlUpdate = "UPDATE servicios SET idFuncionario = :idFuncionario WHERE idServicio = :idServicio";
            $stmtUpdate = $conexion->prepare($sqlUpdate);
            $stmtUpdate->bindValue(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
            $stmtUpdate->bindValue(':idServicio', $idServicio, PDO::PARAM_INT);
            $stmtUpdate->execute();

            // Eliminar el pedido de la tabla pedidos_servicios
            $sqlDelete = "DELETE FROM pedidos_servicios WHERE idpedidoServicio = :idpedido";
            $stmtDelete = $conexion->prepare($sqlDelete);
            $stmtDelete->bindValue(':idpedido', $idpedido, PDO::PARAM_INT);
            $stmtDelete->execute();
        }
    } elseif ($_POST['action'] === 'reject') {
        // Simplemente eliminar el pedido sin actualizar la tabla de servicios
        $sqlDelete = "DELETE FROM pedidos_servicios WHERE idpedidoServicio = :idpedido";
        $stmtDelete = $conexion->prepare($sqlDelete);
        $stmtDelete->bindValue(':idpedido', $idpedido, PDO::PARAM_INT);
        $stmtDelete->execute();
    }
    
    // Redireccionamos para evitar reenvío de formulario y refrescar la vista
    header("Location: " . $_SERVER['PHP_SELF']);
    exit;
}

// Consulta para mostrar los pedidos ya existentes
$idCliente = $_SESSION['usuario']['idCliente'];
$sql = "SELECT 
          ps.idpedidoServicio,
          ps.descripcion,
          ps.valorAlternativo,
          f.idFuncionarios,
          f.nombre,
          f.apellidos,
          f.provincia AS provincia,
          f.ciudad AS ciudad,
          s.valor AS valorServicio,
          s.titulo AS titulo
        FROM pedidos_servicios ps 
        INNER JOIN funcionarios f ON ps.idFuncionario = f.idFuncionarios
        INNER JOIN servicios s ON ps.idServicio = s.idServicio
        WHERE s.idCliente = :idCliente";       
$consulta = $conexion->prepare($sql);
$consulta->bindValue(':idCliente', $idCliente, PDO::PARAM_INT);
$consulta->execute();
$pedidos = $consulta->fetchAll(PDO::FETCH_ASSOC);
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

    <!-- Inicio migas de pan -->
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
            <li class="breadcrumb-item active" aria-current="page"><a href="index.php"><img src="./assets/images/house.svg" alt=""></a></li>
            <li class="breadcrumb-item">Area Principal</li>
        </ol>
    </nav>
    <!-- Fin migas de pan -->

    <div class="soyPrincipal">
        <!-- Inicio caja que se repite, dependiendo del contenido de la página -->
        <div class="listadoGeneral">
            <?php if (!empty($pedidos)) { ?>
                <?php foreach ($pedidos as $pedido) { ?>
                    <div class="elementoCaja elementoCajaFuncionario">
                        <p class="elementoCaja-tituloServ">
                            <span><?php echo htmlspecialchars($pedido['nombre'] . " " . $pedido['apellidos']); ?></span>
                            ha pedido el servicio de nombre 
                            <span><?php echo htmlspecialchars($pedido['titulo']); ?></span>.
                            Puedes aceptarlo o negarlo.
                        </p>
                        <p class="elementoCaja-descripcion">
                            <?php echo htmlspecialchars($pedido['descripcion']); ?>
                        </p>
                        <div class="elementoCaja-data">
                            <p class="data-localidad">
                                <img src="./assets/images/mappoint.svg" alt="">
                                <?php echo htmlspecialchars($pedido['provincia'] . " - " . $pedido['ciudad']); ?>
                            </p>
                            <p class="data-nmoney">
                                <img src="./assets/images/nMoney.svg" alt="">
                                Contra propuesta: <?php echo htmlspecialchars($pedido['valorAlternativo']); ?>€
                            </p>
                            <p class="data-omoney">
                                <img src="./assets/images/oMoney.svg" alt="">
                                Valor Original: <?php echo htmlspecialchars($pedido['valorServicio']); ?>€
                            </p>
                        </div>
                        <div class="elementoCaja-butones">
                            <!-- Formulario para confirmar el pedido -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="accept">
                                <input type="hidden" name="idpedido" value="<?php echo $pedido['idpedidoServicio']; ?>">
                                <button type="submit" class="confirmed">
                                    <img src="./assets/images/confirmed.svg" alt="confirmar pedido">
                                </button>
                            </form>
                            <!-- Formulario para rechazar el pedido -->
                            <form method="POST" style="display:inline;">
                                <input type="hidden" name="action" value="reject">
                                <input type="hidden" name="idpedido" value="<?php echo $pedido['idpedidoServicio']; ?>">
                                <button type="submit" class="notconfirmed">
                                    <img src="./assets/images/notconfirmed.svg" alt="no confirmar pedido">
                                </button>
                            </form>
                        </div>
                    </div>
                <?php } ?>
            <?php } else { ?>
                <div class="PedidosVacio">
                    <img src="./assets/images/sadBoy.svg" alt="">
                    <p>No hay pedidos</p>
                </div>
            <?php } ?>
        </div>
        <!-- Fin caja que se repite dependiendo del contenido de la página -->
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
        </div>
    </div>

    <?php include_once './assets/footer.php'; ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>
