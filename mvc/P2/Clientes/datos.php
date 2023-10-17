<?php
//session_start();
$dni = $_GET['dni'];
$name = $_GET['name'];
$direccion = $_GET['direccion'];
$email = $_GET['email'];

//$_SESSION["nick_logueado"]=$color;

echo "<p>El nombre es ".$name." la dirección es ".$direccion." y el email es ".$email."</p>";
$servidor="localhost";
$usuario="root";
$password="";
$bd="daw2";

$con=mysqli_connect($servidor,$usuario,$password,$bd);
if(!$con){
    die("No se ha podido realizar la conexión_".mysqli_connect_error()."<br>");
}else{
    mysqli_set_charset($con,"utf8");
    echo "<p>Se ha establecido correctamente la conexión a la base de datos</p>";

    $sql="INSERT INTO `clientes`(`dni`, `name`, `direccion`, `email`) 
    VALUES ('$dni','$name','$direccion','$email')";
    
    $consulta=mysqli_query($con,$sql);

    if(!$consulta){
        die("No se ha podido realizar el insert");
    }else{
        echo "<p>El insert se ha realizado correctamente.</p>";
    }
}
?>