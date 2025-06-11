<?php
session_start();
include './assets/ajax/conexionBD.php';

// Verifica que el usuario esté logueado y tenga definido su tipo
if (!isset($_SESSION['usuario']) || !isset($_SESSION['usuario']['tipo'])) {
    header("Location: login.php");
    exit;
}

$usuarioLogueado = $_SESSION['usuario']['email'];
$tipoUsuario     = $_SESSION['usuario']['tipo'];

// Solo aceptamos que el tipo sea 'clientes' o 'funcionarios'
$tabla = ($tipoUsuario === 'clientes' || $tipoUsuario === 'funcionarios') ? $tipoUsuario : null;

if (!$tabla) {
    echo "Tipo de usuario inválido.";
    exit;
}

// Consulta para obtener los datos del usuario
if($_SESSION['usuario']['tipo'] == "funcionarios"){
$stmt = $conexion->prepare("
    SELECT nombre, apellidos, email, contraseña, telefono, f_nacimiento,
           direccion, provincia, ciudad, codigoPostal, descripcion
    FROM $tabla
    WHERE email = :email
");}else{
    $stmt = $conexion->prepare("
    SELECT nombre, apellidos, email, contraseña, telefono, f_nacimiento,
           direccion, provincia, ciudad, codigoPostal
    FROM $tabla
    WHERE email = :email
");
}
$stmt->execute([':email' => $usuarioLogueado]);
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if (!$usuario) {
    echo "Usuario no encontrado.";
    exit;
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Mapeo de campos comunes recibidos desde el formulario
    $datos = [
        'nombre'       => $_POST['nombre'] ?? '',
        'apellidos'    => $_POST['apellido'] ?? '',
        'email'        => $_POST['email'] ?? '',
        'contrasena'   => $_POST['contraseña'] ?? '',
        'telefono'     => $_POST['telefono'] ?? '',
        'f_nacimiento' => $_POST['fnacimiento'] ?? '',
        'direccion'    => $_POST['direccion'] ?? '',
        'provincia'    => $_POST['provincia'] ?? '',
        'ciudad'       => $_POST['ciudad'] ?? '',
        'codigoPostal' => $_POST['codigo_postal'] ?? ''
    ];

    // Según el tipo de usuario se arma la query UPDATE y se definen los parámetros
    if ($tipoUsuario === 'funcionarios') {
        // Incluimos el campo descripción
        $datos['descripcion'] = $_POST['descripcion'] ?? '';
        $stmtUpdate = $conexion->prepare("
            UPDATE funcionarios SET
                nombre       = :nombre,
                apellidos    = :apellidos,
                email        = :email,
                contraseña   = :contrasena,
                telefono     = :telefono,
                f_nacimiento = :f_nacimiento,
                direccion    = :direccion,
                provincia    = :provincia,
                ciudad       = :ciudad,
                codigoPostal = :codigoPostal,
                descripcion  = :descripcion
            WHERE email = :emailLogged
        ");

        $params = [
            ':nombre'       => $datos['nombre'],
            ':apellidos'    => $datos['apellidos'],
            ':email'        => $datos['email'],
            ':contrasena'   => $datos['contrasena'],
            ':telefono'     => $datos['telefono'],
            ':f_nacimiento' => $datos['f_nacimiento'],
            ':direccion'    => $datos['direccion'],
            ':provincia'    => $datos['provincia'],
            ':ciudad'       => $datos['ciudad'],
            ':codigoPostal' => $datos['codigoPostal'],
            ':descripcion'  => $datos['descripcion'],
            ':emailLogged'  => $usuarioLogueado  // Se usa el email actual para identificar el registro
        ];
    } else if ($tipoUsuario === 'clientes') {
        // Para "clientes" no se actualiza el campo descripción
        $stmtUpdate = $conexion->prepare("
            UPDATE clientes SET
                nombre       = :nombre,
                apellidos    = :apellidos,
                email        = :email,
                contraseña   = :contrasena,
                telefono     = :telefono,
                f_nacimiento = :f_nacimiento,
                direccion    = :direccion,
                provincia    = :provincia,
                ciudad       = :ciudad,
                codigoPostal = :codigoPostal
            WHERE email = :emailLogged
        ");

        $params = [
            ':nombre'       => $datos['nombre'],
            ':apellidos'    => $datos['apellidos'],
            ':email'        => $datos['email'],
            ':contrasena'   => $datos['contrasena'],
            ':telefono'     => $datos['telefono'],
            ':f_nacimiento' => $datos['f_nacimiento'],
            ':direccion'    => $datos['direccion'],
            ':provincia'    => $datos['provincia'],
            ':ciudad'       => $datos['ciudad'],
            ':codigoPostal' => $datos['codigoPostal'],
            ':emailLogged'  => $usuarioLogueado
        ];
    }

    // Ejecuta la actualización y actualiza la variable de sesión con el nuevo nombre y email
    $stmtUpdate->execute($params);
    $_SESSION['usuario']['nombre'] = $datos['nombre'];
    $_SESSION['usuario']['email']  = $datos['email'];

    echo "<div id='cajaid' class='cajaAviso'><div id='avisoGeneral' class='avisoContenido'><p>Datos actualizados correctamente.</p><button id='ok'>OK</button></div></div>";
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Perfil | Personal Clean</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://unpkg.com/aos@2.3.1/dist/aos.css" rel="stylesheet" />
    <script src="https://kit.fontawesome.com/998c60ef77.js" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="./assets/estilos.css" />
    <script src="./assets/js/modoOscuro.js"></script>
    <script src="./assets/js/edit.js"></script>
    <script src="./assets/js/cajaAviso.js"></script>
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico" />
</head>
<body>
   <?php include_once './assets/headerLogueado.php'; ?>

   <nav style="--bs-breadcrumb-divider: url('data:image/svg+xml;utf8,<svg xmlns=\'http://www.w3.org/2000/svg\' width=\'8\' height=\'8\'><path d=\'M2.5 0L1 1.5 3.5 4 1 6.5 2.5 8l4-4-4-4z\' fill=\'%236c757d\'/></svg>');" aria-label="breadcrumb">
      <ol class="breadcrumb" style="--bs-breadcrumb-margin-bottom: 0rem;">
         <li class="breadcrumb-item active" aria-current="page"><a href="index.php"><img src="./assets/images/house.svg" alt="" /></a></li>
         <li class="breadcrumb-item"><?php echo htmlspecialchars($usuario['nombre']); ?></li>
         <li class="breadcrumb-item">Edición Perfil</li>
      </ol>
   </nav>

   <div class="edicionArea">
      <form class="edicionForm" method="POST">
         <div class="apartado1 campos">
            <img src="./assets/images/userIcon.svg" alt="" />
            <button type="button">Cambiar</button>

            <label class="labeledit" for="nombre">Nombre:</label>
            <input type="text" value="<?php echo htmlspecialchars($usuario['nombre']); ?>" 
                   name="nombre" class="campoedit" id="nombre" required />

            <label class="labeledit" for="apellido">Apellido:</label>
            <input type="text" value="<?php echo htmlspecialchars($usuario['apellidos']); ?>" 
                   name="apellido" class="campoedit" id="apellido" required />

            <label class="labeledit" for="email">Email:</label>
            <input type="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" 
                   name="email" class="campoedit" id="email" required />
         </div>

         <div class="apartado2 campos">
            <label class="labeledit" for="contraseña">Contraseña:</label>
            <input type="text" value="<?php echo htmlspecialchars($usuario['contraseña']); ?>" 
                   name="contraseña" class="campoedit" id="contraseña" required />

            <label class="labeledit" for="telefono">Teléfono:</label>
            <input type="text" value="<?php echo htmlspecialchars($usuario['telefono']); ?>" 
                   name="telefono" class="campoedit" id="telefono" required />

            <label class="labeledit" for="fnacimiento">Fecha nacimiento:</label>
            <input type="date" value="<?php echo htmlspecialchars($usuario['f_nacimiento']); ?>" 
                   name="fnacimiento" class="campoedit" required />

            <label class="labeledit" for="direccion">Dirección:</label>
            <input type="text" value="<?php echo htmlspecialchars($usuario['direccion']); ?>" 
                   name="direccion" class="campoedit" required />

            <label class="labeledit" for="provincia">Provincia:</label>
            <select name="provincia" class="campoedit" id="provincia" required>
               <option value="">Provincia</option>
               <option value="Madrid" <?php if ($usuario['provincia'] === 'Madrid') echo 'selected'; ?>>Madrid</option>
            </select>

            <label class="labeledit" for="ciudad">Ciudad:</label>
            <select name="ciudad" class="campoedit" id="ciudad" required>
               <option value="">Ciudad</option>
               <option value="<?php echo htmlspecialchars($usuario['ciudad']); ?>" selected>
                  <?php echo htmlspecialchars($usuario['ciudad']); ?>
               </option>
            </select>
         </div>

         <div class="apartado3 campos">
            <label class="labeledit" for="codigo_postal">Código Postal:</label>
            <input type="text" value="<?php echo htmlspecialchars($usuario['codigoPostal']); ?>" 
                   name="codigo_postal" class="campoedit" id="codigo_postal" required />

            <?php if ($tipoUsuario === 'funcionarios'): ?>
               <label class="labeledit" for="descripcion">Descripción:</label>
               <textarea name="descripcion" class="editDescripcion campoedit" id="descripcion">
                  <?php echo htmlspecialchars($usuario['descripcion']); ?>
               </textarea>
            <?php endif; ?>

            <input type="submit" value="Guardar" class="btn btn-primary mt-3" />
         </div>
      </form>
   </div>

   <?php include_once './assets/footer.php'; ?>
   <script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
   <script>AOS.init();</script>
</body>
</html>
