<?php
// Obtener variables de entorno
$db_host = $_ENV['DB_HOST'] ?? "localhost";
$db_user = $_ENV['DB_USER'] ?? "root";
$db_password = $_ENV['DB_PASSWORD'] ?? "";
$db_name = $_ENV['DB_NAME'] ?? "usuarios1";

// Conectar a la base de datos
$conexion = new mysqli($db_host, $db_user, $db_password, $db_name);

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error en la conexión: " . $conexion->connect_error);
}

// Recuperar datos del formulario
$correo = $_POST['correo'] ?? '';
$contrasena = $_POST['contrasena'] ?? '';

// Insertar datos en la base de datos (sin hashing)
$sql = "INSERT INTO usuarios (correo, contrasena) VALUES ('$correo', '$contrasena')";

if ($conexion->query($sql) === TRUE) {
    echo "Registro exitoso";
} else {
    echo "Error al registrar: " . $conexion->error;
}

// Cerrar la conexión
$conexion->close();
?>
