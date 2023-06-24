<?php
class Databasee{
    private $hostname = "localhost";
    private $database = "escuelaa";
    private $username = "root";
    private $password = "";

    function conectar(){
        try{
            $conexion = "mysql:host=".$this->hostname.";dbname=".$this->database;
            $options = [
                PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_EMULATE_PREPARES => false,
            ];
            
            $pdo = new PDO($conexion, $this->username, $this->password, $options);

            return $pdo;

        } catch(PDOException $e){
            echo'Error conexion: '. $e->getMessage();
            exit;
        }
    }
}
class Regente
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
}