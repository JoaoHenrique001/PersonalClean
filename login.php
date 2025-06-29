<?php
session_start();
include './assets/ajax/conexionBD.php';
$errores = '';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $email = $_POST['email'] ?? '';
    $pass = $_POST['contraseña'] ?? '';

    $tablas = [
        'administradores' => 'area_administradores.php',
        'funcionarios' => 'area_funcionarios.php',
        'clientes' => 'area_clientes.php'
    ];

    foreach ($tablas as $tabla => $redirect) {
        $sql = "SELECT * FROM $tabla WHERE email = :email";
        $stmt = $conexion->prepare($sql);
        $stmt->bindParam(':email', $email);
        $stmt->execute();
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($user && $pass === $user['contraseña']) {

            if ($tabla == 'funcionarios') {
                $_SESSION['usuario'] = [
                    'idFuncionarios' => $user['idFuncionarios'],
                    'nombre' => $user['nombre'],
                    'email' => $user['email'],
                    'direccion' => $user['direccion'],
                    'provincia' => $user['provincia'],
                    'ciudad' => $user['ciudad'],
                    'tipo' => $tabla
                ];
            } else if ($tabla == 'clientes') {
                $_SESSION['usuario'] = [
                    'idCliente' => $user['idCliente'],
                    'nombre' => $user['nombre'],
                    'email' => $user['email'],
                    'direccion' => $user['direccion'],
                    'provincia' => $user['provincia'],
                    'ciudad' => $user['ciudad'],
                    'tipo' => $tabla
                ];
            } else {
                $_SESSION['usuario'] = [
                    'nombre' => $user['nombre'],
                    'tipo' => $tabla
                ];
            }

            header("Location: " . $redirect);
            exit;
        }
    }

    $errores = "Credenciales incorrectas.";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Login | Personal Clean</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
    <link rel="stylesheet" href="./assets/estilos.css">
    <script src="./assets/js/modoOscuro.js"></script>
    <link rel="icon" type="image/ico" href="./assets/images/logo.ico">
</head>

<body>
    <?php include './assets/switchModoClaroOscuro.php'; ?>

    <div class="cajaformEnter">
        <form method="POST" id="formLogin" class="formEnter">
            <a href="./index.php"><img src="./assets/images/logo.png" alt="logo" width="10" height="10"></a>

            <?php if ($errores): ?>
                <p style="color: red; text-align: center;"><?php echo $errores; ?></p>
            <?php endif; ?>

            <input type="text" name="email" placeholder="Email" required>
            <input type="password" name="contraseña" placeholder="Contraseña" required>

            <button type="submit">Iniciar Sesión</button>
            <p>¿No tienes cuenta? <a href="./registro.php">Registrarse</a></p>
        </form>
    </div>


    <?php
    include_once './assets/footer.php'
    ?>

</body>

</html>