<?php
// Iniciar sesión para tener acceso a los datos de sesión
session_start();

// Destruir la sesión actual
session_unset(); // Limpia todas las variables de sesión
session_destroy(); // Destruye la sesión

// Redirigir a la página principal o de inicio de sesión
header("Location: index.html");
exit();
?>
