<?php


$host = 'localhost'; // o tu servidor de base de datos
$dbname = 'tienda';
$username = 'root';  // Cambia por tu usuario de MySQL
$password = '';      // Cambia por tu contraseña de MySQL

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    // Configuración de errores
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    //echo "Conexión exitosa";
} catch (PDOException $e) {
    echo "Error de conexión: " . $e->getMessage();
    die();
}
?>
