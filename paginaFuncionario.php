<?php
include './assets/ajax/conexionBD.php';
session_start();

// Verificación de acceso (solo clientes)
if ($_SESSION['usuario']['tipo'] !== 'clientes') {
    header("Location: logout.php");
    exit;
}

// Verificar que se reciba el idFuncionarios por GET
if (!isset($_GET['idFuncionarios'])) {
    echo "No se especificó el funcionario.";
    exit;
}

$idFuncionario = (int)$_GET['idFuncionarios'];
$idCliente = $_SESSION['usuario']['idCliente']; // ID del cliente en sesión

// Obtener los datos del funcionario
$sqlFuncionario = "SELECT nombre, apellidos, email, telefono, f_nacimiento, notaMedia, direccion, provincia, ciudad, descripcion
                   FROM funcionarios WHERE idFuncionarios = :idFuncionario";
$stmtFuncionario = $conexion->prepare($sqlFuncionario);
$stmtFuncionario->bindValue(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
$stmtFuncionario->execute();
$funcionarioData = $stmtFuncionario->fetch(PDO::FETCH_ASSOC);

if (!$funcionarioData) {
    echo "Funcionario no encontrado.";
    exit;
}

// Función para calcular la edad a partir de la fecha de nacimiento
function calcularEdad($fechaNacimiento) {
    $fechaNacimiento = new DateTime($fechaNacimiento);
    $hoy = new DateTime();
    return $hoy->diff($fechaNacimiento)->y; // Diferencia en años
}

// Obtener la edad del funcionario
$edadFuncionario = calcularEdad($funcionarioData['f_nacimiento']);

// Ajustar la nota media (dividirla por 2)
$notaMediaAjustada = round($funcionarioData['notaMedia'] / 2, 2);

// Obtener los servicios del cliente que no tienen funcionario asignado
$sqlServicios = "SELECT idServicio, titulo FROM servicios WHERE idCliente = :idCliente AND idFuncionario IS NULL";
$stmtServicios = $conexion->prepare($sqlServicios);
$stmtServicios->bindValue(':idCliente', $idCliente, PDO::PARAM_INT);
$stmtServicios->execute();
$serviciosDisponibles = $stmtServicios->fetchAll(PDO::FETCH_ASSOC);

// Variable para controlar la visualización de la tarjeta emergente
$mostrarCard = false;

// Obtener las valoraciones del funcionario desde la tabla "valoraciones_clientes"
$sqlValoraciones = "SELECT estrellas, comentario FROM valoraciones_clientes WHERE idFuncionario = :idFuncionario";
$stmtValoraciones = $conexion->prepare($sqlValoraciones);
$stmtValoraciones->bindValue(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
$stmtValoraciones->execute();
$valoraciones = $stmtValoraciones->fetchAll(PDO::FETCH_ASSOC);

$hayValoraciones = count($valoraciones) > 0;
$promedioValoracion = 0;
$comentarioPrincipal = "";

if ($hayValoraciones) {
    $sumaEstrellas = 0;
    foreach ($valoraciones as $val) {
         $sumaEstrellas += $val['estrellas'];
    }
    $promedioValoracion = round($sumaEstrellas / count($valoraciones), 1);
    // Se toma el comentario del primer registro (puedes modificar para que se muestre el más reciente)
    $comentarioPrincipal = $valoraciones[0]['comentario'];
}
$mostrarCard = false;

// Procesamiento del formulario de contratación
if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['idServicioSeleccionado'])) {
    $idServicioSeleccionado = (int)$_POST['idServicioSeleccionado'];

    // Realizar el UPDATE en la tabla servicios
    $sqlUpdateServicio = "UPDATE servicios SET idFuncionario = :idFuncionario WHERE idServicio = :idServicioSeleccionado";
    $stmtUpdate = $conexion->prepare($sqlUpdateServicio);
    $stmtUpdate->bindValue(':idFuncionario', $idFuncionario, PDO::PARAM_INT);
    $stmtUpdate->bindValue(':idServicioSeleccionado', $idServicioSeleccionado, PDO::PARAM_INT);

    if ($stmtUpdate->execute()) {
        header("Location: Miarea.php"); // Redirigir a "Mi área"
        exit;
    } else {
        echo "Error al actualizar el servicio.";
    }
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Detalles del Funcionario | Personal Clean</title>
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
            <li class="breadcrumb-item">Pagina de contratación Funcionario</li>
        </ol>
    </nav>
    <!-- Fin migas de pan -->

    <div class="pTrabajo">
        <div class="CajaDetalle">
            <p><b>Nombre:</b> <?php echo htmlspecialchars($funcionarioData['nombre'] . " " . $funcionarioData['apellidos']); ?></p>
            <p><b>Email:</b> <?php echo htmlspecialchars($funcionarioData['email']); ?></p>
            <p><b>Teléfono:</b> <?php echo htmlspecialchars($funcionarioData['telefono']); ?></p>
            <p><b>Edad:</b> <?php echo htmlspecialchars($edadFuncionario); ?> años</p>
            <p><b>Valoración:</b> <?php echo htmlspecialchars($notaMediaAjustada); ?>/5</p>
            <p><b>Dirección:</b> <?php echo htmlspecialchars($funcionarioData['direccion']); ?></p>
            <p><b>Provincia:</b> <?php echo htmlspecialchars($funcionarioData['provincia']); ?></p>
            <p><b>Ciudad:</b> <?php echo htmlspecialchars($funcionarioData['ciudad']); ?></p>
            <p><b>Descripción:</b> <?php echo htmlspecialchars($funcionarioData['descripcion']); ?></p>
            <!-- Botón de contratación -->
            <button id="contratarBtn">Contratar</button>
        </div>

      <div class="valoraciones">
            <h2>Valoraciones de Clientes:</h2>
            <div class="espacioValoraciones">
                <?php if ($hayValoraciones): ?>
                    <?php foreach ($valoraciones as $val): 
                        // Calcular la cantidad de estrellas a mostrar: la mitad de la puntuación
                        // Por ejemplo, si $val['estrellas'] es 8, entonces fullStars = floor(8/2) = 4 y emptyStars = 5 - 4 = 1.
                        $fullStars = floor($val['estrellas'] / 2);
                        $emptyStars = 5 - $fullStars;
                    ?>
                        <div class="dataValoracion">
                            <div class="cantidadEstrellas">
                                <?php 
                                for ($i=0; $i < $fullStars; $i++) {
                                    echo '<img src="./assets/images/fullstar.svg" alt="Full Star">';
                                }
                                for ($j=0; $j < $emptyStars; $j++) {
                                    echo '<img src="./assets/images/hollowstar.svg" alt="Hollow Star">';
                                }
                                ?>
                            </div>
                            <p>
                                <b><?php echo htmlspecialchars(round($val['estrellas']/2,1)); ?></b> - 
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

    <!-- Caja de selección de servicio (visible solo después de hacer clic en "Contratar") -->
    <div id="cajaid" class="cajaAviso" style="display: none;">
        <div id="avisoGeneral" class="avisoContenido">
            <h2>Selecciona uno de sus servicio para asignar a este funcionario</h2>
            <form method="POST">
                <input type="hidden" name="idFuncionarioSeleccionado" value="<?php echo $idFuncionario; ?>">
                <select name="idServicioSeleccionado" id="idServicioSeleccionado" required>
                    <option value="">Elegir un servicio...</option>
                    <?php foreach ($serviciosDisponibles as $servicio): ?>
                        <option value="<?php echo $servicio['idServicio']; ?>">
                            <?php echo htmlspecialchars($servicio['titulo']); ?>
                        </option>
                    <?php endforeach; ?>
                </select>
                <br><br>
                <input type="submit" value="Asignar funcionario">
            </form>
            <button id="cerrarAviso">Cancelar</button>
        </div>
    </div>

    <script>
        document.getElementById("contratarBtn").addEventListener("click", function() {
            document.getElementById("cajaid").style.display = "block";
        });

        document.getElementById("cerrarAviso").addEventListener("click", function() {
            document.getElementById("cajaid").style.display = "none";
        });
    </script>

    <?php include_once './assets/footer.php'; ?>
</body>
</html>
