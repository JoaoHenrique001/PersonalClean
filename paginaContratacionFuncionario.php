<?php
include './assets/ajax/conexionBD.php';
session_start();

// Verificación de acceso (solo funcionarios)
if ($_SESSION['usuario']['tipo'] == 'clientes') {
    header("Location: logout.php");
    exit;
}

// Verificar que se reciba el idServicio por GET
if (!isset($_GET['idServicio'])) {
    echo "No se especificó el servicio.";
    exit;
}
$idServicio = (int)$_GET['idServicio'];

// Obtener datos del servicio y del cliente
$sqlServicio = "SELECT s.idcliente, c.nombre AS nombre_cliente 
                FROM servicios s 
                LEFT JOIN clientes c ON s.idcliente = c.idcliente 
                WHERE s.idServicio = :idServicio";
$stmtServicio = $conexion->prepare($sqlServicio);
$stmtServicio->bindValue(':idServicio', $idServicio, PDO::PARAM_INT);
$stmtServicio->execute();
$servicioData = $stmtServicio->fetch(PDO::FETCH_ASSOC);

if (!$servicioData) {
    echo "Servicio no encontrado.";
    exit;
}

$idCliente = $servicioData['idcliente'];
$nombreCliente = $servicioData['nombre_cliente'];
$idFuncionario = $_SESSION['usuario']['idFuncionarios'];

// Inicialización de variables
$error = "";
$exito = "";
$mostrarCard = false;

// Procesamiento del formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    if (isset($_POST['redirigirChat'])) {
        $descripcion = $_POST['descripcion'] ?? "Solicitud de contratación enviada"; // Mensaje predeterminado si está vacío

        // Verificar si ya existe un chat entre el cliente y el funcionario
        $sqlChat = "SELECT idchats FROM chats WHERE idCliente = :idCliente AND idFuncionario = :idFuncionario";
        $stmtChat = $conexion->prepare($sqlChat);
        $stmtChat->bindValue(':idCliente', $idCliente, PDO::PARAM_INT);
        $stmtChat->bindValue(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
        $stmtChat->execute();
        $chatData = $stmtChat->fetch(PDO::FETCH_ASSOC);

        if (!$chatData) {
            // Crear un nuevo chat si no existe
            $sqlNuevoChat = "INSERT INTO chats (idCliente, idFuncionario) VALUES (:idCliente, :idFuncionario)";
            $stmtNuevoChat = $conexion->prepare($sqlNuevoChat);
            $stmtNuevoChat->bindValue(':idCliente', $idCliente, PDO::PARAM_INT);
            $stmtNuevoChat->bindValue(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
            $stmtNuevoChat->execute();
            $idChat = $conexion->lastInsertId();
        } else {
            // Si ya existe, usar ese chat
            $idChat = $chatData['idchats'];
        }

        // Insertar el mensaje en la tabla `mensajes`
        $fechaHora = date("Y-m-d H:i:s");
        $sqlMensaje = "INSERT INTO mensajes (idChat, contenido, envia, fechaHora) 
                       VALUES (:idChat, :contenido, 'funcionario', :fechaHora)";
        $stmtMensaje = $conexion->prepare($sqlMensaje);
        $stmtMensaje->bindValue(':idChat', $idChat, PDO::PARAM_INT);
        $stmtMensaje->bindValue(':contenido', $descripcion);
        $stmtMensaje->bindValue(':fechaHora', $fechaHora);
        $stmtMensaje->execute();

        // Redirigir a chat.php
        header("Location: chat.php?idchat=$idChat");
        exit;
    }

    // Procesar la solicitud de contratación
    $valorAlternativo = trim($_POST['valorAlternativo'] ?? "");
    $descripcion = trim($_POST['descripcion'] ?? "");

    $sqlInsert = "INSERT INTO pedidos_servicios (idServicio, idFuncionario, activo, descripcion, valorAlternativo) 
                  VALUES (:idServicio, :idFuncionario, 'no', :descripcion, :valorAlternativo)";
    $stmtInsert = $conexion->prepare($sqlInsert);
    $stmtInsert->bindValue(':idServicio', $idServicio, PDO::PARAM_INT);
    $stmtInsert->bindValue(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
    $stmtInsert->bindValue(':descripcion', $descripcion);
    $stmtInsert->bindValue(':valorAlternativo', $valorAlternativo);
    
    if ($stmtInsert->execute()) {
        $exito = "Solicitud de contratación enviada correctamente.";
        $mostrarCard = true;
    } else {
        $error = "Error al enviar la solicitud de contratación. Intenta más tarde.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Contratación Funcionario | Personal Clean</title>
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
    <nav style="--bs-breadcrumb-divider: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%278%27 height=%278%27%3E%3Cpath d=%27M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z%27 fill=%27%236c757d%27/%3E%3C/svg%3E');" aria-label="breadcrumb">
        <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="index.php"><img src="./assets/images/house.svg" alt=""></a>
            </li>
            <li class="breadcrumb-item active"> <a href="<?php echo ($_SESSION['usuario']['tipo'] == 'funcionarios') ? 'area_funcionarios.php' : 'area_clientes.php'; ?>">Area Principal</a></li>
            <li class="breadcrumb-item">Pagina de contratación</li>
            <li class="breadcrumb-item">Enviar Contratación</li>
        </ol>
    </nav>
    <!-- Fin migas de pan -->

    <div class="crearServ">
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php elseif ($exito && !$mostrarCard): ?>
            <p style="color: green;"><?php echo $exito; ?></p>
        <?php endif; ?>

        <?php if (!$mostrarCard): ?>
        <form action="" method="POST">
            <input type="hidden" name="idServicio" value="<?php echo $idServicio; ?>">
            <div class="contraServ">
                <label for="valorAlternativo">Contra propuesta (opcional):</label>
                <input type="text" name="valorAlternativo" id="valorAlternativo">
                <textarea name="descripcion" id="descripcion" placeholder="Presentación"></textarea>
            </div>
            <div class="crearServ-bot">
                <input type="submit" value="Enviar mensaje para contratación">
            </div>
        </form>
        <?php endif; ?>
    </div>

    <?php if ($mostrarCard): ?>
        <div id="cajaid" class="cajaAviso">
            <div id="avisoGeneral" class="avisoContenido">
                <p>Ha sido enviado este mensaje al chat del cliente: <?php echo htmlspecialchars($nombreCliente); ?></p>
                <button onclick="window.location.href='area_funcionarios.php'">OK</button>
                <form method="POST">
                    <input type="hidden" name="redirigirChat" value="true">
                    <input type="hidden" name="descripcion" value="<?php echo htmlspecialchars($descripcion); ?>">
                    <button type="submit">Ir a chat</button>
                </form>
            </div>
        </div>
    <?php endif; ?>
</body>
</html>
