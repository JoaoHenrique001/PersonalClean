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
    $valorado = 0;

    // Insertar el nuevo servicio en la base de datos
    $sql = "INSERT INTO servicios (idCliente, fechaServicio, estado, titulo, descripcion, tipoServicio, valor, diaServicio, direccion, provincia, ciudad, valoradoPorCliente, valoradoPorFuncionario) 
            VALUES (:idCliente, :fechaServicio, :estado, :titulo, :descripcion, :tipoServicio, :valor, :diaServicio, :direccion, :provincia, :ciudad, :valoradoPorCliente,  :valoradoPorFuncionario)";
    
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
        ':valoradoPorCliente' =>  $valorado,
        ':valoradoPorFuncionario' => $valorado
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
    <nav style="--bs-breadcrumb-divider: url('data:image/svg+xml,%3Csvg xmlns=%27http://www.w3.org/2000/svg%27 width=%278%27 height=%278%27%3E%3Cpath d=%27M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z%27 fill=%27%236c757d%27/%3E%3C/svg%3E');" aria-label="breadcrumb">
        <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
            <li class="breadcrumb-item active" aria-current="page">
                <a href="index.php"><img src="./assets/images/house.svg" alt=""></a>
            </li>
            <li class="breadcrumb-item active"> <a href="<?php echo ($_SESSION['usuario']['tipo'] == 'funcionarios') ? 'area_funcionarios.php' : 'area_clientes.php'; ?>">Area Principal</a></li>
            <li class="breadcrumb-item">Crear Servicio</li>
        </ol>
    </nav>
    <!-- Fin migas de pan -->

    <div class="crearServ">
        <?php if (!$mostrarCard): ?>
        <form action="" method="POST">
            <div class="crearServ-campos">
                <div class="crearServ-izq">
                    <input type="text" placeholder="Título" name="titulo" id="tituloServ" required>
                    <textarea placeholder="Descripción" name="descripcion" id="descripcion" required></textarea>
                </div>
                <div class="crearServ-derec">
                    <div class="crearServ-campJ">
                        <input type="number" placeholder="Valor (€)" name="valor" id="valor" min="10" max="9999" required>
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
                        <option value="Cristales - Puntual">Cristales - Puntual</option>
                        <option value="Cristales - Semanal">Cristales - Semanal</option>
                        <option value="Cuidado de mascotas - Puntual">Cuidado de mascotas - Puntual</option>
                        <option value="Cuidado de mascotas - Semanal">Cuidado de mascotas - Semanal</option>
                        <option value="Desinfección - Puntual">Desinfección - Puntual</option>
                        <option value="Desinfección - Semanal">Desinfección - Semanal</option>
                        <option value="Jardinería - Puntual">Jardinería - Puntual</option>
                        <option value="Jardinería - Semanal">Jardinería - Semanal</option>
                        <option value="Lavandería - Puntual">Lavandería - Puntual</option>
                        <option value="Lavandería - Semanal">Lavandería - Semanal</option>
                        <option value="Limpieza - Puntual">Limpieza - Puntual</option>
                        <option value="Limpieza - Semanal">Limpieza - Semanal</option>
                        <option value="Limpieza de garaje - Puntual">Limpieza de garaje - Puntual</option>
                        <option value="Limpieza de garaje - Semanal">Limpieza de garaje - Semanal</option>
                        <option value="Limpieza post-obra - Puntual">Limpieza post-obra - Puntual</option>
                        <option value="Limpieza post-obra - Semanal">Limpieza post-obra - Semanal</option>
                        <option value="Limpieza profunda - Puntual">Limpieza profunda - Puntual</option>
                        <option value="Limpieza profunda - Semanal">Limpieza profunda - Semanal</option>
                        <option value="Organización - Puntual">Organización - Puntual</option>
                        <option value="Organización - Semanal">Organización - Semanal</option>
                        <option value="Plancha - Puntual">Plancha - Puntual</option>
                        <option value="Plancha - Semanal">Plancha - Semanal</option>
                        <option value="Recolección de basura - Puntual">Recolección de basura - Puntual</option>Add commentMore actions
                        <option value="Recolección de basura - Semanal">Recolección de basura - Semanal</option>
                        <option value="Tapicería - Puntual">Tapicería - Puntual</option>
                        <option value="Tapicería - Semanal">Tapicería - Semanal</option>
                        <option value="Ventanas - Puntual">Ventanas - Puntual</option>
                        <option value="Ventanas - Semanal">Ventanas - Semanal</option>
                    </select>
                    <input type="text" placeholder="Mi dirección" name="miDireccion" id="miDireccion" value="<?php echo htmlspecialchars($direccion); ?>">
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
