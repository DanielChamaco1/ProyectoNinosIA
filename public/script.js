function encryptParams(params) {
  // Lógica para cifrar los parámetros
  // Aquí puedes utilizar algoritmos de cifrado como AES o RSA
  // y la clave de cifrado adecuada
  // En este ejemplo, simplemente se sustituyen los caracteres
  // por su correspondiente código Unicode
  var encryptedParams = encodeURIComponent(params)
    .split("")
    .map(function (char) {
      return "u" + char.charCodeAt(0);
    })
    .join("");

  return encryptedParams;
}

function registrar(event) {
  event.preventDefault();
  const form = document.getElementById("miFormu");
  const username = form.nombre1.value;
  const password = form.validar1.value;
  const data = {
    username1: username,
    password1: password,
  };
  fetch("/registrar", {
    method: "POST",
    headers: {
      "Content-Type": "application/json",
    },
    body: JSON.stringify(data),
  })
  .then((response) => {
    if (response.ok) {
      return response.json(); // Parsear la respuesta como JSON
    } else {
      throw new Error("Error en la respuesta del servidor");
    }
  })
  .then((data) => {
    if (data.ok) {
      const { tipoUsuario } = data;

      // Realizar la redirección según el tipo de usuario
      if (tipoUsuario === "administrador") {
        window.location.href = "./index2.html";
      } else if (tipoUsuario === "usuario") {
        window.location.href = "./index3.html";
      } else {
        console.log("Tipo de usuario desconocido");
      }
    } else {
      console.log(data.message); // Mostrar mensaje de error u otra acción adicional
    }
  })

    .catch((error) => {
      console.error("Error:", error);
    });
}
const form = document.getElementById("miFormu");
form.addEventListener("submit", registrar);
