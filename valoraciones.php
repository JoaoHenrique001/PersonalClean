<?php
session_start();
include './assets/ajax/conexionBD.php';

if (!isset($_SESSION['usuario']) || empty($_SESSION['usuario']['tipo'])) {
    header("Location: logout.php");
    exit;
}

$tipoUsuario = $_SESSION['usuario']['tipo'];
$msg = "";

if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST["submit_rating"])) {
    $idServicio  = $_POST["idServicio"];
    $estrellas   = $_POST["estrellas"];
    $comentario  = $_POST["comentario"];
    
    $idPersona   = $_POST["idPersona"];
    
    if ($tipoUsuario === "clientes") {
        $idCliente = $_SESSION['usuario']['idCliente'];
        $sqlInsert = "INSERT INTO valoraciones_clientes (idCliente, estrellas, comentario, idFuncionario)
                      VALUES (:idCliente, :estrellas, :comentario, :idPersona)";
        $stmtInsert = $conexion->prepare($sqlInsert);
        $stmtInsert->bindValue(":idCliente", $idCliente, PDO::PARAM_INT);
        $stmtInsert->bindValue(":estrellas", $estrellas, PDO::PARAM_STR);
        $stmtInsert->bindValue(":comentario", $comentario, PDO::PARAM_STR);
        $stmtInsert->bindValue(":idPersona", $idPersona, PDO::PARAM_INT);
        if ($stmtInsert->execute()) {
            $sqlUpdate = "UPDATE servicios SET valoradoPorCliente = '1' WHERE idServicio = :idServicio";
            $stmtUpdate = $conexion->prepare($sqlUpdate);
            $stmtUpdate->bindValue(":idServicio", $idServicio, PDO::PARAM_INT);
            $stmtUpdate->execute();
            $msg = "¡Valoración registrada con éxito!";
        } else {
            $msg = "Error al registrar la valoración.";
        }
    } else if ($tipoUsuario === "funcionarios") {
        $idFuncionario = $_SESSION['usuario']['idFuncionarios'];
        $sqlInsert = "INSERT INTO valoraciones_servicios (idCliente, estrellas, comentario, idFuncionario)
                      VALUES (:idCliente, :estrellas, :comentario, :idFuncionario)";
        $stmtInsert = $conexion->prepare($sqlInsert);
        $stmtInsert->bindValue(":idCliente", $idPersona, PDO::PARAM_INT);
        $stmtInsert->bindValue(":estrellas", $estrellas, PDO::PARAM_STR);
        $stmtInsert->bindValue(":comentario", $comentario, PDO::PARAM_STR);
        $stmtInsert->bindValue(":idFuncionario", $idFuncionario, PDO::PARAM_INT);
        if ($stmtInsert->execute()) {
            $sqlUpdate = "UPDATE servicios SET valoradoPorFuncionario = '1' WHERE idServicio = :idServicio";
            $stmtUpdate = $conexion->prepare($sqlUpdate);
            $stmtUpdate->bindValue(":idServicio", $idServicio, PDO::PARAM_INT);
            $stmtUpdate->execute();
            $msg = "¡Valoración registrada con éxito!";
        } else {
            $msg = "Error al registrar la valoración.";
        }
    }
}

if ($tipoUsuario === "clientes") {
    $sql = "SELECT s.idServicio, s.titulo, s.fechaServicio,
                   f.idFuncionarios, f.nombre AS nombrePersona, f.apellidos AS apellidosPersona
            FROM servicios s
            INNER JOIN funcionarios f ON s.idFuncionario = f.idFuncionarios
            WHERE s.idCliente = :userid 
              AND s.fechaServicio <= CURDATE() 
              AND s.idFuncionario IS NOT NULL
              AND s.valoradoPorCliente = '0'";
    $stmt = $conexion->prepare($sql);
    $stmt->bindValue(":userid", $_SESSION['usuario']['idCliente'], PDO::PARAM_INT);
    $stmt->execute();
    $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
} else if ($tipoUsuario === "funcionarios") {
    $sql = "SELECT s.idServicio, s.titulo, s.fechaServicio,
                   c.idCliente, c.nombre AS nombrePersona, c.apellidos AS apellidosPersona
            FROM servicios s
            INNER JOIN clientes c ON s.idCliente = c.idCliente
            WHERE s.idFuncionario = :userid 
              AND s.fechaServicio <= CURDATE() 
              AND s.valoradoPorFuncionario = '0'";
    $stmt = $conexion->prepare($sql);
    $stmt->bindValue(":userid", $_SESSION['usuario']['idFuncionarios'], PDO::PARAM_INT);
    $stmt->execute();
    $servicios = $stmt->fetchAll(PDO::FETCH_ASSOC);
}
?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Valoraciones | Personal Clean</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
  <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
  <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="./assets/estilos.css" />
  <script src="./assets/js/modoOscuro.js"></script>
   <script src="./assets/js/valoracion.js"></script>
  <link rel="icon" type="image/ico" href="/assets/images/logo.ico">
