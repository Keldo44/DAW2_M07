<?php
class alumnoController
{
    private $db;
    private $alumnos;

    public function __construct(){
        $this->db=Conectar::conexion();
        $this->alumnos=array();
    }
    public function get_alumnos(){
        $consulta=$this->db->query("select * from `alumno`;");
        while($filas=$consulta->fetch_assoc()){
            $this->alumnos[]=$filas;
        }
        return $this->alumnos;
    }
    public function add_alumno($dni,$nombre,$email,$curso){
        // Insertamos los datos en la base de datos
        $query = $this->db->prepare("INSERT INTO alumno (dni, nombre, email, curso) VALUES ('$dni', '$nombre', '$email', $curso)");
        $query->execute();

        // Devolvemos la persona
        return [
            'dni' => $dni,
            'nombre' => $nombre,
            'email' => $email,
            'curso' => $curso
        ];
    }
}