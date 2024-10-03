<?php
// auth.php - Manejo de autenticación

require 'db.php';

// Función para registrar un nuevo usuario
function registerUser($username, $password) {
    global $pdo;

    // Hash de la contraseña
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    $stmt = $pdo->prepare("INSERT INTO users (username, password) VALUES (?, ?)");
    return $stmt->execute([$username, $hashedPassword]);
}

// Función para iniciar sesión
function loginUser($username, $password) {
    global $pdo;

    $stmt = $pdo->prepare("SELECT * FROM users WHERE username = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);

    // Verificar si el usuario existe y si la contraseña es correcta
    if ($user && password_verify($password, $user['password'])) {
        return "Autenticación satisfactoria";
    } else {
        return "Error en la autenticación";
    }
}
?>
