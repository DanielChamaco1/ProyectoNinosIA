<?php
require '../config/database.php';

$db = new Database();
$conn = $db->getConnect();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_estudiante = $_POST['id_estudiante'];
    $nombres = $_POST['nombres'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $carnet = $_POST['carnet'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];
    $nacimiento = $_POST['nacimiento'];
    $alergias = $_POST['alergias'];
    $sexo = $_POST['sexo'];
    $extension = $_POST['extension'];
    $sangre = $_POST['sangre'];
    $curso = $_POST['curso'];

    $query = $conn->prepare("UPDATE estudiante SET nombres = :nombres, ap_paterno = :ap_paterno, ap_materno = :ap_materno, carnet = :carnet, edad = :edad, direccion = :direccion, nacimiento = :nacimiento, alergias = :alergias, id_sexo = :sexo, id_extension = :extension, id_sangre = :sangre, id_curso = :curso WHERE id_estudiante = :id");

    $query->bindParam(':nombres', $nombres);
    $query->bindParam(':ap_paterno', $ap_paterno);
    $query->bindParam(':ap_materno', $ap_materno);
    $query->bindParam(':carnet', $carnet);
    $query->bindParam(':edad', $edad);
    $query->bindParam(':direccion', $direccion);
    $query->bindParam(':nacimiento', $nacimiento);
    $query->bindParam(':alergias', $alergias);
    $query->bindParam(':sexo', $sexo);
    $query->bindParam(':extension', $extension);
    $query->bindParam(':sangre', $sangre);
    $query->bindParam(':curso', $curso);
    $query->bindParam(':id', $id_estudiante);

    if ($query->execute()) {
        // La actualización se realizó exitosamente
        
        $correcto = true;
    } else {
        // Ocurrió un error al actualizar el registro
        echo "Error al guardar los cambios.";
        
    }
}

// Resto de tu código HTML y formularios
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
