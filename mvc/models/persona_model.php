<?php
//Llamada al modelo
//require_once("models/personas_model.php");

 
//Llamada a la vista
require_once("views/personas_view.php");
require_once("views/agregar_alumne.php");
$per=new personas_model();
$datos=$per->add_personas($dni,$nombre,$email,$curso);
?>
