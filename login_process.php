<?php
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feel_safe_home";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Procesar datos enviados desde el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Consulta para verificar credenciales
    $sql = "SELECT id FROM users WHERE username = '$user' AND password = '$pass'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $_SESSION['user_id'] = $user; // Inicia sesión
        header("Location: index.html"); // Redirige a la página principal
    } else {
        echo "Usuario o contraseña incorrectos.";
    }
}

$conn->close();
?>