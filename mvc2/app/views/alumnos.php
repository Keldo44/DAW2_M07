<?php ?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Alumnos</title>
</head>
<body>
<h1>Alumnos</h1>

<table>
    <thead>
    <tr>
        <th>Nombre</th>
        <th>Apellidos</th>
        <th>DNI</th>
        <th>Curso</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($alumnos as $alumno){
        echo"    
        <tr>
            <td>  ".$alumno["dni"]." </td>
            <td>  ".$alumno["nombre"]." </td>
            <td>  ".$alumno["email"]." </td>
            <td>  ".$alumno["curso"]." </td>
        </tr>";
    }
    ?>
    </tbody>
</table>
</body>
</html>
