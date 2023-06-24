<?php
require '../config/database.php';

$db = new Database();
$conn = $db->getConnect();
$estado = 1;
// Obtener los datos del formulario de estudiante y padre
$nombres = $_POST['nombres'];
$ap_paterno = $_POST['ap_paterno'];
$ap_materno = $_POST['ap_materno'];
$carnet = $_POST['carnet'];
$edad = $_POST['edad'];
$direccion = $_POST['direccion'];
$nacimiento = $_POST['nacimiento'];
$alergias = $_POST['alergias'];
$estado = 1;
$id_sexo = $_POST['sexo'];
$id_extension = $_POST['extension'];
$id_sangre = $_POST['sangre'];
$id_curso = $_POST['curso'];

$nombres_padres = $_POST['nombres_padres'];
$ape_paterno = $_POST['ape_paterno'];
$ape_materno = $_POST['ape_materno'];
$carnet_identidad = $_POST['carnet_identidad'];
$edad_padres = $_POST['edad_padres'];
$direccion_padres = $_POST['direccion_padres'];
$ocupacion = $_POST['ocupacion'];
$sexo_id = $_POST['sexo_id'];
$extension_id = $_POST['extension_id'];
$nacimiento_padres = $_POST['nacimiento_padres'];
$celular = $_POST['celular'];
$numero_referencia = $_POST['numero_referencia'];
$parentesco_id = $_POST['parentesco_id'];
$estado = 1;
$correo = $_POST['correo'];
$conn->exec('SET FOREIGN_KEY_CHECKS = 0');

$nombres_madres = $_POST['nombres_madres'];
$ape_paterno_madres = $_POST['ape_paterno_madres'];
$ape_materno_madres = $_POST['ape_materno_madres'];
$carnet_identidad_madres = $_POST['carnet_identidad_madres'];
$edad_madres = $_POST['edad_madres'];
$direccion_madres = $_POST['direccion_madres'];
$ocupacion_madres = $_POST['ocupacion_madres'];
$sexo_id_madres = $_POST['sexo_id_madres'];
$extension_id_madres = $_POST['extension_id_madres'];
$nacimiento_madres = $_POST['nacimiento_madres'];
$celular_madres = $_POST['celular_madres'];
$numero_referencia_madres = $_POST['numero_referencia_madres'];
$parentesco_id_madres = $_POST['parentesco_id_madres'];
$estado = 1;
$correo_madres = $_POST['correo_madres'];


// Insertar el estudiante en la tabla estudiante
$query_estudiante = $conn->prepare("INSERT INTO estudiante (nombres, ap_paterno, ap_materno, carnet, edad, direccion, nacimiento, alergias, estado, id_sexo, id_extension, id_sangre, id_curso) VALUES (:nombres, :ap_paterno, :ap_materno, :carnet, :edad, :direccion, :nacimiento, :alergias, :estado, :id_sexo, :id_extension, :id_sangre, :id_curso)");
$query_estudiante->bindParam(':nombres', $nombres);
$query_estudiante->bindParam(':ap_paterno', $ap_paterno);
$query_estudiante->bindParam(':ap_materno', $ap_materno);
$query_estudiante->bindParam(':carnet', $carnet);
$query_estudiante->bindParam(':edad', $edad);
$query_estudiante->bindParam(':direccion', $direccion);
$query_estudiante->bindParam(':nacimiento', $nacimiento);
$query_estudiante->bindParam(':alergias', $alergias);
$query_estudiante->bindParam(':estado', $estado);
$query_estudiante->bindParam(':id_sexo', $id_sexo);
$query_estudiante->bindParam(':id_extension', $id_extension);
$query_estudiante->bindParam(':id_sangre', $id_sangre);
$query_estudiante->bindParam(':id_curso', $id_curso);
$query_estudiante->execute();


// Obtener el ID del estudiante recién insertado
$id_estudiante = $conn->lastInsertId();

