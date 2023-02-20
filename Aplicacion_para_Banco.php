<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Aplicacion para Banco</title>
<style>
body{
    margin: auto;
    width: 98%;
    color:beige;
    background-color: black;
    text-align: center;
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
.input{

    background-color:rgb(96, 21, 25); 
    color:bisque;
}
.titulos{
    background-color:rgb(96, 21, 25); 
    padding: 3px;
    border:solid rgb(21, 67, 96 ) 4px;
}
.boton:hover{
background-color: darkgray;

}
.b:hover{
    stroke:black;

}

</style>

</head>

<body>
    <h1 class="titulos">Aplicacion para banco</h1>
    <p>Crea una aplicación web que permita hacer listado, alta, baja y modificación sobre la tabla 
cliente de la base de datos banco. <br> Un cliente tiene su identificador, nombre completo, 
dirección, teléfono y fecha de nacimiento. </p>

<?php
require_once "dalessandro_javierconectar.php";

$consulta="SELECT * from cliente ";
$traer= mysqli_query($conexion,$consulta);
echo "<div class='tabla2'>";
echo "<div>";
echo " <h2 class='titulos'> Tabla Clientes (Modificacion y bajas) </h2>";
echo "<table><tr> ";
echo "<td class='cabecera'>Id</td>   <td class='cabecera'>Nombre completo</td> <td class='cabecera'>Direccion</td> <td class='cabecera'>Telefono</td> <td class='cabecera'>Fecha de nacimiento</td> <td class='cabecera'>Modificar registro</td><td class='cabecera'>Borrar registro</td> ";                                     
while($fila=mysqli_fetch_array($traer)){
    
    echo "<tr><td>". $fila["id"]. "</td><td> " . $fila["nombre_apellido"]. "</td><td> " . $fila["direccion"] . "</td><td> " . $fila["telefono"]. " </td><td>" . $fila["fecha_nacimiento"] . "</td> <td class='boton'>" ?><a href="Aplicacion_para_Banco_modificar.php?id=<?php echo$fila['id'];?> "><svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-edit b" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
    <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
    <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
    <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
    <line x1="16" y1="5" x2="19" y2="8" />
  </svg></a> </td> <td class='boton'><a href="Aplicacion_para_Banco_borrar.php?id=<?php echo$fila['id'];?> "> <svg xmlns="http://www.w3.org/2000/svg" class="icon icon-tabler icon-tabler-trash b" width="24" height="24" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffffff" fill="none" stroke-linecap="round" stroke-linejoin="round">
  <path stroke="none" d="M0 0h24v24H0z" fill="none"/>
  <line x1="4" y1="7" x2="20" y2="7" />
  <line x1="10" y1="11" x2="10" y2="17" />
  <line x1="14" y1="11" x2="14" y2="17" />
  <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
  <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
</svg></a> <?php "</td>   </tr>";


}


echo "</table>";
echo "</div>";


echo "<div>";
echo "<h2 class='titulos'> Cargar Clientes nuevos (Altas)</h2>";


?>
<table><tr> 
<td class='cabecera'>
Formulario para ingresar nuevos clientes
</td>
</tr>
<tr> 
<td>
<form action="Aplicacion_para_Banco_altas.php">
<label>Nombre</label><br>
<input class="input" type="text" name="nombre"><br>
</td>
</tr>
<tr> 
<td>
<label>Direccion</label><br>
<input class="input"type="text" name="dire"><br>
</td>
</tr>
<tr> 
<td>
<label>Telefono</label><br>
<input class="input"type="phone" name="tele"><br>
</td>
</tr>
<tr> 
<td>
<label>Fecha nacimiento</label><br>
<input class="input"type="text" name="naci"><br><br>
</td>
</tr>
<tr> 
<td>
<input class="input"type="submit" value="CARGAR" name="cargar">
</td>
</tr>

</table>

</form>



<?php
echo "</div>";
if(isset($_GET["cargar"])){
    $nomApe=$_GET["nombre"];
    $dire=$_GET["dire"];
    $telefono=$_GET["tele"];
    $fecha_naci=$_GET["naci"];

    $consulta5="INSERT INTO cliente (nombre_apellido,direccion,telefono,fecha_nacimiento) VALUES ('$nomApe','$dire',$telefono,'$fecha_naci')";
    $cargar= mysqli_query($conexion,$consulta5);
}

?>

</body>
</html>