<?php

header('Content-Type: application/json');

include './conexionBD.php';

$data = json_decode(file_get_contents("php://input"), true);

if (isset(
    $data['nombre'], 
    $data['apellidos'], 
    $data['email'], 
    $data['contraseña'], 
    $data['tipoUsuario'], 
    $data['telefono'], 
    $data['fnacimiento'], 
    $data['provincia'], 
    $data['ciudad'], 
    $data['codigoPostal'], 
    $data['direccion']
)) {
    $email = $data['email'];
    $tipo = strtoupper($data['tipoUsuario']); // convertir a mayúsculas por seguridad

    try {
        // Verificar si el email existe en alguna tabla
        $tablas = ['CLIENTE', 'FUNCIONARIO', 'ADMINISTRADOR'];
        foreach ($tablas as $tabla) {
            $sql_check = "SELECT email FROM $tabla WHERE email = :email";
            $stmt_check = $conexion->prepare($sql_check);
            $stmt_check->bindParam(':email', $email);
            $stmt_check->execute();
            if ($stmt_check->fetch(PDO::FETCH_ASSOC)) {
                echo json_encode(["success" => false, "message" => "El correo ya está registrado."]);
                exit;
            }
        }

        // Hashear contraseña
        $hashed_password = password_hash($data['contraseña'], PASSWORD_DEFAULT);
        
        //verificar los campos
        if ($tipo === 'CLIENTE') {
            $sql_insert = "INSERT INTO CLIENTE (nombre, apellidos, email, clave, telefono, fnacimiento, provincia, ciudad, codigoPostal, direccion)
                           VALUES (:nombre, :apellidos, :email, :clave, :telefono, :fnacimiento, :provincia, :ciudad, :codigoPostal, :direccion)";
        } elseif ($tipo === 'FUNCIONARIO') {
            $sql_insert = "INSERT INTO FUNCIONARIO (nombre, apellidos, email, clave, telefono, fnacimiento, provincia, ciudad, codigoPostal, direccion)
                           VALUES (:nombre, :apellidos, :email, :clave, :telefono, :fnacimiento, :provincia, :ciudad, :codigoPostal, :direccion)";
        } else {
            echo json_encode(["success" => false, "message" => "Tipo de usuario no válido."]);
            exit;
        }

        $stmt_insert = $conexion->prepare($sql_insert);
        $stmt_insert->bindParam(':nombre', $data['nombre']);
        $stmt_insert->bindParam(':apellidos', $data['apellidos']);
        $stmt_insert->bindParam(':email', $email);
        $stmt_insert->bindParam(':clave', $hashed_password);
        $stmt_insert->bindParam(':telefono', $data['telefono']);
        $stmt_insert->bindParam(':fnacimiento', $data['fnacimiento']);
        $stmt_insert->bindParam(':provincia', $data['provincia']);
        $stmt_insert->bindParam(':ciudad', $data['ciudad']);
        $stmt_insert->bindParam(':codigoPostal', $data['codigoPostal']);
        $stmt_insert->bindParam(':direccion', $data['direccion']);

        if ($stmt_insert->execute()) {
            echo json_encode(["success" => true, "message" => "Usuario registrado como $tipo correctamente."]);
        } else {
            echo json_encode(["success" => false, "message" => "Error al registrar usuario en $tipo."]);
        }

    } catch (PDOException $e) {
        echo json_encode(["success" => false, "message" => "Error: " . $e->getMessage()]);
    }

} else {
    echo json_encode(["success" => false, "message" => "Faltan datos en la solicitud."]);
}

$conexion = null;
?>
