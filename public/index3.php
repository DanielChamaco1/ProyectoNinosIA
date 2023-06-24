<?php
require "../public/config/database.php";
$db = new Database();
$conn = $db->getConnect();
$estudiante = new Estudiante($db);
$estudiantes = $estudiante->verEstudiantes(); 

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css"
      rel="stylesheet"
      integrity="sha384-KK94CHFLLe+nY2dmCWGMq91rCGa5gtU4mk92HdvYe+M/SXH301p5ILy+dN9+nJOZ"
      crossorigin="anonymous"
    />
    <link rel="preconvnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap"
      rel="stylesheet"
    />
    <link
      href="https://unpkg.com/boxicons@2.1.1/css/boxicons.min.css"
      rel="stylesheet"
    />
    <link
      rel="shortcut icon"
      href=" data:image/png;base64,iVBORw0KGgoAAAANSUhEUgAAACQAAAAkCAYAAADhAJiYAAAAAXNSR0IArs4c6QAAAX1JREFUWEftlzFOw0AQRd8XBSXQ0cERoEGigpaOEyBuABwASCRKCjgBcAKuQUlFzRGSA6CPJjLWYpzYCXYwkqeyvJb37f8zu7OiY6GO8dADVTnSKzSXQrbXgWvgFIjnNmMEPAJDSfE8iW+W2b4DztqkKPn3vaTzaUBBurZkoJGkjWlAzgekVhPedulcRcv+L5DtFUkfi9rbmEK2j4ArYA94A24lPc0L1giQ7U3gHVgtAOxLevl6Z3sA5PYneTlMvvl9Dtk+AcrUuJF0WTZZCq6kUJpSqHNA81j2I60khZWTaESh7EfdSep0yZ0oe9vb2Vm3k8C9AnEeRfXlYfsQOCgkdXNVZjs6gIcZ+82dpItC6UfnkEdjVWb7GHiusflFKzFJ3Gwvag0o7NiqAZSf3JllYVuqUDNVlpZoDahdSZFXM6Oxsq+aqO54D1SlVF2F/qKFHUvKLxSdb/KDNEozNsG2m/1xdg0aTL0GVfm+jPFWbxaLLKAHqlKtV6hKoU9VPBU0hhMYvQAAAABJRU5ErkJggg=="
      type="image/x-icon"
    />
    <link rel="stylesheet" href="style.css" />
    <title>Reconocimiento</title>
    <script>
        const form = document.querySelector('.formEstado');
        const estadoSwitch = form.querySelector('.estado-switch');
        estadoSwitch.addEventListener('change', function() {
            form.submit();
        });
    </script>

  <script>
    const btnOtro = document.getElementById('btnOtro');
    
    // Leer el estado del botón del localStorage
    const botonInhabilitado = localStorage.getItem('botonInhabilitado');
    
    if (botonInhabilitado === 'true') {
      // Si el botón está inhabilitado, deshabilitarlo
      btnOtro.disabled = true;
    }
    else{
        btnOtro.disabled=false;
    }
  </script>
    </head>
  <body>
    <!--  <img src="./img/bg.jpg" alt="" srcset="" style="position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    object-fit: cover;"> -->
  
        <!--   -->
        <!-- Button trigger modal -->
