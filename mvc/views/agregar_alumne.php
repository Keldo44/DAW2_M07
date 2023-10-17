<?php
    // Obtenemos los datos del formulario
    $dni = $_POST['dni'];
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $curso = $_POST['curso'];

    //require_once("models/personas_model.php");
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form method="post">
        <label for="dni">DNI</label>
        <input type="text" name="dni" id="dni">

        <label for="nombre">Nombre</label>
        <input type="text" name="nombre" id="nombre">

        <label for="email">Correo electrónico</label>
        <input type="text" name="email" id="email">

        <label for="curso">Curso</label>
        <input type="number" name="curso" id="curso">

        <input type="submit" value="Enviar">

    </form>
</body>
</html>