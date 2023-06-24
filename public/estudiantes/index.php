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
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <script>
        const form = document.querySelector('.formEstado');
        const estadoSwitch = form.querySelector('.estado-switch');
        estadoSwitch.addEventListener('change', function() {
            form.submit();
        });
    </script>
</head>
<?php
require 'config/database.php';
$db = new Database();
$conn = $db->getConnect();
$estudiante = new Estudiante($db);
$estudiantes = $estudiante->verEstudiantes();
?>

<body class="py-3">
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col-12">
                    <h4>Estudiantes
                        <a href="nuevo.php" class="btn btn-primary float-right">Nuevo</a>
                    </h4>
                </div>
            </div>

            <div class="row py-3">
                <div class="col">
                    <?php if (!empty($estudiantes)) : ?>
                        <table class="table table-border">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Nombres del estudiante</th>
                                    <th>Apellido Paterno</th>
                                    <th>Apellido Materno</th>
                                    <th>Edad</th>
                                    <th>Carnet de Identidad</th>
                                    <th></th>
                                    <th>Estado</th>
                                    <td></td>
                                    <td></td>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($estudiantes as $estudiante) : ?>
                                    <tr>
                                        <td><?php echo $estudiante['id_estudiante']; ?></td>
                                        <td><?php echo $estudiante['nombres']; ?></td>
                                        <td><?php echo $estudiante['ap_paterno']; ?></td>
                                        <td><?php echo $estudiante['ap_materno']; ?></td>
                                        <td><?php echo $estudiante['edad']; ?></td>
                                        <td><?php echo $estudiante['carnet']; ?></td>
                                        <?php echo $estudiante['estado']; ?>
                                        <td>
                                        <td>
                                            <form action="actuaestado.php" method="POST" class="formEstado">
                                                <input type="hidden" name="id_estudiante" value="<?php echo $estudiante['id_estudiante']; ?>">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input estado-switch" id="onOffSwitch<?php echo $estudiante['id_estudiante']; ?>" name="estado" <?php echo ($estudiante['estado'] == 1) ? 'checked' : ''; ?>>
                                                    <label class="custom-control-label" for="onOffSwitch<?php echo $estudiante['id_estudiante']; ?>"></label>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>

                                            </form>
                                        </td>

                                        </td>
                                        <td><a href="editar.php?id=<?php echo $estudiante['id_estudiante']; ?>" class="btn btn-warning">Editar</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        <?php else : ?>
                            <p>No se encontraron estudiantes registrados..</p>
                        <?php endif; ?>
                        </table>
                </div>
            </div>
        </div>
    </main>

</body>

</html>