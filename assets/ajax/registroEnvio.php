<?php
header('Content-Type: application/json');
include './conexionBD.php';

$data = json_decode(file_get_contents("php://input"), true);

if (
    isset(
        $data['nombre'], 
        $data['apellidos'], 
        $data['email'], 
        $data['contraseña'], 
        $data['tipoUsuario'], 
        $data['telefono'], 
        $data['f_nacimiento'], 
        $data['provincia'], 
        $data['ciudad'], 
        $data['direccion'],
        $data['codigoPostal']
    )
) {
    $email = $data['email'];
    $tipo = $data['tipoUsuario'];

    try {
        // Verificar si el email existe en alguna tabla
        $tablas = ['clientes', 'funcionarios', 'administradores'];
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

        // Valor por defecto
        $notaMedia = 0;

        // Registrar CLIENTE
        if ($tipo === 'clientes') {
            $sql_insert = "INSERT INTO clientes (
                nombre, apellidos, email, contraseña, telefono, f_nacimiento,
                provincia, ciudad, direccion, notaMedia, codigoPostal
            ) VALUES (
                :nombre, :apellidos, :email, :contraseña, :telefono, :f_nacimiento,
                :provincia, :ciudad, :direccion, :notaMedia, :codigoPostal
            )";
            $stmt_insert = $conexion->prepare($sql_insert);
            $stmt_insert->bindParam(':nombre', $data['nombre']);
            $stmt_insert->bindParam(':apellidos', $data['apellidos']);
            $stmt_insert->bindParam(':email', $email);
            $stmt_insert->bindParam(':contraseña', $hashed_password);
            $stmt_insert->bindParam(':telefono', $data['telefono']);
            $stmt_insert->bindParam(':f_nacimiento', $data['f_nacimiento']);
            $stmt_insert->bindParam(':provincia', $data['provincia']);
            $stmt_insert->bindParam(':ciudad', $data['ciudad']);
            $stmt_insert->bindParam(':direccion', $data['direccion']);
            $stmt_insert->bindParam(':notaMedia', $notaMedia);
            $stmt_insert->bindParam(':codigoPostal', $data['codigoPostal']); // Este parámetro faltaba
        }

        // Registrar FUNCIONARIO
        elseif ($tipo === 'funcionarios') {
            $sql_insert = "INSERT INTO funcionarios (
                nombre, apellidos, email, contraseña, telefono, f_nacimiento,
                notaMedia, direccion, provincia, ciudad, codigoPostal
            ) VALUES (
                :nombre, :apellidos, :email, :contraseña, :telefono, :f_nacimiento,
                :notaMedia, :direccion, :provincia, :ciudad, :codigoPostal
            )";
            $stmt_insert = $conexion->prepare($sql_insert);
            $stmt_insert->bindParam(':nombre', $data['nombre']);
            $stmt_insert->bindParam(':apellidos', $data['apellidos']);
            $stmt_insert->bindParam(':email', $email);
            $stmt_insert->bindParam(':contraseña', $hashed_password);
            $stmt_insert->bindParam(':telefono', $data['telefono']);
            $stmt_insert->bindParam(':f_nacimiento', $data['f_nacimiento']);
            $stmt_insert->bindParam(':direccion', $data['direccion']);
            $stmt_insert->bindParam(':provincia', $data['provincia']);
            $stmt_insert->bindParam(':ciudad', $data['ciudad']);
            $stmt_insert->bindParam(':codigoPostal', $data['codigoPostal']);
            $stmt_insert->bindValue(':notaMedia', null, PDO::PARAM_NULL);
        }
        

        // Tipo inválido
        else {
            echo json_encode(["success" => false, "message" => "Tipo de usuario no válido."]);
            exit;
        }

        // Ejecutar y responder
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
