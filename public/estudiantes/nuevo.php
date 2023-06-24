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
    <script>
        function mostrarNuevoFormulario() {
            var formulario = document.getElementById("nuevoFormulario");
            if (formulario.style.display === "none") {
                formulario.style.display = "none";
            } else {
                formulario.style.display = "none";
            }
        }

        function mostrarOtroFormulario() {
            var formularioContainer = document.getElementById("otroFormulario");
            formularioContainer.style.display = "block";
            formularioContainer.scrollIntoView({
                behavior: 'smooth'
            });
        }
    </script>

</head>

<body class="py-3" onload="calcularEdad(); calcularEdadPadres(); calcularEdadPadresDos()">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col">
                    <h4>Nuevos registro de Estudiante</h4>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <form class="row g-3" method="POST" action="guarda.php" autocomplete="off">
                        <div class="col-md-4">
                            <label for="nombres" class="form-label">Nombres del estudiante: </label>
                            <input type="text" id="nombres" name="nombres" class="form-control" required autofocus>
                        </div>
                        <div class="col-md-4">
                            <label for="ap_paterno" class="form-label">Apellido Paterno: </label>
                            <input type="text" id="ap_paterno" name="ap_paterno" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="ap_materno" class="form-label">Apellido Materno: </label>
                            <input type="text" id="ap_materno" name="ap_materno" class="form-control" required>
                        </div>
                        <div class="col-md-4">
                            <label for="carnet" class="form-label">Carnet de Identidad: </label>
                            <input type="text" id="carnet" name="carnet" class="form-control" required>

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
                                ?>
                                        <option value="<?php echo $extension["id_extension"]; ?>"><?php echo $extension["nombre_extension"] ?></option>
                                <?php
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
                                ?>
                                        <option value="<?php echo $sexo["id_sexo"]; ?>"><?php echo $sexo["nombre_sexo"] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="nacimiento" class="form-label">Fecha de Nacimiento: </label>
                            <input type="date" id="nacimiento" name="nacimiento" class="form-control" onchange="calcularEdad()" required>
                        </div>
                        <div class="col-md-4">
                            <label for="edad" class="form-label">Edad: </label>
                            <p class="form-control"><span id="edad"></span></p>
                            <input type="hidden" id="Inputedad" name="edad" placeholder="0" style="overflow:none">
                        </div>
                        <div class="col-md-12">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" required>
                        </div>
                        <div class="col-md-8">
                            <label for="alergias" class="form-label">Alergías: </label>
                            <input type="text" id="alergias" name="alergias" class="form-control" required>
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
                                ?>
                                        <option value="<?php echo $sangre["id_sangre"]; ?>"><?php echo $sangre["nombre_sangre"] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <h5>Elección de Cursos</h5>
                        <div class="col-md-4">
                            <select id="curso" name="curso" class="form-control">
                                <option value=""> Seleccionar curso </option>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "escuelaa");
                                $query_curso = mysqli_query($con, "SELECT * FROM curso WHERE (id_curso<10);");
                                mysqli_close($con);
                                $result_curso = mysqli_num_rows($query_curso);
                                if ($result_curso > 0) {
                                    while ($curso = mysqli_fetch_array($query_curso)) {
                                ?>

                                        <option value="<?php echo $curso["id_curso"]; ?>"><?php echo $curso["nombre_curso"] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12">

                        </div>
                        <div class="row g-3" id="nuevoFormulario">

                            <div class="row">
                                <div class="col">
                                    <h4>Registro del Primer Apoderado</h4>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <label for="nombres_madres" class="form-label">Nombres del Tutor: </label>
                                <input type="text" id="nombres_madres" name="nombres_madres" class="form-control" required autofocus>
                            </div>
                            <div class="col-md-4">
                                <label for="ape_paterno_madres" class="form-label">Apellido Paterno del Tutor: </label>
                                <input type="text" id="ape_paterno_madres" name="ape_paterno_madres" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="ape_materno_madres" class="form-label">Apellido Materno del Tutor: </label>
                                <input type="text" id="ape_materno_madres" name="ape_materno_madres" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="carnet_identidad_madres" class="form-label">Carnet de Identidad del Tutor: </label>
                                <input type="text" id="carnet_identidad_madres" name="carnet_identidad_madres" class="form-control" required>

                            </div>
                            <div class="col-md-4">
                                <label for="extension_id_madres" class="form-label">Extension del Carnet del Tutor: </label>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "escuelaa");
                                $query_extension = mysqli_query($con, "SELECT * FROM extension WHERE (id_extension<10);");
                                mysqli_close($con);
                                $result_extension = mysqli_num_rows($query_extension);
                                ?>
                                <select name="extension_id_madres" id="extension_id_madres" class="form-control">
                                    <?php
                                    if ($result_extension > 0) {
                                        while ($extension = mysqli_fetch_array($query_extension)) {
                                    ?>
                                            <option value="<?php echo $extension["id_extension"]; ?>"><?php echo $extension["nombre_extension"] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="sexo_id_madres" class="form-label">Sexo del tutor </label>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "escuelaa");
                                $query_sexo = mysqli_query($con, "SELECT * FROM sexo WHERE (id_sexo<3);");
                                mysqli_close($con);
                                $result_sexo = mysqli_num_rows($query_sexo);

                                ?>

                                <select name="sexo_id_madres" id="sexo_id_madres" class="form-control">
                                    <?php
                                    if ($result_sexo > 0) {
                                        while ($sexo = mysqli_fetch_array($query_sexo)) {
                                    ?>
                                            <option value="<?php echo $sexo["id_sexo"]; ?>"><?php echo $sexo["nombre_sexo"] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="nacimiento_madres" class="form-label">Fecha de Nacimiento del tutor: </label>
                                <input type="date" id="nacimiento_madres" name="nacimiento_madres" class="form-control" onchange="calcularEdadPadresDos()" required>
                            </div>
                            <div class="col-md-4">
                                <label for="edad_madres" class="form-label">Edad del tutor: </label>
                                <p class="form-control"><span id="edad_madres"></span></p>
                                <input type="hidden" id="Inputedad" name="edad_madres" placeholder="0" style="overflow:none">
                            </div>
                            <div class="col-md-12">
                                <label for="direccion_madres" class="form-label">Dirección del Tutor</label>
                                <input type="text" id="direccion_madres" name="direccion_madres" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="ocupacion_madres" class="form-label">Profesión u Ocupación del tutor: </label>
                                <input type="text" id="ocupacion_madres" name="ocupacion_madres" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="celular_madres" class="form-label">Número de Celular del Tutor: </label>
                                <input type="text" id="celular_madres" name="celular_madres" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="numero_referencia_madres" class="form-label">Número de Referencia del Tutor: </label>
                                <input type="text" id="numero_referencia_madres" name="numero_referencia_madres" class="form-control" required>
                            </div>
                            <div class="col-md-4">
                                <label for="correo_madres" class="form-label">Correo Electrónico del Padre de Familia: </label>
                                <input type="text" id="correo_madres" name="correo_madres" class="form-control" required>
                            </div>
                            <div class="col-md-6">
                                <label for="parentesco_id_madres" class="form-label">Grado Familiar: </label>
                                <?php
                                $con = mysqli_connect("localhost", "root", "", "escuelaa");
                                $query_parentesco = mysqli_query($con, "SELECT * FROM parentesco WHERE (id_parentesco<4);");
                                mysqli_close($con);
                                $result_parentesco = mysqli_num_rows($query_parentesco);

                                ?>

                                <select name="parentesco_id_madres" id="parentesco_id_madres" class="form-control">
                                    <option value=""> Seleccionar el Grado Familiar </option>

                                    <?php
                                    if ($result_parentesco > 0) {
                                        while ($parentesco = mysqli_fetch_array($query_parentesco)) {
                                    ?>
                                            <option value="<?php echo $parentesco["id_parentesco"]; ?>"><?php echo $parentesco["nombre_parentesco"] ?></option>
                                    <?php
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                            </div>
                        </div>
                        <h4>Registrar Segundo Apoderado</h4>
                        <div class="col-md-4">
                            <label for="nombres_padres" class="form-label">Nombres del Padre de Familia: </label>
                            <input type="text" id="nombres_padres" name="nombres_padres" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="ape_paterno" class="form-label">Apellido Paterno del Padre de Familia: </label>
                            <input type="text" id="ape_paterno" name="ape_paterno" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="ape_materno" class="form-label">Apellido Materno del Padre de Familia: </label>
                            <input type="text" id="ape_materno" name="ape_materno" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="carnet_identidad" class="form-label">Carnet de Identidad del Padre de Familia: </label>
                            <input type="text" id="carnet_identidad" name="carnet_identidad" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="extension_id" class="form-label">Extension del Carnet: </label>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "escuelaa");
                            $query_extension = mysqli_query($con, "SELECT * FROM extension WHERE (id_extension<10);");
                            mysqli_close($con);
                            $result_extension = mysqli_num_rows($query_extension);
                            ?>
                            <select name="extension_id" id="extension_id" class="form-control">
                                <?php
                                if ($result_extension > 0) {
                                    while ($extension = mysqli_fetch_array($query_extension)) {
                                ?>
                                        <option value="<?php echo $extension["id_extension"]; ?>"><?php echo $extension["nombre_extension"] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="sexo_id" class="form-label">Sexo del Padre de Familia: </label>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "escuelaa");
                            $query_sexo = mysqli_query($con, "SELECT * FROM sexo WHERE (id_sexo<3);");
                            mysqli_close($con);
                            $result_sexo = mysqli_num_rows($query_sexo);

                            ?>

                            <select name="sexo_id" id="sexo_id" class="form-control">
                                <?php
                                if ($result_sexo > 0) {
                                    while ($sexo = mysqli_fetch_array($query_sexo)) {
                                ?>
                                        <option value="<?php echo $sexo["id_sexo"]; ?>"><?php echo $sexo["nombre_sexo"] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label for="nacimiento_padres" class="form-label">Fecha de Nacimiento del tutor: </label>
                            <input type="date" id="nacimiento_padres" name="nacimiento_padres" class="form-control" onchange="calcularEdadPadresDos()" >
                        </div>
                        <div class="col-md-4">
                            <label for="edad_padres" class="form-label">Edad del tutor: </label>
                            <p class="form-control"><span id="edad_padres"></span></p>
                            <input type="hidden" id="Inputedad" name="edad_padres" placeholder="0" style="overflow:none">
                        </div>
                        <div class="col-md-12">
                            <label for="direccion_padres" class="form-label">Dirección del Padre de Familia</label>
                            <input type="text" id="direccion_padres" name="direccion_padres" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="ocupacion" class="form-label">Profesión u Ocupación del Padre de Familia: </label>
                            <input type="text" id="ocupacion" name="ocupacion" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="celular" class="form-label">Número de Celular del Padre de Familia: </label>
                            <input type="text" id="celular" name="celular" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="numero_referencia" class="form-label">Número de Referencia del Padre de Familia: </label>
                            <input type="text" id="numero_referencia" name="numero_referencia" class="form-control">
                        </div>
                        <div class="col-md-4">
                            <label for="correo" class="form-label">Correo Electrónico del Padre de Familia: </label>
                            <input type="text" id="correo" name="correo" class="form-control">
                        </div>
                        <div class="col-md-6">
                            <label for="parentesco_id" class="form-label">Grado Familiar: </label>
                            <?php
                            $con = mysqli_connect("localhost", "root", "", "escuelaa");
                            $query_parentesco = mysqli_query($con, "SELECT * FROM parentesco WHERE (id_parentesco<4);");
                            mysqli_close($con);
                            $result_parentesco = mysqli_num_rows($query_parentesco);

                            ?>

                            <select name="parentesco_id" id="parentesco_id" class="form-control">
                                <option value=""> Seleccionar el Grado Familiar </option>

                                <?php
                                if ($result_parentesco > 0) {
                                    while ($parentesco = mysqli_fetch_array($query_parentesco)) {
                                ?>
                                        <option value="<?php echo $parentesco["id_parentesco"]; ?>"><?php echo $parentesco["nombre_parentesco"] ?></option>
                                <?php
                                    }
                                }
                                ?>
                            </select>
                        </div>
                        <div class="col-md-12">
                            <a class="btn btn-secondary" href="../index2.php">Regresar</a>
                            <button type="submit" class="btn btn-primary" name="registro">Guardar</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </main>
</body>
</html>