<nav class="navbar navbar-dark fixed-top">
  <div class="container-fluid">
    <!-- Button trigger modal -->
    <button type="button" data-bs-toggle="modal" data-bs-target="#staticBackdrop" style="border: 0cm; background-color: transparent;">
      <a class="navbar-brand" href="#">
        <img src="./img/selor.jpeg" style="border-radius: 50%; height: 40px; width: 40px; object-fit: cover;"> 
      </a>
    </button>
        <a class="navbar-brand" href="#" style="color: #8f2c24;"
          ><strong> Unidad Educativa "TOKIO" </strong></a
        >
        <button
          class="navbar-toggler"
          type="button"
          data-bs-toggle="offcanvas"
          data-bs-target="#offcanvasDarkNavbar"
          aria-controls="offcanvasDarkNavbar"
          aria-label="Toggle navigation"
        >
          <span class="navbar-toggler-icon"></span>
        </button>
        <div
          class="offcanvas offcanvas-end"
          style="
            color: #fff !important;
            background-color: RGBA(
              33,
              37,
              41,
              var(--bs-bg-opacity, 0)
            ) !important;
            border-left: 0;
          "
          tabindex="-1"
          id="offcanvasDarkNavbar"
          aria-labelledby="offcanvasDarkNavbarLabel"
        >
          <div class="offcanvas-header">
            <h5 class="offcanvas-title" id="offcanvasDarkNavbarLabel">
              Menu de Opciones
            </h5>
            <button
              type="button"
              class="btn-close btn-close-white"
              data-bs-dismiss="offcanvas"
              aria-label="Close"
            ></button>
          </div>
          <div class="offcanvas-body">
            <ul class="navbar-nav justify-content-end flex-grow-1 pe-3">
              <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="#"
                  >Inicio</a>
                  <a class="nav-link active" aria-current="page" href="./index4.html"
                  >Reconocimiento</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Registro</a>
              </li>
              <li class="nav-item dropdown">
                <a
                  class="nav-link dropdown-toggle"
                  href="#"
                  role="button"
                  data-bs-toggle="dropdown"
                  aria-expanded="false"
                >
                  Reportes
                </a>
                <ul
                  class="dropdown-menu dropdown-menu-dark"
                  style="--bs-dropdown-bg: transparent; border: 0"
                >
                  <li><a class="dropdown-item" href="#">Asistencia</a></li>
                  <li><a class="dropdown-item" href="#">Secuestros</a></li>
                  <li>
                    <hr class="dropdown-divider" />
                  </li>
                  <li>
                    <a class="dropdown-item" href="#">Actos Inusuales</a>
                  </li>
                </ul>
              </li>
            </ul>
            <form class="d-flex mt-3" role="search">
              <input
                class="form-control me-2"
                type="search"
                placeholder="Search"
                aria-label="Search"
              />
              <button class="btn btn-success" type="submit">Buscar</button>
            </form>
          </div>
        </div>
      </div>
    </nav>
    <br>
    <br>
    <br>
    <main class="container contenedor">
        <div class="p-3 rounded">
            <div class="row">
                <div class="col-12">
                    <h4>Estudiantes
                        <a href="./estudiantes/nuevo1.php" class="btn btn-primary float-right">Nuevo</a>
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
                                       
                                        <td>
                                        <td>
                                            <form action="./estudiantes/actuaestado1.php" method="POST" class="formEstado">
                                                <input type="hidden" name="id_estudiante" value="<?php echo $estudiante['id_estudiante']; ?>">
                                                <div class="custom-control custom-switch">
                                                    <input type="checkbox" class="custom-control-input estado-switch" id="onOffSwitch<?php echo $estudiante['id_estudiante']; ?>" name="estado" <?php echo ($estudiante['estado'] == 1) ? 'checked' : ''; ?>>
                                                    <label class="custom-control-label" for="onOffSwitch<?php echo $estudiante['id_estudiante']; ?>"></label>
                                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                                </div>

                                            </form>
                                        </td>

                                        </td>
                                        <td><a id="miEnlace" href="./estudiantes/editar1.php?id=<?php echo $estudiante['id_estudiante']; ?>" class="btn btn-warning" >Editar</a></td>
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

<!-- Modal -->

<!-- Modal -->

<div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
    <!--   <form class="row g-3" id="forms"> -->
      <div class="modal-header">
        <h5 class="modal-title" id="staticBackdropLabel">Informacion Personal</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <div class="row g-3">
          <div class="col">
            <img src="./img/selor.jpeg" alt="Foto del Jefe" style="width: 150px; height: 150px; object-fit: cover; border-radius: 50%;">
          </div>
          <div class="col">
            <label for="inputEmail4" class="form-label">Nombre</label>
            <input type="text" class="form-control" placeholder="First name" aria-label="First name">
            <div class="row">
              <label for="inputEmail4" class="form-label">Apellido</label>
              <input type="text" class="form-control" placeholder="Last name" aria-label="Last name">
            </div>
          </div>
         
        </div>
        
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4">
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword4">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
          </div>
          <div class="col-12">
            <label for="inputAddress2" class="form-label">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
          </div>
          <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
              
            </select>
          </div>
          <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip">
          </div> 
      </div>
   <!--    </form> -->
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
        <button type="submit"  class="btn btn-primary" onclick="generatePDF()">PDF</button>
        <button type="submit" class="btn btn-primary" onclick="printContent()">Imprimir</button>
      </div>
    </div>
  </div>
</div>

   
    
 
 
  <script
  src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
  integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe"
  crossorigin="anonymous"
></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.9.2/html2pdf.bundle.min.js"></script>

  <script>
    function generatePDF() {
   // Obtener el contenido HTML que deseas convertir a PDF
   const content = document.getElementById("forms").outerHTML;

   // Opciones de configuración para html2pdf
   const options = {
     filename: "documento.pdf",
     margin: [10, 10, 10, 10],
     jsPDF: {
       format: "letter",
       orientation: "portrait",
     },
   };

   // Convertir el contenido HTML a PDF y guardar el archivo
   html2pdf().set(options).from(content).save();
 }
 </script>
 <script>function printContent() {
   window.print();
 }</script>
 <script>// Obtener los parámetros de la URL
   var urlParams = new URLSearchParams(window.location.search);
   var encryptedParams = urlParams.get('params');
   
   // Descifrar y decodificar los parámetros
   var decryptedParams = decodeURIComponent(encryptedParams);
   </script>
    </body>
</html>