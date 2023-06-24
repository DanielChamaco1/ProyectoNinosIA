<?php
require_once "./database.php";
$db = new Databasee();
$con = $db->conectar();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id_regente = $_POST['id_regente'];
    $nombres = $_POST['nombres'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $carnet = $_POST['carnet'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];
    $matricula = $_POST['matricula'];
    $contrasena = $_POST['contrasena'];
    $correo = $_POST['correo'];
    $nacimiento = $_POST['nacimiento'];
    $celular = $_POST['celular'];
    $estado = 1;
    $extension = $_POST['extension'];
    $sexo = $_POST['sexo'];

    $query = $con->prepare("UPDATE regente SET nombres = :nombres, ap_paterno = :ap_paterno, ap_materno = :ap_materno, carnet = :carnet, edad = :edad, direccion = :direccion, matricula = :matricula, contrasena = :contrasena, correo = :correo, nacimiento = :nacimiento, celular = :celular, estado = :estado, id_extension = :extension, id_sexo = :sexo WHERE id_regente = :id");
    
    $query->bindParam(':nombres', $nombres);
    $query->bindParam(':ap_paterno', $ap_paterno);
    $query->bindParam(':ap_materno', $ap_materno);
    $query->bindParam(':carnet', $carnet);
    $query->bindParam(':edad', $edad);
    $query->bindParam(':direccion', $direccion);
    $query->bindParam(':matricula', $matricula);
    $query->bindParam(':contrasena', $contrasena);
    $query->bindParam(':correo', $correo);
    $query->bindParam(':nacimiento', $nacimiento);
    $query->bindParam(':celular', $celular);
    $query->bindParam(':estado', $estado);
    $query->bindParam(':extension', $extension);
    $query->bindParam(':sexo', $sexo);
    $query->bindParam(':id', $id_regente);

    if ($query->execute()) {
        // La actualización se realizó exitosamente
        $correcto=true;
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
