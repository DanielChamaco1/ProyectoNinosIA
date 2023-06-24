<?php
// actuaestado.php

require './database.php';

$db = new Databasee();
$con = $db->conectar();
;

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_regente = $_POST['id_regente'];
    $estado = isset($_POST['estado']) ? 1 : 0; // Si el checkbox está marcado, el estado será 1; de lo contrario, será 0

    // Actualizar el estado del estudiante en la base de datos
    $query = $con->prepare("UPDATE regente SET estado = :estado WHERE id_regente = :id_regente");
    $query->bindParam(':estado', $estado);
    $query->bindParam(':id_regente', $id_regente);

    if ($query->execute()) {
        // La actualización se realizó exitosamente
        
        $correcto=true;
    } else {
        // Ocurrió un error al actualizar el estado
        echo "Error al actualizar el estado del estudiante.";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>

    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <?php if ($correcto) { ?>
                        <h3>Registro guardado</h3>
                    <?php } else { ?>
                        <h3>Error al guardar</h3>
                    <?php }  ?>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <a class="btn btn-primary" href="../index2.php">Regresar</a>
                </div>
            </div>
        </div>
    </main>

</body>

</html>