// Insertar los padres en la tabla familiar y la tabla de relación estudiante_familiar
// Insertar los padres en la tabla familiar y la tabla de relación estudiante_familiar
$query_padre = $conn->prepare("INSERT INTO familiar (nombres_padres, ape_paterno, ape_materno, carnet_identidad, edad_padres, direccion_padres, ocupacion, sexo_id, extension_id, nacimiento_padres, celular, numero_referencia, parentesco_id, estado, correo) VALUES (:nombres_padres, :ape_paterno, :ape_materno, :carnet_identidad, :edad_padres, :direccion_padres, :ocupacion, :sexo_id, :extension_id, :nacimiento_padres, :celular, :numero_referencia, :parentesco_id, :estado, :correo)");
$query_padre->bindValue(':nombres_padres', $nombres_padres);
$query_padre->bindValue(':ape_paterno', $ape_paterno);
$query_padre->bindValue(':ape_materno', $ape_materno);
$query_padre->bindValue(':carnet_identidad', $carnet_identidad);
$query_padre->bindValue(':edad_padres', $edad_padres);
$query_padre->bindValue(':direccion_padres', $direccion_padres);
$query_padre->bindValue(':ocupacion', $ocupacion);
$query_padre->bindValue(':sexo_id', $sexo_id);
$query_padre->bindValue(':extension_id', $extension_id);
$query_padre->bindValue(':nacimiento_padres', $nacimiento_padres);
$query_padre->bindValue(':celular', $celular);
$query_padre->bindValue(':numero_referencia', $numero_referencia);
$query_padre->bindValue(':parentesco_id', $parentesco_id);
$query_padre->bindValue(':estado', $estado);
$query_padre->bindValue(':correo', $correo);
$query_padre->execute();
$id_padre = $conn->lastInsertId();

$query_relacion_padre = $conn->prepare("INSERT INTO estudiante_familiar (id_estudiante, id_familiar) VALUES (:id_estudiante, :id_familiar)");
$query_relacion_padre->bindParam(':id_estudiante', $id_estudiante);
$query_relacion_padre->bindParam(':id_familiar', $id_padre);
$query_relacion_padre->execute();

// Insertar las madres en la tabla familiar y la tabla de relación estudiante_familiar
$query_madre = $conn->prepare("INSERT INTO familiar (nombres_padres, ape_paterno, ape_materno, carnet_identidad, edad_padres, direccion_padres, ocupacion, sexo_id, extension_id, nacimiento_padres, celular, numero_referencia, parentesco_id, estado, correo) VALUES (:nombres_madres, :ape_paterno_madres, :ape_materno_madres, :carnet_identidad_madres, :edad_madres, :direccion_padres, :ocupacion_madres, :sexo_id_madres, :extension_id_madres, :nacimiento_madres, :celular_madres, :numero_referencia_madres, :parentesco_id_madres, :estado, :correo_madres)");
$query_madre->bindParam(':nombres_madres', $nombres_madres);
$query_madre->bindParam(':ape_paterno_madres', $ape_paterno_madres);
$query_madre->bindParam(':ape_materno_madres', $ape_materno_madres);
$query_madre->bindParam(':carnet_identidad_madres', $carnet_identidad_madres);
$query_madre->bindParam(':edad_madres', $edad_madres);
$query_madre->bindParam(':direccion_padres', $direccion_padres);
$query_madre->bindParam(':ocupacion_madres', $ocupacion_madres);
$query_madre->bindParam(':sexo_id_madres', $sexo_id_madres);
$query_madre->bindParam(':extension_id_madres', $extension_id_madres);
$query_madre->bindParam(':nacimiento_madres', $nacimiento_madres);
$query_madre->bindParam(':celular_madres', $celular_madres);
$query_madre->bindParam(':numero_referencia_madres', $numero_referencia_madres);
$query_madre->bindParam(':parentesco_id_madres', $parentesco_id_madres);
$query_madre->bindParam(':estado', $estado);
$query_madre->bindParam(':correo_madres', $correo_madres);
$query_madre->execute();
$id_madre = $conn->lastInsertId();
if($query_madre->execute()){
  $correcto=true;
}
$query_relacion_madre = $conn->prepare("INSERT INTO estudiante_familiar (id_estudiante, id_familiar) VALUES (:id_estudiante, :id_familiar)");
$query_relacion_madre->bindParam(':id_estudiante', $id_estudiante);
$query_relacion_madre->bindParam(':id_familiar', $id_madre);
$query_relacion_madre->execute();

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




