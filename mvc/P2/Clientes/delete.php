<?php

//session_start();



$id = $_GET['dni'];


//$_SESSION["nick_logueado"]=$nombre;

$servidor="localhost";
$usuario="root";
$password="";
$bd="daw2";

$con=mysqli_connect($servidor,$usuario,$password,$bd);
if(!$con){
    die("No se ha podido realizar la conexión_".mysqli_connect_error()."<br>");
}else{
    mysqli_set_charset($con,"utf8");
    

}
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
    <?php
         $sql2="DELETE FROM `clientes` where `dni`='$id'";
        $consulta=mysqli_query($con,$sql2);
        if(!$consulta){
            echo 'No se ha podido realizar el delete';
        }else{
            echo'<p>Usuario borrado correctamente</p>';
        }
    ?>
    
    
</body>
</html>