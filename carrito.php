<?php

session_start();
$_SESSION['id'];
$_SESSION['usuario'];
$_SESSION['admin'];


/*
$nombre = $_GET['nombre'];
$precio = $_GET['precio'];
$cantidad = $_GET['cantidad'];
$descripcion = $_GET['descripcion'];*/
$buscador = NULL;

$servidor="localhost";
$usuario="root";
$password="";
$bd="daw2";

$con=mysqli_connect($servidor,$usuario,$password,$bd);
  if($con){
    

?>

  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <title>Leer Formulario</title>
      <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/css/bootstrap.min.css" rel="stylesheet">
      <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.3.0/css/font-awesome.css" rel="stylesheet"  type='text/css'>    
      <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.1/dist/js/bootstrap.bundle.min.js"></script>
      <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
          <div class="container-fluid">
            <a class="navbar-brand" href="#"><?=$_SESSION['usuario']?></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01" aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarColor01">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                  <li class="nav-item">
                      <a class="nav-link" href="leerProductos.php">Leer productos</a>
                  </li>
                </ul>
                <a href="carrito.php" style="padding-right:5%"><i class="fa fa-cart-plus" aria-hidden="true" style="color:white;font-size:40px;padding-right:5%"></i></a>
                <form class="d-flex">
                  <input class="form-control me-2" type="search" placeholder="Buscador por ID o nombre" name="buscador" aria-label="Buscador por ID">
                  <button class="btn btn-outline-light" type="submit" name="buscador" style="margin-right:10px ;">Buscar</button>
                </form>
                <button class="delete btn btn-outline-light" type="submit"><a style="text-decoration: none; color:white" onclick="cerrarSesion(event)" 
                href="Login.php">Logout</a></button>
            </div>
          </div>
    </nav>
  <div class="container mt-3">
  <h1 style="text-align:center">Carrito de <?=$_SESSION['usuario']?></h1>
    <table class="table table-dark table-hover">
      <tbody>
        <tr>
          <th>Producto</th>
          <th>Cantidad</th>
        </tr>
        <?php
        //$buscador = $_GET['buscador']; 
        //var_dump($buscador);
        if(isset($_GET["buscador"])){
          $buscador = $_GET["buscador"];
          $sql2="SELECT p.nombre,c.id,c.cant FROM `carrito` AS c,`USUARIOS`  AS u, `productos` AS p WHERE p.id=$_GET[buscador] OR p.nombre= '$_GET[buscador]' AND p.id=c.id AND c.idusuario = u.id AND c.idusuario=$_SESSION[id]";
          //buscador($con,$buscador);
          $consulta=mysqli_query($con,$sql2);
          //var_dump($consulta);
          while($fila=$consulta->fetch_assoc()){
              echo "<tr>";
              echo "<td>".$fila["nombre"]."</td>";
              echo "<td>".$fila["cant"]."</td>";
              echo "</tr>";

          }
        }else{
          //var_dump($_GET['buscador']);
          $sql2="SELECT p.nombre,c.id,c.cant FROM `carrito` AS c,`USUARIOS`  AS u, `productos` AS p WHERE p.id=c.id AND c.idusuario = u.id AND c.idusuario=$_SESSION[id]";
          //var_dump($sql2);
          $consulta=mysqli_query($con,$sql2);
        //var_dump($consulta);
        while($fila=$consulta->fetch_assoc()){
            echo "<tr>";
            echo "<td>".$fila["nombre"]."</td>";
            echo "<td>".$fila["cant"]."</td>";
            echo "</tr>";

        }
        }
        
        ?>
      </tbody>
    </table>
  </div>
  
      <form action="/logout.php" method="get">
  
  </form>
  </body>
  </html>
  
<?php
}
  function buscador($con,$buscador){
    $sql2="SELECT * FROM `productos` where `id` = '$buscador' OR `nombre` = '$buscador'";
    var_dump($sql2);
    $consulta=mysqli_query($con,$sql2);
    while($fila=$consulta->fetch_assoc()){
        echo "<tr>";
        echo "<td>".$fila["id"]."</td>";
        echo "<td>".$fila["nombre"]."</td>";
        echo "<td>".$fila["cantidad"]."</td>";
        echo "<td>".$fila["precio"]."</td>";
        echo "<td>".$fila["descripcion"]."</td>";
        echo "<td>".'<i class="fa fa-cart-plus" aria-hidden="true" style="color:white;font-size:40px;padding-right:5%"></i>'."</td>";
        echo "</tr>";
        
    }
    $buscador = NULL;
  }
?>
<script type="text/javascript">
    function cerrarSesion(event) {
      event.preventDefault();
      swal({
        title: "Seguro desea cerrar sesión?",
        text: "Una vez cerrada tendrá que logear de nuevo",
        icon: "warning",
        buttons: true,
        dangerMode: true,
      })
      .then((willDelete) => {
        if (willDelete) {
          swal("Redirigiendo...", {
            icon: "success",
          });
          window.location.href = "Login.php";
        } else {
          swal("Su sesión no se ha cerrado");
        }
      });
    }
</script>

