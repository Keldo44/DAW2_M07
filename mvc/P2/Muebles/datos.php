<?php

//session_start();



$color = $_GET['color'];
$dim = $_GET['dimensiones'];
$tipo = $_GET['tipo'];
$dni = $_GET['dni'];
if($dni==null){
    $dni="0";
}

//$_SESSION["nick_logueado"]=$color;

echo "El nombre es ".$color." la edad es ".$dim." y los apellidos son ".$tipo;

$servidor="localhost";
$usuario="root";
$password="";
$bd="daw2";

$con=mysqli_connect($servidor,$usuario,$password,$bd);

if(!$con){
    die("No se ha podido realizar la conexión_".mysqli_connect_error()."<br>");
}else{
    mysqli_set_charset($con,"utf8");
    echo "Se ha establecido correctamente la conexión a la base de datos";

    $sql="INSERT INTO `muebles`(`id`, `color`, `dimensiones`, `tipo`, `comprador`) 
    VALUES (NULL,'$color',$dim,'$tipo','$dni')";
    
    $consulta=mysqli_query($con,$sql);

    if(!$consulta){
        die("No se ha podido realizar el insert");
    }else{
        echo "El insert se ha realizado correctamente";
    }
}
?>