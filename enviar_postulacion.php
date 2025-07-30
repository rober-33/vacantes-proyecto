<?php include("conexion.php"); ?>
<?php
$vacante_id = $_POST['vacante_id'];
$nombre = $_POST['nombre'];
$email = $_POST['email'];
$mensaje = $_POST['mensaje'];

$sql = "INSERT INTO postulaciones (vacante_id, nombre, email, mensaje)
        VALUES ('$vacante_id', '$nombre', '$email', '$mensaje')";

if ($conexion->query($sql)) {
    echo "✅ Gracias por postularte. Pronto nos pondremos en contacto.";
} else {
    echo "❌ Error: " . $conexion->error;
}
?>