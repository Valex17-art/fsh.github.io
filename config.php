<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fsh";  // Nombre de la base de datos ajustado a 'fsh'

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
?>
