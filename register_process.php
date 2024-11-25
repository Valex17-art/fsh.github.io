<?php
// Iniciar sesión para manejar mensajes de error o éxito
session_start();

// Conexión a la base de datos
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "feel_safe_home"; // Reemplaza con el nombre de tu base de datos

$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
    die("Error en la conexión: " . $conn->connect_error);
}

// Procesar datos enviados desde el formulario
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $user = $_POST['username'];
    $pass = $_POST['password'];

    // Validación básica
    if (empty($user) || empty($pass)) {
        echo "Por favor, completa todos los campos.";
        exit();
    }

    // Consulta para verificar si el usuario ya existe
    $sql_check = "SELECT id FROM users WHERE username = '$user'";
    $result = $conn->query($sql_check);

    if ($result->num_rows > 0) {
        echo "El usuario ya existe. Por favor, elige otro nombre de usuario.";
        exit();
    }

    // Inserción del nuevo usuario en la base de datos
    $sql_insert = "INSERT INTO users (username, password) VALUES ('$user', '$pass')";

    if ($conn->query($sql_insert) === TRUE) {
        echo "Registro exitoso. Ahora puedes iniciar sesión.";
        header("Location: login.html"); // Redirigir a la página de login
        exit();
    } else {
        echo "Error al registrar el usuario: " . $conn->error;
    }
}

$conn->close();
?>
