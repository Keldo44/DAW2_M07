<?php
class personas_model{
    private $db;
    private $personas;
 
    public function __construct(){
        $this->db=Conectar::conexion();
        $this->personas=array();
    }
    public function get_personas(){
        $consulta=$this->db->query("select * from `alumno`;");
        while($filas=$consulta->fetch_assoc()){
            $this->personas[]=$filas;
        }
        return $this->personas;
    }
    public function add_personas($dni,$nombre,$email,$curso){
        // Insertamos los datos en la base de datos
        $query = $this->db->prepare("INSERT INTO alumnos (dni, nombre, email, curso) VALUES ('$dni', '$nombre', '$email', $curso)");
        $query->execute();

        // Devolvemos la persona
        return [
            'dni' => $dni,
            'nombre' => $nombre,
            'email' => $email,
            'curso' => $curso
        ];
    }
    /**
     * $query = $db->prepare("INSERT INTO alumnos (dni, nombre, email, curso) VALUES ('$dni', '$nombre', '$email', $curso)");
     * $query->execute();
     */
}
?>
