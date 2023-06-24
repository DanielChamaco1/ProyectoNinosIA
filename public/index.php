<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Obtener los valores ingresados por el usuario
  $matricula = isset($_POST['matricula']) ? $_POST['matricula'] : '';
  $contrasena = isset($_POST['contrasena']) ? md5($_POST['contrasena']) : '';

  // Conectar a la base de datos (debes reemplazar los valores de host, nombre de usuario, contraseña y nombre de la base de datos)
  $conn = new mysqli('localhost', 'root', '', 'escuelaa');
  if ($conn->connect_error) {
    die('Error al conectar a la base de datos: ' . $conn->connect_error);
  }

  // Consultar la base de datos para verificar las credenciales
  $query = "SELECT * FROM regente WHERE matricula = '$matricula'";
  $result = $conn->query($query);

  if ($result && $result->num_rows == 1) {
    $row = $result->fetch_assoc();
    $storedPassword = $row['contrasena'];
    $idRol = $row['id_rol'];

    // Verificar la contraseña almacenada en la base de datos

    // Credenciales válidas
    $_SESSION['rol'] = $idRol;

    if ($idRol == 1) {
      // Redirigir a una página para el rol 1
      header('Location: index2.php');
      exit();
    } elseif ($idRol == 2) {
      // Redirigir a una página para el rol 2
      header('Location: index3.php');
      exit();
    } else {
      // Rol desconocido, mostrar un mensaje de error
      $error = 'Rol desconocido.';
    }
  } else {
    // Credenciales inválidas, mostrar un mensaje de error
    $error = 'Credenciales inválidas. Por favor, inténtalo de nuevo.';
  }

  // Cerrar la conexión a la base de datos
  $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="intro.css" />
  <link rel="shortcut icon" href=" data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAX1JREFUWEftlzFOw0AQRd8XBSXQ0cERoEGigpaOEyBuABwASCRKCjgBcAKuQUlFzRGSA6CPJjLWYpzYCXYwkqeyvJb37f8zu7OiY6GO8dADVTnSKzSXQrbXgWvgFIjnNmMEPAJDSfE8iW+W2b4DztqkKPn3vaTzaUBBurZkoJGkjWlAzgekVhPedulcRcv+L5DtFUkfi9rbmEK2j4ArYA94A24lPc0L1giQ7U3gHVgtAOxLevl6Z3sA5PYneTlMvvl9Dtk+AcrUuJF0WTZZCq6kUJpSqHNA81j2I60khZWTaESh7EfdSep0yZ0oe9vb2Vm3k8C9AnEeRfXlYfsQOCgkdXNVZjs6gIcZ+82dpItC6UfnkEdjVWb7GHiusflFKzFJ3Gwvag0o7NiqAZSf3JllYVuqUDNVlpZoDahdSZFXM6Oxsq+aqO54D1SlVF2F/qKFHUvKLxSdb/KDNEozNsG2m/1xdg0aTL0GVfm+jPFWbxaLLKAHqlKtV6hKoU9VPBU0hhMYvQAAAABJRU5ErkJggg==" type="image/x-icon" />

  <title>Reconocimiento</title>
  <!--  -->
</head>

<body>
  <section>
    <div class="leaves">
      <div class="set">
        <div><img src="./img/leaf_01.png" /></div>
        <div><img src="./img/leaf_02.png" /></div>
        <div><img src="./img/leaf_03.png" /></div>
        <div><img src="./img/leaf_04.png" /></div>
        <div><img src="./img/leaf_01.png" /></div>
        <div><img src="./img/leaf_02.png" /></div>
        <div><img src="./img/leaf_03.png" /></div>
        <div><img src="./img/leaf_04.png" /></div>
      </div>
    </div>
    <img src="./img/bg.jpg" class="bg" />
    <img src="./img/girl.png" class="girl" />
    <form method="POST" id="miFormu">
      <div class="login">
        <h2>Bienvenido</h2>
        <h3>Unidad Educativa <strong>"TOKIO"</strong></h3>
        <?php if (isset($error)) : ?>
          <div class="error-message"><?php echo $error; ?></div>
        <?php endif; ?>
        <div class="inputBox">
         
          <input type="text" placeholder="Usuario" name="matricula" id="matricula" required />
        </div>
        <div class="inputBox">
          <input type="password" placeholder="Contraseña" name="contrasena" required />
        </div>
        <div class="inputBox">
          <input type="submit" value="Ingreso" id="btn" />
        </div>
      </div>
    </form>
    <img src="./img/trees.png" class="trees" />
  </section>
</body>


</html>