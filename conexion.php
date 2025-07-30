<?php
$conexion = new mysqli("localhost", "root", "", "vacantes_db");

if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}
?>