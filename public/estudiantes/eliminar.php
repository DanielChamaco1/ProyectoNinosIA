<?php 
require 'config/database.php';
$db = new Database();
$conn = $db->getConnect();
if (isset($_POST['submit_btn'])) {
    $id_estudiante = $_POST['id_estudiante'];
    $estado = ($_POST['estado'] == 'on') ? 1 : 0;
  
    // Realiza la conexión a la base de datos y ejecuta la consulta de actualización
    // Aquí debes incluir tu código para conectarte a la base de datos y ejecutar la consulta de actualización
  
    // Por ejemplo, usando mysqli:
    $con = mysqli_connect("localhost", "root", "", "escuelaa");
    $query = mysqli_prepare($con, "UPDATE estudiante SET estado = ? WHERE id_estudiante = ?");
    mysqli_stmt_bind_param($query, 'ii', $estado, $id_estudiante);
    mysqli_stmt_execute($query);
  
    if (mysqli_stmt_affected_rows($query) > 0) {
      echo "El estado del estudiante se ha actualizado correctamente.";
    } else {
      echo "Error al actualizar el estado del estudiante.";
    }
  
    mysqli_stmt_close($query);
    mysqli_close($con);
  }
