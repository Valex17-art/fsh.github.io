<?php
include '../config.php'; // Ajusta la ruta según la ubicación de config.php

$mensaje = ''; // Inicializa la variable mensaje

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $password = password_hash($_POST['password'], PASSWORD_BCRYPT);
    $address = $_POST['address'];

    $sql = "INSERT INTO usuarios (nombre, email, password, address) VALUES ('$nombre', '$email', '$password', '$address')";

    if ($conn->query($sql) === TRUE) {
        $mensaje = "<div class='success-message'>Registro exitoso</div>";
    } else {
        $mensaje = "<div class='error-message'>Error: " . $sql . "<br>" . $conn->error . "</div>";
    }
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuarios</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .form-container {
            max-width: 545px;
            width: 100%;
            background-color: white;
            border: 2px solid #333;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #333;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            color: #333;
        }
        input[type="text"], input[type="email"], input[type="password"] {
            width: 95%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin-top: 5px;
        }
        .form-group input[type="text"]:focus, .form-group input[type="email"]:focus, .form-group input[type="password"]:focus {
            border-color: #ff6600;
        }
        .submit-button {
            background-color: #ff6600;
            color: white;
            padding: 10px 20px;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }
        .submit-button:hover {
            background-color: #e65c00;
        }
        .success-message {
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
        .error-message {
            background-color: #f44336;
            color: white;
            padding: 10px;
            border-radius: 5px;
            margin-top: 10px;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Registro de Usuarios</h2>
        <form method="POST" action="">
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre" required>
            </div>
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <label for="password">Contraseña:</label>
                <input type="password" id="password" name="password" required>
            </div>
            <div class="form-group">
                <label for="address">Dirección:</label>
                <input type="text" id="address" name="address" required>
            </div>
            <button type="submit" class="submit-button">Registrar</button>
        </form>
        <div>
            <p>¿Ya tienes una cuenta?</p><a href="../login/login.php">Iniciar sesión</a>
        </div>

        <?php
        if (!empty($mensaje)) {
            echo $mensaje;
        }
        ?>
    </div>
</body>
</html>
