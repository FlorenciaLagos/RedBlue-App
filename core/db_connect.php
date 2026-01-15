<?php
// core/db_connect.php

$host = "localhost";
$user = "root";       // Usuario por defecto de XAMPP
$pass = "";           // Contraseña por defecto de XAMPP (vacía)
$db   = "redblue_db"; // El nombre de la base de datos que creaste

// Crear conexión
$conn = new mysqli($host, $user, $pass, $db);

// Verificar si hay error
if ($conn->connect_error) {
    die("❌ Error de conexión: " . $conn->connect_error);
}
?>
