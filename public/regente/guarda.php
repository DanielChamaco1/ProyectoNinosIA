<?php

require './database.php';

$db = new Databasee();
$con = $db->conectar();

$correcto = true;

if (isset($_POST['id_regente'])) {

    $id_regente=$_POST['id_regente'];
    $nombres = $_POST['nombres'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $carnet = $_POST['carnet'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];
    $matricula = $_POST['matricula'];
    $contrasena1 = $_POST['contrasena'];
    $correo = $_POST['correo'];
    $nacimiento = $_POST['nacimiento'];
    $celular = $_POST['celular'];
    $extension = $_POST['extension'];
    $sexo = $_POST['sexo'];
    $estado = 1;
    $contrasena=md5($contrasena1);
    $query = $con->prepare("UPDATE regente SET id_regente=?, nombres=?, ap_paterno=?, ap_materno=?, carnet=?, edad=?, direccion=?, matricula=?, contrasena=?, correo=?, nacimiento=?, celular=?, estado=? extension=?, sexo=? WHERE id=?");
    $resultado = $query->execute(array($id_regente, $nombres, $ap_paterno, $ap_materno, $carnet, $edad, $direccion, $matricula, $contrasena, $correo, $nacimiento, $celular, $estado, $extension, $sexo));
    
    if ($resultado) {
        $correcto = true;
    }



} else {
    $nombres = $_POST['nombres'];
    $ap_paterno = $_POST['ap_paterno'];
    $ap_materno = $_POST['ap_materno'];
    $carnet = $_POST['carnet'];
    $edad = $_POST['edad'];
    $direccion = $_POST['direccion'];
    $matricula = $_POST['matricula'];
    $contrasena2 = $_POST['contrasena'];
    $correo = $_POST['correo'];
    $nacimiento = $_POST['nacimiento'];
    $celular = $_POST['celular'];
    $estado = 1;
    $extension = $_POST['extension'];
    $sexo = $_POST['sexo'];
    $contrasena=md5($contrasena2);
  
    
    $sql = "INSERT INTO regente (nombres, ap_paterno, ap_materno, carnet, edad, direccion, matricula, contrasena, 
    correo, nacimiento,  celular, estado, id_extension, id_sexo) 
        VALUES (:nombres, :ap_paterno, :ap_materno, :carnet, :edad, :direccion, :matricula, :contrasena, 
        :correo,:nacimiento,:celular, :estado, :extension, :sexo)";

        $stmt = $con->prepare($sql);
        $stmt->bindParam(':nombres', $nombres);
        $stmt->bindParam(':ap_paterno', $ap_paterno);
        $stmt->bindParam(':ap_materno', $ap_materno);
        $stmt->bindParam(':carnet', $carnet);
        $stmt->bindParam(':edad', $edad);
        $stmt->bindParam(':direccion', $direccion);
        $stmt->bindParam(':matricula', $matricula);
        $stmt->bindParam(':contrasena', $contrasena);
        $stmt->bindParam(':correo', $correo);
        $stmt->bindParam(':nacimiento', $nacimiento);
        $stmt->bindParam(':celular', $celular);
        $stmt->bindParam(':estado', $estado);
        $stmt->bindParam(':extension', $extension);
        $stmt->bindParam(':sexo', $sexo);
     
        $stmt->execute();
        $id_regente = $con->lastInsertId();


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