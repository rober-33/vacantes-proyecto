<?php include("conexion.php"); ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
  <title>Vacantes Disponibles</title>

  
 <style>
  body {
    font-family: 'Segoe UI', sans-serif;
    background-color: #f0f4ff;
    color: #003366;
    margin: 0;
  }

  header {
    background-color: #003366;
    color: white;
    padding: 20px;
    text-align: center;
  }

  .buscador-container {
    text-align: center;
    padding: 20px;
  }

  .buscador-container input {
    padding: 10px;
    width: 60%;
    border-radius: 8px;
    border: 2px solid #003366;
    font-size: 16px;
  }

  .tarjetas-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: center;
    gap: 20px;
    padding: 30px;
  }

  .tarjeta {
    background-color: white;
    border-radius: 12px;
    box-shadow: 0px 2px 8px rgba(0,0,0,0.1);
    width: 250px;
    padding: 20px;
    text-align: center;
    transition: transform 0.2s;
  }

  .tarjeta:hover {
    transform: translateY(-5px);
  }

  .tarjeta img {
    width: 80px;
    height: 80px;
  }

  .tarjeta h3 {
    margin: 10px 0 5px;
    font-size: 18px;
    color: #003366;
  }

  .tarjeta p {
    font-size: 14px;
    margin: 5px 0 10px;
  }

  .tarjeta a {
    text-decoration: none;
    color: white;
    background-color: #003366;
    padding: 8px 16px;
    border-radius: 6px;
    display: inline-block;
    margin-top: 10px;
  }

  .tarjeta a:hover {
    background-color: #0055aa;
  }

  @media (max-width: 600px) {
    .tarjeta {
      width: 90%;
    }

    .buscador-container input {
      width: 90%;
    }
  }
</style>
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