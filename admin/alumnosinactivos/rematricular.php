<?php 
include('../../conexion.php');
include('../../Login/iniciar.php');

$idalumno = $_GET['id'];

$sql = "UPDATE alumnos set activo='1' where idalumno = '$idalumno';";
$query2="UPDATE  login set activo='1' where usuario='$idalumno' ";

if(mysqli_query($conexion, $sql) && mysqli_query($conexion,$query2))
{
   
    header("Location: http://localhost:8080/formulario/admin/alumnosinactivos/inactivos.php?exito");
}
else 
{
    header("Location: http://localhost:8080/formulario/admin/alumnosinactivos/inactivos.php?fallo2");

}

?>