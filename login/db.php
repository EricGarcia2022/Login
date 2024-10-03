<?php
// db.php - Conexión a la base de datos

$host = 'localhost'; // Cambia esto si es necesario
$db = 'tu_base_de_datos';
$user = 'tu_usuario';
$pass = 'tu_contraseña';

try {
    // Crear conexión
    $pdo = new PDO("mysql:host=$host;dbname=$db", $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    // Manejo de errores de conexión
    echo "Error de conexión: " . $e->getMessage();
    exit();
}
?>
