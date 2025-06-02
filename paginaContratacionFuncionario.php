<?php
include './assets/ajax/conexionBD.php';
session_start();

// Depuración (opcional)
// echo "<pre>";
// var_dump($_SESSION);
// echo "</pre>";

// Verificar que el usuario NO sea de tipo cliente (esta página es solo para funcionarios)
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

// Consultar información del servicio para obtener el nombre del cliente
$sqlServicio = "SELECT s.*, c.nombre AS nombre_cliente 
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
$nombreCliente = $servicioData['nombre_cliente'];

// Inicializamos variables para mensajes y para controlar la visualización de la notificación
$error = "";
$exito = "";
$mostrarCard = false;

// Procesamiento del formulario: cuando se envía la contra propuesta y el mensaje
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Recoger datos del formulario
    $valorAlternativo = isset($_POST['valorAlternativo']) ? trim($_POST['valorAlternativo']) : "";
    $descripcion = isset($_POST['descripcion']) ? trim($_POST['descripcion']) : "";

    // Obtener el idFuncionario desde la sesión (se asume que se guarda en 'idFuncionarios')
    $idFuncionario = $_SESSION['usuario']['idFuncionarios'];
    // Valor predeterminado de "activo" es "no"
    $activo = "no";

    $sqlInsert = "INSERT INTO pedidos_servicios (idServicio, idFuncionario, activo, descripcion, valorAlternativo) 
                  VALUES (:idServicio, :idFuncionario, :activo, :descripcion, :valorAlternativo)";
    $stmtInsert = $conexion->prepare($sqlInsert);
    $stmtInsert->bindValue(':idServicio', $idServicio, PDO::PARAM_INT);
    $stmtInsert->bindValue(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
    $stmtInsert->bindValue(':activo', $activo);
    $stmtInsert->bindValue(':descripcion', $descripcion);
    $stmtInsert->bindValue(':valorAlternativo', $valorAlternativo);
    
    if ($stmtInsert->execute()){
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
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
    <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
        <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="index.php"><img src="./assets/images/house.svg" alt=""></a>
            </li>
            <li class="breadcrumb-item">Area Principal</li>
            <li class="breadcrumb-item">Contratación</li>
        </ol>
    </nav>
    <!-- Fin migas de pan -->

    <div class="crearServ">
        <?php if ($error): ?>
            <p style="color: red;"><?php echo $error; ?></p>
        <?php elseif ($exito && !$mostrarCard): ?>
            <p style="color: green;"><?php echo $exito; ?></p>
        <?php endif; ?>

        <!-- Si no se envió el formulario o si no se muestra la tarjeta aún, se muestra el formulario -->
        <?php if (!$mostrarCard): ?>
        <form action="" method="POST">
            <input type="hidden" name="idServicio" value="<?php echo $idServicio; ?>">
            <div class="contraServ">
                <label for="valorAlternativo">Contra propuesta (opcional):</label>
                <input type="text" name="valorAlternativo" id="valorAlternativo">
                <textarea name="descripcion" id="descripcion" placeholder="Preséntate o explica por qué te interesa este trabajo"></textarea>
            </div>
            <div class="crearServ-bot">
                <input type="submit" value="Enviar mensaje para contratación">
            </div>
        </form>
        <?php endif; ?>
    </div>

    <!-- Caja de aviso: Se muestra si la solicitud se insertó exitosamente -->
    <?php if ($mostrarCard): ?>
        <div id="cajaid" class="cajaAviso">
            <div id="avisoGeneral" class="avisoContenido">
                <p>Ha sido enviado este mensaje al chat del cliente: <?php echo htmlspecialchars($nombreCliente); ?></p>
                <button id="ok" onclick="window.location.href='area_funcionarios.php'">OK</button>
                <button id="ir_chat">
                    <a href="enviarMensajeContratacion.php?idServicio=<?php echo $idServicio; ?>">Ir a chat</a>
                </button>
            </div>
        </div>
    <?php endif; ?>

    <?php include_once './assets/footer.php'; ?>
    <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
    <script>AOS.init();</script>
</body>
</html>
