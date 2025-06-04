<?php
include './assets/ajax/conexionBD.php';
session_start();

// Verificación de acceso (solo clientes)
if ($_SESSION['usuario']['tipo'] !== 'clientes') {
    header("Location: logout.php");
    exit;
}

// Obtener datos del usuario desde la sesión
$idCliente = $_SESSION['usuario']['idCliente'];
$provincia = $_SESSION['usuario']['provincia'] ?? "";
$ciudad = $_SESSION['usuario']['ciudad'] ?? "";
$direccion = $_SESSION['usuario']['direccion'] ?? "";

// Variable para controlar la visualización de la tarjeta emergente
$mostrarCard = false;

// Procesamiento del formulario de creación de servicio
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $titulo = trim($_POST['titulo'] ?? "");
    $descripcion = trim($_POST['descripcion'] ?? "");
    $tipoServicio = trim($_POST['tipoServicio'] ?? "");
    $valor = trim($_POST['valor'] ?? "");
    $diaServicio = trim($_POST['diaServicio'] ?? "");
    $miProvincia = trim($_POST['miProvincia'] ?? $provincia);
    $miCiudad = trim($_POST['miCiudad'] ?? $ciudad);
    $miDireccion = trim($_POST['miDireccion'] ?? $direccion);
    $fechaServicio = date("Y-m-d H:i:s");
    $estado = "activo";
    $valorado = "no";

    // Insertar el nuevo servicio en la base de datos
    $sql = "INSERT INTO servicios (idCliente, fechaServicio, estado, titulo, descripcion, tipoServicio, valor, diaServicio, direccion, provincia, ciudad, valorado) 
            VALUES (:idCliente, :fechaServicio, :estado, :titulo, :descripcion, :tipoServicio, :valor, :diaServicio, :direccion, :provincia, :ciudad, :valorado)";
    
    $consulta = $conexion->prepare($sql);
    $consulta->execute([
        ':idCliente' => $idCliente,
        ':fechaServicio' => $fechaServicio,
        ':estado' => $estado,
        ':titulo' => $titulo,
        ':descripcion' => $descripcion,
        ':tipoServicio' => $tipoServicio,
        ':valor' => $valor,
        ':diaServicio' => $diaServicio,
        ':direccion' => $miDireccion,
        ':provincia' => $miProvincia,
        ':ciudad' => $miCiudad,
        ':valorado' => $valorado
    ]);

    $mostrarCard = true; // Activar la tarjeta de confirmación
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Crear Servicio | Personal Clean</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/estilos.css" />
    <script src="./assets/js/modoOscuro.js"></script>
    <script src="./assets/js/cajaAviso.js"></script> <!--puede ser que crie otro archivo js-->
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico" />
</head>
<body>
    <?php include_once './assets/headerLogueado.php'; ?>

    <!-- Migas de pan -->
    <nav>
        <ol class="breadcrumb">
            <li class="breadcrumb-item active">
                <a href="area_clientes.php">
                    <img src="./assets/images/house.svg" alt="">
                </a>
            </li>
            <li class="breadcrumb-item">Crear Servicio</li>
        </ol>
    </nav>
    <!-- Fin migas de pan -->

    <div class="crearServ">
        <?php if (!$mostrarCard): ?>
        <form action="" method="POST">
            <div class="crearServ-campos">
                <div class="crearServ-izq">
                    <input type="text" placeholder="Título" name="titulo" required>
                    <textarea placeholder="Descripción" name="descripcion" required></textarea>
                </div>
                <div class="crearServ-derec">
                    <div class="crearServ-campJ">
                        <input type="number" placeholder="Valor (€)" name="valor" required>
                        <select name="diaServicio" required>
                            <option value="">Día Servicio</option>
                            <option value="Lunes">Lunes</option>
                            <option value="Martes">Martes</option>
                            <option value="Miércoles">Miércoles</option>
                            <option value="Jueves">Jueves</option>
                            <option value="Viernes">Viernes</option>
                            <option value="Sábado">Sábado</option>
                            <option value="Domingo">Domingo</option>
                        </select>
                    </div>
                    <select name="tipoServicio" required>
                        <option value="">Tipo Servicio</option>
                        <option value="Cuidado de mayores - Puntual">Cuidado de mayores - Puntual</option>
                        <option value="Cuidado de mayores - Semanal">Cuidado de mayores - Semanal</option>
                        <option value="Cuidado de niños - Puntual">Cuidado de niños - Puntual</option>
                        <option value="Cuidado de niños - Semanal">Cuidado de niños - Semanal</option>
                        <option value="Limpieza - Puntual">Limpieza - Puntual</option>
                        <option value="Limpieza - Semanal">Limpieza - Semanal</option>
                    </select>
                    <input type="text" placeholder="Mi dirección" name="miDireccion" value="<?php echo htmlspecialchars($direccion); ?>">
                    <select name="miProvincia">
                        <option value="<?php echo htmlspecialchars($provincia); ?>"><?php echo htmlspecialchars($provincia); ?></option>
                    </select>
                    <select name="miCiudad">
                        <option value="<?php echo htmlspecialchars($ciudad); ?>"><?php echo htmlspecialchars($ciudad); ?></option>
                    </select>
                </div>
            </div>
            <div class="crearServ-bot">
                <input type="submit" value="Crear Servicio">
            </div>
        </form>
        <?php endif; ?>
    </div>

    <!-- Caja de confirmación -->
    <?php if ($mostrarCard): ?>
        <div id="cajaid" class="cajaAviso">
            <div id="avisoGeneral" class="avisoContenido">
                <p>Servicio creado correctamente. ¿Ir a "Mis Servicios"?</p>
                <button onclick="window.location.href='Miarea.php'">Sí</button>
                <button onclick="window.location.href='area_clientes.php'">No</button>
            </div>
        </div>
    <?php endif; ?>

    <?php include_once './assets/footer.php'; ?>
</body>
</html>
