<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicacion_para_Banco_borrar.php</title>
    <style>
body{
    margin: auto;
    width: 90%;
    color:beige;
    background-color: black;
}
table{
    border:2px solid aqua;
    background-color: rgb(21, 67, 96 );
    padding: 3px;
    text-align: center;

     }
tr,td{
    border:2px solid black;
background-color: rgb(96, 21, 25);
padding: 3px;
}
.tabla2{
    display: flex;
    justify-content: space-around;
}
h2{
    text-align: center;
}
.cabecera{

    background-color:darkgray;
    color:black;
    font-size: large;
}
.a{
    margin-top: 20px;
    text-decoration: none;
    background-color:darkgray;
    color:black;
    padding: 4px;
    border:2px solid aqua;

}
.centrar{

display: flex;
justify-content: space-around;

}



</style>
</head>
<body>
<?php
require_once "dalessandro_javierconectar.php";
$id=$_GET["id"];
$consulta1="SELECT * from cliente where id = $id ";
$traer= mysqli_query($conexion,$consulta1);

$consulta="DELETE  from cliente where id = $id";
$borrar=mysqli_query($conexion,$consulta);


?>
<h2>Se a eliminado el registro correspondiente a :</h2>
<?php


echo "<div class='tabla2'>";

echo "<table><tr> ";
echo "<td class='cabecera'>Id</td>   <td class='cabecera'>Nombre completo</td> <td class='cabecera'>Direccion</td> <td class='cabecera'>Telefono</td> <td class='cabecera'>Fecha de nacimiento</td>  ";                                     
while($fila=mysqli_fetch_array($traer)){
    
    echo "<tr><td>". $fila["id"]. "</td><td> " . $fila["nombre_apellido"]. "</td><td> " . $fila["direccion"] . "</td><td> " . $fila["telefono"]. " </td><td>" . $fila["fecha_nacimiento"] . "</td>   </tr>";


}


echo "</table>";
echo "</div>";
?>

<div class="centrar">

<div>
    
<h3><a class="a" href="Aplicacion_para_Banco.php"> VOLVER</a></h3>

</div>
</div>

</body>
</html>