</head>
<body>
  <?php include_once './assets/headerLogueado.php'; ?>

  <!-- Breadcrumb -->
  <nav style="--bs-breadcrumb-divider: url(&#34;data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='8' height='8'%3E%3Cpath d='M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z' fill='%236c757d'/%3E%3C/svg%3E&#34;);" aria-label="breadcrumb">
      <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
          <li class="breadcrumb-item active"><a href="index.php"><img src="./assets/images/house.svg" alt=""></a></li>
           <li class="breadcrumb-item active">
                <a href="<?php echo ($_SESSION['usuario']['tipo'] == 'funcionarios') ? 'area_funcionarios.php' : 'area_clientes.php'; ?>">Area Principal</a>
            </li>
          <li class="breadcrumb-item">Valoraciones</li>
      </ol>
  </nav>

  <div class="container my-4">
    <?php if(!empty($msg)) { ?>
      <div class="alert alert-info"><?php echo htmlspecialchars($msg); ?></div>
    <?php } ?>

    <h2 class="servicioDisponible">Servicios disponibles para valorar:</h2>
    <?php if(!empty($servicios)) { ?>
      <div class="listadoValoraciones">
        <?php foreach($servicios as $servicio) { ?>
          <!--cajita-->
          <div class="cajaValoración">
            <div class="row g-0">
              <div class="col-md-8">
                <div class="card-body">
                  <h5 class="card-title"><?php echo htmlspecialchars($servicio['titulo']); ?></h5>
                  <p class="card-text"><span class="fechaValoracion">Fecha: <?php echo htmlspecialchars($servicio['fechaServicio']); ?></span></p>
                  <p class="card-text">
                    <?php echo ($tipoUsuario === "clientes") ? "Funcionario:" : "Cliente:"; ?>
                    <strong><?php echo htmlspecialchars($servicio['nombrePersona'] . " " . $servicio['apellidosPersona']); ?></strong>
                  </p>
                  <!-- Button to open the rating popup -->
                  <button class="valoracionButon"
                    data-idservicio="<?php echo $servicio['idServicio']; ?>"
                    data-idpersona="<?php echo ($tipoUsuario === "clientes") ? $servicio['idFuncionarios'] : $servicio['idCliente']; ?>"
                    data-nombrepersona="<?php echo htmlspecialchars($servicio['nombrePersona'] . " " . $servicio['apellidosPersona']); ?>">
                    Valorar
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!--cajita-->
        <?php } ?>
      </div>
    <?php } else { ?>
      <div class="alert alert-secondary">No hay servicios disponibles para valorar.</div>
    <?php } ?>
  </div>

  <!-- Popup de valoración -->
  <div id="popupValoracion">
    <div class="popupContent">
      <form class="valorarfuncionario" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="POST">
        <!-- Hidden fields for service and person IDs -->
        <input type="hidden" name="idServicio" id="popup_idServicio" value="">
        <input type="hidden" name="idPersona" id="popup_idPersona" value="">
        <!-- We also send the client id if necessary, but note that for funcionarios,
             the idPersona will be the client to be rated -->
        <?php if ($tipoUsuario === "clientes") { ?>
            <input type="hidden" name="idCliente" value="<?php echo htmlspecialchars($_SESSION['usuario']['idCliente']); ?>">
        <?php } else { ?>
            <input type="hidden" name="idFuncionario" value="<?php echo htmlspecialchars($_SESSION['usuario']['idFuncionarios']); ?>">
        <?php } ?>
        <h3>Valorar a <span id="popup_nombrePersona">Nombre Persona</span></h3>
        <div class="mb-3">
          <label for="comentario" class="form-label">Comentario:</label>
          <textarea name="comentario" id="comentario" class="form-control" placeholder="Escribe tu comentario" required></textarea>
        </div>
        <div class="mb-3">
          <label for="estrellas" class="form-label">Nota:</label>
          <select name="estrellas" id="estrellas" class="form-select" required>
            <option value="">Seleccione</option>
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </div>
        <div class="d-flex justify-content-end">
          <button type="submit" id="popup_valorar" name="submit_rating">Valorar</button>
          <button type="button" id="popup_cancelar">Cancelar</button>
        </div>
      </form>
    </div>
  </div>

  <?php include_once './assets/footer.php'; ?>
  <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
  <script>AOS.init();</script>
</body>
</html>
