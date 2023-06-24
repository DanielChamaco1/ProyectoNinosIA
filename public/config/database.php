<?php
class Database
{

    private $hostname = "localhost";
    private $database = "escuelaa";
    private $username = "root";
    private $password = "";
    public $conn;
    public function __constructr($hostname, $database, $username, $password)
    {
        $this->hostname = $hostname;
        $this->database = $database;
        $this->username = $username;
        $this->password = $password;
    }
    public function getConnect()
    {
        $this->conn = null;
        try {
            $this->conn = new PDO("mysql:host=" . $this->hostname . ";dbname=" . $this->database, $this->username, $this->password);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
        } catch (PDOException $exception) {
            echo "Error de conexión: " . $exception->getMessage();
        }
        return $this->conn;
    }
    public  function lastInsertId()
    {
        return $this->conn->lastInsertId();
    }
}
/* class Regente
{
    private $Database;
    private $db;
    private $conn;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function __constructc($conn)
    {
        $this->conn = $conn;
    }


    public function guardarRegistro($nombres, $ap_paterno, $ap_materno, $carnet, $edad, $direccion, $nacimiento, $alergias, $estado, $id_sexo, $id_extension, $id_sangre, $id_curso)
    {
        $this->conn = new mysqli("localhost", "root", "", "escuelaa");
        $estado = 1;
        $stmt = $this->conn->prepare("INSERT INTO estudiante (nombres, ap_paterno, ap_materno, carnet, edad, direccion, nacimiento, alergias, estado, id_sexo, id_extension, id_sangre, id_curso) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('sssssssssssss', $nombres, $ap_paterno, $ap_materno, $carnet, $edad, $direccion, $nacimiento, $alergias, $estado, $id_sexo, $id_extension, $id_sangre, $id_curso);
        return $stmt;
    }
    public function verRegentes()
    {
        $this->conn = new mysqli("localhost", "root", "", "escuelaa");
        $comando = $this->conn->prepare("SELECT id_regente, nombres, ap_paterno, ap_materno, edad, direccion, estado FROM regente");
        $comando->execute();
        $resultado = $comando->get_result();
        $estudiantes = $resultado->fetch_all(MYSQLI_ASSOC);
        return $estudiantes;
    }
} */
class Estudiante
{
    private $Database;
    private $db;
    private $conn;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function __constructc($conn)
    {
        $this->conn = $conn;
    }


    public function guardarRegistro($nombres, $ap_paterno, $ap_materno, $carnet, $edad, $direccion, $nacimiento, $alergias, $estado, $id_sexo, $id_extension, $id_sangre, $id_curso)
    {
        $this->conn = new mysqli("localhost", "root", "", "escuelaa");
        $estado = 1;
        $stmt = $this->conn->prepare("INSERT INTO estudiante (nombres, ap_paterno, ap_materno, carnet, edad, direccion, nacimiento, alergias, estado, id_sexo, id_extension, id_sangre, id_curso) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('sssssssssssss', $nombres, $ap_paterno, $ap_materno, $carnet, $edad, $direccion, $nacimiento, $alergias, $estado, $id_sexo, $id_extension, $id_sangre, $id_curso);
        return $stmt;
    }
    public function verEstudiantes()
    {
        $this->conn = new mysqli("localhost", "root", "", "escuelaa");
        $comando = $this->conn->prepare("SELECT id_estudiante, nombres, ap_paterno, ap_materno, edad, carnet, estado FROM estudiante");
        $comando->execute();
        $resultado = $comando->get_result();
        $estudiantes = $resultado->fetch_all(MYSQLI_ASSOC);
        return $estudiantes;
    }
}

class Padre
{
    private $Database;
    private $db;
    private $conn;
    public function __construct($db)
    {
        $this->db = $db;
    }
    public function __constructc($conn)
    {
        $this->conn = $conn;
    }
    public function guardarRegistroPadres($nombres_padres, $ape_paterno, $ape_materno, $carnet_identidad, $edad_padres, $direccion_padres, $ocupacion, $sexo_id, $extension_id, $nacimiento_padres, $celular, $numero_referencia, $parentesco_id, $estado, $correo)
    {
        $this->conn = new mysqli("localhost", "root", "", "escuelaa");
        $estado = 1;
        $stmt = $this->conn->prepare("INSERT INTO familiar (nombres_padres, ape_paterno, ape_materno, carnet_identidad, edad_padres, direccion_padres, ocupacion, sexo_id, extension_id, nacimiento_padres, celular, numero_referencia, parentesco_id, estado, correo) 
    VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)");

        $stmt->bind_param('sssssssssssssss', $nombres_padres, $ape_paterno, $ape_materno, $carnet_identidad, $edad_padres, $direccion_padres, $ocupacion, $sexo_id, $extension_id, $nacimiento_padres, $celular, $numero_referencia, $parentesco_id, $estado, $correo);
        return $stmt;
    }
    public function guardarRelacionFamiliar($id_estudiante, $id_familiar)
    {
        $this->conn = new mysqli("localhost", "root", "", "escuelaa");
        $estado = 1;
        $stmt = $this->conn->prepare("INSERT INTO estudiante_familiar (id_estudiante, id_familiar) 
    VALUES (?, ?)");

        $stmt->bind_param('ss', $id_estudiante, $id_familiar);
        return $stmt;
    }
}
