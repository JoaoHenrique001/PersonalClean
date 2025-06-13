<?php
$servidor = "127.0.0.1";
$usuario = "root"; //u302052903_userBaby credencial en producción
$bbdd = "personalclean"; //u302052903_personalclean credencial en producción
$password = ""; //8VB/n*;qP;6 credencial en producción

try {
    $conexion = new PDO("mysql:host=$servidor;dbname=$bbdd", $usuario, $password);
    $conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo json_encode(['error' => 'Falló la conexión: ' . $e->getMessage()]);
    exit;
}
finally{
    //echo "conectado";
}

?>