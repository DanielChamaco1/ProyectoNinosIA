const mysql = require("mysql");
const express = require("express");
const bodyParser = require("body-parser");
const crypto = require('crypto');

const app = express();
app.use(bodyParser.urlencoded({ extended: true }));
app.use(bodyParser.json());

const connection = mysql.createPool({
  connectionLimit:3,
  host: "localhost",
  user: "root",
  password: "",
  database: "escuelaa",
});
function generateMD5Hash(text) {
  const hash = crypto.createHash('md5').update(text).digest('hex');
  return hash;
}


// Crear una instancia de la aplicación de Express
app.post("/registrar", (req, res) => {
  const data = req.body;
  const username = data.username1;
  const input = data.password1;
  const md5Hash = generateMD5Hash(input);
  const password=md5Hash;
  // Consultar la base de datos para verificar las credenciales
  connection.query(
    "SELECT * FROM regente WHERE matricula = ? AND contrasena = ?",
    [username, password],
    (error, results) => {
      if (error) {
        res.status(500).json({ message: "Error en el servidor" });
      } else {
        if (results.length > 0) {
          var usuario = results.find((result) => result.rol === "administrador");
          if (usuario) {
            // Credenciales de administrador correctas
            // Redireccionar a la página del administrador
            res.status(203).send({
              ok: true,
              message: "se ha registrado correctamente",
              tipoUsuario: "administrador"
            });
          } else {
            // Credenciales de usuario correctas
            // Redireccionar a la página del usuario
            res.status(203).send({
              ok: true,
              message: "se ha registrado correctamente",
              tipoUsuario: "usuario"
            });
          }
        } else {
          res.status(401).json({ message: "Credenciales incorrectas" });
        }
      }
    }
  );
});


// Ruta de inicio de sesión

//importando rutas

/* app.use(`/`,ConsultasRouter); */

//app.use(express.static(path.join(__dirname,'public')));
const port = 3000;
app.listen(port, () => {
  console.log(`http://localhost:${port}/`);
});




