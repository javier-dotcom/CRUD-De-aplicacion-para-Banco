<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicacion para Banco modificar</title>
    <style>
body{
    margin: auto;
    width: 90%;
    color:beige;
    background-color: black;
    text-align: center;
}
.form{
display: flex;
justify-content: space-around;

}
table{
    border:2px solid aqua;
    background-color: rgb(21, 67, 96 );
    padding: 3px;
    text-align: center;
    margin: auto;

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
$traer1=mysqli_query($conexion,$consulta1);
while($fila=mysqli_fetch_array($traer)){
$nombre1=$fila["nombre_apellido"];
$tele1=$fila["telefono"];
$dire1=$fila["direccion"];
$fecha1=$fila["fecha_nacimiento"];


}






?>

<h2>Ingrese los campos que desa modificar y acepte cambios</h2>
<form action="Aplicacion_para_Banco_modificar.php">
    <input type="hidden" name="id" value="<?php echo$id;?> ">
<div class="form">
    
    <div>
<label>Nombre</label><br>
<input class="input" type="text" name="nombre" value="<?php echo$nombre1?>"><br>
</div>
<div>
<label>Direccion</label><br>
<input class="input"type="text" name="dire"value="<?php echo$dire1?>"><br>
</div>
<div>
<label>Telefono</label><br>
<input class="input"type="text" name="tele"value="<?php echo$tele1?>"><br>
</div>
<div>
<label>Fecha nacimiento</label><br>
<input class="input"type="text" name="naci"value="<?php echo$fecha1?>"><br><br>
</div>
</div>
<input class="input a"type="submit" name="modificar" value="ACEPTAR CAMBIOS"><br><br>

</form>




<?php
if(isset($_GET["modificar"])){
require_once "dalessandro_javierconectar.php";
$id=$_GET["id"];
$nombre=$_GET["nombre"];
$dire=$_GET["dire"];
$tele=$_GET["tele"];
$naci=$_GET["naci"];
$consulta2 ="UPDATE cliente SET nombre_apellido='$nombre', direccion='$dire', telefono=$tele, fecha_nacimiento='$naci' where id=$id";
$traer= mysqli_query($conexion,$consulta2);


 


 
echo "<h2> Tabla con los datos originales del registro</h2>";
 
 echo "<table><tr> ";
 echo "<td class='cabecera'>Id</td>   <td class='cabecera'>Nombre completo</td> <td class='cabecera'>Direcciòn</td> <td class='cabecera'>Telefono</td> <td class='cabecera'>Fecha de nacimiento</td>  ";                                     
 while($fila1=mysqli_fetch_array($traer1)){
     
     echo "<tr><td>". $fila1["id"]. "</td><td> " . $fila1["nombre_apellido"]. "</td><td> " . $fila1["direccion"] . "</td><td> " . $fila1["telefono"]. " </td><td>" . $fila1["fecha_nacimiento"] . "</td>   </tr>";
 
 
 }
 
 
 echo "</table>";
 echo "</div>";
 

 $consulta3="SELECT * from cliente where id = $id ";
 $traer3= mysqli_query($conexion,$consulta3);
 
 echo "<h2> Tabla con los datos modificados del registro</h2>";
 
 echo "<table><tr> ";
 echo "<td class='cabecera'>Id</td>   <td class='cabecera'>Nombre completo</td> <td class='cabecera'>Direcciòn</td> <td class='cabecera'>Telefono</td> <td class='cabecera'>Fecha de nacimiento</td>  ";                                     
 while($fila2=mysqli_fetch_array($traer3)){
     
     echo "<tr><td>". $fila2["id"]. "</td><td> " . $fila2["nombre_apellido"]. "</td><td> " . $fila2["direccion"] . "</td><td> " . $fila2["telefono"]. " </td><td>" . $fila2["fecha_nacimiento"] . "</td>   </tr>";
 
 
 }
 
 
 echo "</table>";
 echo "</div>";
 ?>
 <div class="centrar">

 <div>
     
 <h3><a class="a" href="Aplicacion_para_Banco.php"> VOLVER</a></h3>
 
 </div>
 </div>
 <?php
}
?>

</body>
</html>