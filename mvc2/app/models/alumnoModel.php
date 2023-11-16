<?php
$per = new alumnoController();
$alumnos= $per->get_alumnos();
require_once 'views/alumnos.php';
require_once 'views/addAlumno.php';

?>