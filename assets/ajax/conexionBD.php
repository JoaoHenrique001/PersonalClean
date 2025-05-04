<?php
$servidor = "127.0.0.1";
$usuario = "root";
$bbdd = "personalclean";
$password = "";

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$bbdd", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // conexión correcta
} catch (PDOException $e) {
    echo json_encode(['error' => 'Falló la conexión: ' . $e->getMessage()]);
    exit;
}
finally{
    echo "bien";
}

?>