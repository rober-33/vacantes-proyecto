<?php include("conexion.php"); ?>
<?php
$id = $_GET['id'];
$sql = "SELECT * FROM vacantes WHERE id = $id";
$v = $conexion->query($sql)->fetch_assoc();
?>

<!DOCTYPE html>
<html>
<head><meta charset="utf-8"><title>Postulación</title></head>
<body>
  <h2>Postúlate para: <?= $v['categoria'] ?></h2>
  <form action="enviar_postulacion.php" method="POST">
    <input type="hidden" name="vacante_id" value="<?= $v['id'] ?>">
    Nombre:<br><input type="text" name="nombre" required><br>
    Email:<br><input type="email" name="email" required><br>
    Mensaje:<br><textarea name="mensaje" required></textarea><br>
    <button type="submit">Enviar</button>
  </form>
</body>
</html>