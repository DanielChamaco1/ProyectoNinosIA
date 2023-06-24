<?php
require '../config/database.php';

$db = new Database();
$conn = $db->getConnect();
$id = $_GET['id'];
$estado = 1;
$query = $conn->prepare("SELECT id_estudiante, nombres, ap_paterno, ap_materno, carnet, edad, direccion, nacimiento, alergias, id_sexo, id_extension, id_sangre, id_curso FROM estudiante WHERE id_estudiante=:id");

$query->execute(['id' => $id]);
$row = $query->fetch(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Estudiante</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>
    <script src="public/js/scrips.js"></script>
</head>

<body class="py-3" onload=" calcularEdad()">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4>Modificar registro de estudiante</h4>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <form class="row g-3" method="POST" action="actualizar.php" autocomplete="off">
                        <input type="hidden" id="id_estudiante" name="id_estudiante" value="<?php echo $row['id_estudiante']; ?>">
                        <div class="col-md-4">
                            <label for="nombres" class="form-label">Nombres del estudiante: </label>
                            <input type="text" id="nombres" name="nombres" class="form-control" value="<?php echo $row['nombres']; ?>" required autofocus>
                        </div>
                        <div class="col-md-4">
                            <label for="ap_paterno" class="form-label">Apellido Paterno: </label>
                            <input type="text" id="ap_paterno" name="ap_paterno" class="form-control" value="<?php echo $row['ap_paterno']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="ap_materno" class="form-label">Apellido Materno: </label>
                            <input type="text" id="ap_materno" name="ap_materno" class="form-control" value="<?php echo $row['ap_materno']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="carnet" class="form-label">Carnet de Identidad: </label>
                            <input type="text" id="carnet" name="carnet" class="form-control" value="<?php echo $row['carnet']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="extension" class="form-label">Extension del Carnet: </label>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "escuelaa");
                            $query_extension = mysqli_query($con, "SELECT * FROM extension WHERE (id_extension<10);");
                            mysqli_close($con);
                            $result_extension = mysqli_num_rows($query_extension);
                            ?>
                            <select name="extension" id="extension" class="form-control">
                                <?php
                                if ($result_extension > 0) {
                                    while ($extension = mysqli_fetch_array($query_extension)) {
                                        $selected = ($row['id_extension'] == $extension['id_extension']) ? 'selected' : '';
                                        echo '<option value="' . $extension['id_extension'] . '" ' . $selected . '>' . $extension['nombre_extension'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="sexo" class="form-label">Sexo: </label>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "escuelaa");
                            $query_sexo = mysqli_query($con, "SELECT * FROM sexo WHERE (id_sexo<3);");
                            mysqli_close($con);
                            $result_sexo = mysqli_num_rows($query_sexo);
                            ?>
                            <select name="sexo" id="sexo" class="form-control">
                                <?php
                                if ($result_sexo > 0) {
                                    while ($sexo = mysqli_fetch_array($query_sexo)) {
                                        $selected = ($row['id_sexo'] == $sexo['id_sexo']) ? 'selected' : '';
                                        echo '<option value="' . $sexo['id_sexo'] . '" ' . $selected . '>' . $sexo['nombre_sexo'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="nacimiento" class="form-label">Fecha de Nacimiento: </label>
                            <input type="date" id="nacimiento" name="nacimiento" class="form-control" onchange="calcularEdad()" value="<?php echo $row['nacimiento']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="edad" class="form-label">Edad: </label>
                            <p class="form-control"><span id="edad"></span></p>
                            <input type="hidden" id="Inputedad" name="edad" placeholder="0" style="overflow:none" value="<?php echo $row['edad']; ?>">
                        </div>
                        <div class="col-md-12">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $row['direccion']; ?>" required>
                        </div>
                        <div class="col-md-8">
                            <label for="alergias" class="form-label">Alergías: </label>
                            <input type="text" id="alergias" name="alergias" class="form-control" value="<?php echo $row['alergias']; ?>" required>
                        </div>
                        <div class="col-md-4">
                            <label for="sangre" class="form-label">Tipo de Sangre: </label>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "escuelaa");
                            $query_sangre = mysqli_query($con, "SELECT * FROM sangre WHERE (id_sangre<9);");
                            mysqli_close($con);
                            $result_sangre = mysqli_num_rows($query_sangre);

                            ?>

                            <select name="sangre" id="sangre" class="form-control">
                                <option value=""> Seleccionar tipo de sangre </option>

                                <?php
                                if ($result_sangre > 0) {
                                    while ($sangre = mysqli_fetch_array($query_sangre)) {

                                        $selected = ($row['id_sangre'] == $sangre['id_sangre']) ? 'selected' : '';
                                        echo '<option value="' . $sangre['id_sangre'] . '" ' . $selected . '>' . $sangre['nombre_sangre'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <h5>Elección de Cursos</h5>
                        <div class="col-md-4">
                            <select id="curso" name="curso" class="form-control" onchange="mostrarSegundoSelect()">
                                <option value=""> Seleccionar curso </option>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "escuelaa");
                                $query_curso = mysqli_query($con, "SELECT * FROM curso WHERE (id_curso<10);");
                                mysqli_close($con);
                                $result_curso = mysqli_num_rows($query_curso);
                                if ($result_curso > 0) {
                                    while ($curso = mysqli_fetch_array($query_curso)) {
                                        $selected = ($row['id_curso'] == $curso['id_curso']) ? 'selected' : '';
                                        echo '<option value="' . $curso['id_curso'] . '" ' . $selected . '>' . $curso['nombre_curso'] . '</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="../index3.php">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="registro">Actualiar Registro</button>
                        </div>

                    </form>
                </div>
            </div>
        </div>
    </main>

</body>

</html>