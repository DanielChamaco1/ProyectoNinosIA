function calcularEdad() {
  var nacimiento = document.getElementById("nacimiento").value;
  var nacimientoObj = new Date(nacimiento);
  var hoy = new Date();
  var edad = hoy.getFullYear() - nacimientoObj.getFullYear();

  // Verificar si el cumpleaños ya ocurrió este año
  if (
    hoy.getMonth() < nacimientoObj.getMonth() ||
    (hoy.getMonth() == nacimientoObj.getMonth() &&
      hoy.getDate() < nacimientoObj.getDate())
  ) {
    edad--;
  }

  document.getElementById("edad").textContent = edad;
  document.getElementById("Inputedad").value = edad;
}

function calcularEdadPadres() {
  var nacimiento = document.getElementById("nacimiento_padres").value;
  var nacimientoObj = new Date(nacimiento);
  var hoy = new Date();
  var edad = hoy.getFullYear() - nacimientoObj.getFullYear();

  // Verificar si el cumpleaños ya ocurrió este año
  if (
    hoy.getMonth() < nacimientoObj.getMonth() ||
    (hoy.getMonth() === nacimientoObj.getMonth() &&
      hoy.getDate() < nacimientoObj.getDate())
  ) {
    edad--;
  }

  document.getElementById("edad_padres").textContent = edad;
  document.getElementById("Inputedad").value = edad;
}
function calcularEdadPadresDos() {
  var nacimiento = document.getElementById("nacimiento_madres").value;
  var nacimientoObj = new Date(nacimiento);
  var hoy = new Date();
  var edad = hoy.getFullYear() - nacimientoObj.getFullYear();

  // Verificar si el cumpleaños ya ocurrió este año
  if (
    hoy.getMonth() < nacimientoObj.getMonth() ||
    (hoy.getMonth() === nacimientoObj.getMonth() &&
      hoy.getDate() < nacimientoObj.getDate())
  ) {
    edad--;
  }

  document.getElementById("edad_padres").textContent = edad;
  document.getElementById("Inputedad").value = edad;
}
