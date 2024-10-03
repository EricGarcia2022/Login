<?php
// index.php - Archivo principal

require 'auth.php';

// Verificar si se recibió una solicitud POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $action = $_POST['action'];
    $username = $_POST['username'];
    $password = $_POST['password'];

    if ($action === 'register') {
        // Registrar usuario
        if (registerUser($username, $password)) {
            echo "Usuario registrado con éxito.";
        } else {
            echo "Error al registrar el usuario.";
        }
    } elseif ($action === 'login') {
        // Iniciar sesión
        echo loginUser($username, $password);
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>API de Autenticación</title>
</head>
<body>
    <h1>Registro e Inicio de Sesión</h1>
    <form method="POST">
        <input type="text" name="username" placeholder="Usuario" required>
        <input type="password" name="password" placeholder="Contraseña" required>
        <button type="submit" name="action" value="register">Registrar</button>
        <button type="submit" name="action" value="login">Iniciar Sesión</button>
    </form>
</body>
</html>
