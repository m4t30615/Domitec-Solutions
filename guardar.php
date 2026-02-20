<?php

header('Content-Type: application/json; charset=utf-8');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "domitec_db";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    echo json_encode(["status" => "error", "message" => "Error de conexión con la base de datos."]);
    exit();
}

$nombre = $_POST['nombre'] ?? '';
$correo = $_POST['correo'] ?? '';
$mensaje = $_POST['mensaje'] ?? '';

if (empty($nombre) || empty($correo) || empty($mensaje)) {
    echo json_encode(["status" => "error", "message" => "Por favor completa todos los campos."]);
    exit();
}

$sql = "INSERT INTO contactos (nombre, correo, mensaje) VALUES ('$nombre', '$correo', '$mensaje')";

if ($conn->query($sql) === TRUE) {
    echo json_encode(["status" => "success", "message" => "Mensaje enviado con éxito. ¡Gracias por contactarnos!"]);
} else {
    echo json_encode(["status" => "error", "message" => "Error al guardar el mensaje."]);
}

$conn->close();
?>



