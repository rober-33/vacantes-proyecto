<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Vacantes Disponibles</title>
  <style>
    /* Usa el estilo CSS anterior aquí o añade tu propio diseño */
  </style>
</head>
<body>
  <h1>Jagua_Vision360 - Vacantes Disponibles</h1>

  <input type="text" id="buscador" placeholder="Buscar..." onkeyup="filtrarTarjetas()">

  <div class="tarjetas-container" id="contenedorTarjetas">
    <?php
    $sql = "SELECT * FROM vacantes";
    $resultado = $conexion->query($sql);
    while ($fila = $resultado->fetch_assoc()) {
      echo "<div class='tarjeta'>";
      echo "<img src='" . $fila['imagen_url'] . "' width='100'><br>";
      echo "<h3>" . $fila['categoria'] . "</h3>";
      echo "<p>" . $fila['descripcion'] . "</p>";
      echo "<a href='postular.php?id=" . $fila['id'] . "'>Postularse</a>";
      echo "</div>";
    }
    ?>
  </div>

  <script>
    function filtrarTarjetas() {
      const input = document.getElementById("buscador").value.toLowerCase();
      const tarjetas = document.getElementsByClassName("tarjeta");
      for (let tarjeta of tarjetas) {
        const texto = tarjeta.innerText.toLowerCase();
        tarjeta.style.display = texto.includes(input) ? "block" : "none";
      }
    }
  </script>
</body>
</html>