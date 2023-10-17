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
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <table>
    <?php
         $sql2="SELECT * FROM `clientes` where `dni`='$id'";
        $consulta=mysqli_query($con,$sql2);
        while($fila=$consulta->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$fila["dni"]."</td>";
            echo "<td>".$fila["name"]."</td>";
            echo "<td>".$fila["direccion"]."</td>";
            echo "<td>".$fila["email"]."</td>";
            echo "</tr>";
        }
    ?>
    </table>


</body>
<style>
    table{
    display:flex;
    flex-direction: column;
    gap: 10px;
    width: 30%;
    margin:auto;
    background: aliceblue;
    padding: 20px;
    position: absolute;
    top:0;
    left:0;
    bottom: 0;
    right: 0;
    height: fit-content;
    font-size: 22px;
    }
    tr{
        display: flex;
        flex-direction: row;
        gap:20px;
        
    }
    td{
        width: calc(25% - 20px);
    }
    .boton{
    width: fit-content !important;
    font-size: 30px;
    font-weight: 600;
    right: 0;
    margin: 0 0 0 62.5%;
    padding: 10px 60px;
    background: linear-gradient(90deg, aqua, #c0ffc6, aqua);
    background-size: 400%;
    background-position: 0% 50%;
    border: none;
    right: 0;
    border-radius: 20px;
    color: #343434;
    }
    .boton:hover{
    animation: 1s color;
    background-position: 100% 50%;
    cursor: pointer;
    }
    @keyframes color {
    0% {background-position: 0 50%;}
    100% {background-position: 100% 50%;}
    }        
</style>
</html>