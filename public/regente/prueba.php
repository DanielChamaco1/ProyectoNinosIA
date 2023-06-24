<!-- Este es un comentario en HTML 



                        
                        
                        
<div class="col-md-4">
                            <label for="matricula" class="form-label">Matricula</label>
                            <input type="text" id="matricula" name="matricula" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="text" id="contrasena" name="contrasena" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="correo" class="form-label">Correo electronico</label>
                            <input type="text" id="correo" name="correo" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" id="celular" name="celular" class="form-control" required>
                        </div>


























<!DOCTYPE html>
<html>
<head>
  <title>Formulario</title>
</head>
<body>
  <form action="procesar.php" method="POST">
    <label for="curso">Curso:</label>
    <select id="curso" name="curso">
      <?php
      // Conectarse a la base de datos y obtener los cursos disponibles
    //  $conexion = mysqli_connect("localhost", "root", "", "escuelaa");
    /*  if (!$conexion) {
        die("Error al conectar: " . mysqli_connect_error());
      }

      $query = "SELECT curso FROM curso";
      $resultado = mysqli_query($conexion, $query);

      if (!$resultado) {
        die("Error en la consulta: " . mysqli_error($conexion));
      }

      while ($fila = mysqli_fetch_assoc($resultado)) {
        echo '<option value="' . $fila['curso'] . '">' . $fila['curso'] . '</option>';
      }

      mysqli_close($conexion);
      ?>
    </select>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
      $curso = $_POST["curso"];

      if ($curso === "kinder") {
        // Conectarse a la base de datos y obtener los colores disponibles
        $conexion = mysqli_connect("servidor", "usuario", "contraseña", "basededatos");
        if (!$conexion) {
          die("Error al conectar: " . mysqli_connect_error());
        }

        $query = "SELECT color FROM colores";
        $resultado = mysqli_query($conexion, $query);

        if (!$resultado) {
          die("Error en la consulta: " . mysqli_error($conexion));
        }

        echo '<label for="color">Color:</label>';
        echo '<select id="color" name="color">';
        while ($fila = mysqli_fetch_assoc($resultado)) {
          echo '<option value="' . $fila['color'] . '">' . $fila['color'] . '</option>';
        }
        echo '</select>';

        mysqli_close($conexion);
      }
    }
    ?>

    <input type="submit" value="Guardar">
  </form>
</body>
</html>

-->