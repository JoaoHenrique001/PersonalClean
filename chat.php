<?php
session_start();
include './assets/ajax/conexionBD.php';

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["mensajeChat"]) && isset($_POST["idChat"])) {
    $idChat = $_POST["idChat"];
    $mensajeChat = trim($_POST["mensajeChat"]);

    if (!empty($mensajeChat)) {
        $tipo_usuario = $_SESSION['usuario']['tipo'];
        $envia = ($tipo_usuario === "clientes") ? "cliente" : "funcionario";
        $fechaHora = date("Y-m-d H:i:s");

        $sqlInsert = "INSERT INTO mensajes (idChat, contenido, envia, fechaHora) 
                      VALUES (:idChat, :contenido, :envia, :fechaHora)";
        $stmtInsert = $conexion->prepare($sqlInsert);
        $stmtInsert->bindValue(':idChat', $idChat);
        $stmtInsert->bindValue(':contenido', $mensajeChat);
        $stmtInsert->bindValue(':envia', $envia);
        $stmtInsert->bindValue(':fechaHora', $fechaHora);
        $stmtInsert->execute();
    }
    header("Location: " . $_SERVER["REQUEST_URI"]);
    exit;
}

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}

$tipo_usuario = $_SESSION['usuario']['tipo'];
$miTipo = ($tipo_usuario === 'clientes') ? 'cliente' : 'funcionario';

if ($tipo_usuario === 'clientes') {
    $user_id = $_SESSION['usuario']['idCliente'];
    $sqlChats = "SELECT ch.idchats, f.nombre AS nombre_op, f.apellidos AS ap_op 
                 FROM chats ch 
                 JOIN funcionarios f ON ch.idFuncionario = f.idFuncionarios 
                 WHERE ch.idCliente = :user_id";
} else {
    $user_id = $_SESSION['usuario']['idFuncionarios'];
    $sqlChats = "SELECT ch.idchats, c.nombre AS nombre_op, c.apellidos AS ap_op 
                 FROM chats ch 
                 JOIN clientes c ON ch.idCliente = c.idCliente 
                 WHERE ch.idFuncionario = :user_id";
}

$stmtChats = $conexion->prepare($sqlChats);
$stmtChats->bindValue(':user_id', $user_id);
$stmtChats->execute();
$chats = $stmtChats->fetchAll(PDO::FETCH_ASSOC);

$selected_chat_id = isset($_GET['idchat']) ? (int)$_GET['idchat'] : null;

$mensajes = [];
if ($selected_chat_id) {
    $sqlMensajes = "SELECT * FROM mensajes WHERE idChat = :chat_id ORDER BY fechaHora ASC";
    $stmtMensajes = $conexion->prepare($sqlMensajes);
    $stmtMensajes->bindValue(':chat_id', $selected_chat_id);
    $stmtMensajes->execute();
    $mensajes = $stmtMensajes->fetchAll(PDO::FETCH_ASSOC);
}
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
    <script src="./assets/js/chat.js"></script> 
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
            <li class="breadcrumb-item">Chat</li>
        </ol>
    </nav>

    <div class="areaChat">
        <aside class="conversasiones">
            <?php foreach ($chats as $chat): ?>
                <a href="chat.php?idchat=<?php echo $chat['idchats']; ?>">
                    <div class="conversasiones_persona <?php echo ($selected_chat_id == $chat['idchats']) ? 'chatSelect' : ''; ?>">
                        <img src="./assets/images/userIcon.svg" alt="">
                        <p class="conversasiones_nombre">
                            <?php echo htmlspecialchars($chat['nombre_op'] . ' ' . $chat['ap_op']); ?>
                        </p>
                    </div>
                </a>
            <?php endforeach; ?>
        </aside>

        <div class="chat">
            <?php if ($selected_chat_id): ?>
                <?php foreach ($mensajes as $msg): 
                    $clase = ($msg['envia'] == $miTipo) ? 'cajaPrincipal' : 'cajaSecundario';
                ?>
                    <div class="<?php echo $clase; ?>">
                        <p><?php echo htmlspecialchars($msg['contenido']); ?></p>
                        <span><?php echo date("H:i", strtotime($msg['fechaHora'])); ?></span>
                    </div>
                <?php endforeach; ?>
                <div class="envioMensaje">
                    <form method="POST" action="">
                        <input type="hidden" name="idChat" value="<?php echo $selected_chat_id; ?>">
                        <textarea name="mensajeChat" id="mensajeChat" placeholder="Escribir mensaje"></textarea>
                        <button type="submit"><img src="./assets/images/sendMessage.svg" alt="Enviar"></button>
                    </form>
                </div>
            <?php else: ?>
                <div class="mensajeVacio">
                <img src="./assets/images/emptyMessages.svg" alt="">
                <p>Seleccione un chat para ver los mensajes.</p>
                </div>
            <?php endif; ?>
        </div>
    </div>
</body>
</html>
