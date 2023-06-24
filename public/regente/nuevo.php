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
                    <form class="row g-3" method="POST" action="guarda.php" autocomplete="off">
                        <div class="col-md-4">
                            <label for="nombres" class="form-label">Nombres del regente: </label>
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
                            <label for="extension" class="form-label" >Extension del Carnet: </label>
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
                            <label for="sexo" class="form-label" >Sexo: </label>
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


                        <div class="col-md-6">
                            <label for="nacimiento" class="form-label">Fecha de Nacimiento: </label>
                            <input type="date" id="nacimiento" name="nacimiento" class="form-control" onchange="calcularEdad()" required>
                        </div>

                        
                        <div class="col-md-6">
                            <label for="edad" class="form-label">Edad: </label>
                            <p class="form-control"><span id="edad"></span></p>
                            <input type="hidden" id="Inputedad" name="edad" placeholder="0" style="overflow:none">
                        </div>












                        <div class="col-md-4">
                            <label for="matricula" class="form-label">Matricula</label>
                            <input type="text" id="matricula" name="matricula" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="contrasena" class="form-label">Contraseña</label>
                            <input type="text" id="contrasena" name="contrasena" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="correo" class="form-label">Correo electronico</label>
                            <input type="text" id="correo" name="correo" class="form-control" required>
                        </div>

                        <div class="col-md-4">
                            <label for="celular" class="form-label">Celular</label>
                            <input type="text" id="celular" name="celular" class="form-control" required>
                        </div>









                        
                     
                      

                        <div class="col-md-12">
                            <label for="direccion" class="form-label">Dirección</label>
                            <input type="text" id="direccion" name="direccion" class="form-control" required>
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