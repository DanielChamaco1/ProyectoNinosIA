<?php
require_once "./database.php";
$db = new Databasee();
$conn = $db->conectar();

$id = $_GET['id'];
$estado = 1;
$query = $conn->prepare("SELECT id_regente, nombres, ap_paterno, ap_materno, carnet, edad, direccion, matricula, contrasena, correo, nacimiento, celular, id_extension, id_sexo FROM regente WHERE id_regente=:id");

$query->execute(['id' => $id]);
$row = $query->fetch(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Regente</title>
    <link rel="stylesheet" href="public/css/bootstrap.min.css">
    <link rel="stylesheet" href="public/css/estilos.css">
    <script src="public/js/bootstrap.bundle.min.js"></script>

    <script>
        function calcularEdad() {
            var nacimiento = document.getElementById("nacimiento").value;
            var nacimientoObj = new Date(nacimiento);
            var hoy = new Date();
            var edad = hoy.getFullYear() - nacimientoObj.getFullYear();

            // Verificar si el cumpleaños ya ocurrió este año
            if (hoy.getMonth() < nacimientoObj.getMonth() || (hoy.getMonth() == nacimientoObj.getMonth() && hoy.getDate() < nacimientoObj.getDate())) {
                edad--;
            }

            document.getElementById("edad").textContent = edad;
            document.getElementById("Inputedad").value = edad;
        }
    </script>
</head>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4>Nuevo registro de regente</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form class="row g-3" method="POST" action="./actualizar.php" autocomplete="off">
                        <input type="hidden" id="id_regente" name="id_regente" value="<?php echo $row['id_regente']; ?>">
                        <div c lass="col-md-4">
                            <label for="name" class="form-label">Nombres del regente: </label>
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
                        <div class="col-md-6">
                            <label for="nacimiento" class="form-label">Fecha de Nacimiento: </label>
                            <input type="date" id="nacimiento" name="nacimiento" class="form-control" onchange="calcularEdad()" value="<?php echo $row['nacimiento']; ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label for="edad" class="form-label">Edad: </label>
                            <p class="form-control"><span id="edad"></span></p>
                            <input type="hidden" id="Inputedad" name="edad" placeholder="0" style="overflow:none" value="<?php echo $row['edad']; ?>">
                        </div>
                        <div class="col-md-4">
                            <label for="matricula" class="form-label">Matricula</label>
                            <input type="text" id="matricula" name="matricula" class="form-control" value="<?php echo $row['matricula']; ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="text" id="contrasena" name="contrasena" class="form-control" value="<?php echo $row['contrasena']; ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label for="correo" class="form-label">Correo electronico</label>
                            <input type="text" id="correo" name="correo" class="form-control" value="<?php echo $row['correo']; ?>" required>
                        </div>

                        <div class="col-md-4">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" id="celular" name="celular" class="form-control" value="<?php echo $row['celular']; ?>" required>
                        </div>
                        <div class="col-md-12">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" value="<?php echo $row['direccion']; ?>" required>
                        </div>
                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="../index2.php">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="registro">Actualiar Registro</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>

</html>