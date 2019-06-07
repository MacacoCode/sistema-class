<?php 
include('../../conexion.php');
include('../../Login/iniciar.php');
$idalumno = $_GET['rn'];
//$sql = "DELETE from oferta_alumnos where idalumno='$idalumno'";
$query = "UPDATE alumnos set activo='0' where idalumno = '$idalumno'";
$query2="UPDATE  login set activo='0' where usuario='$idalumno' ";


if(mysqli_query($conexion, $query) && mysqli_query($conexion, $query2))
{
   
    header("Location: http://localhost:8080/formulario/admin/alumnos/alumnos.php");
}
else 
{
    header("Location: http://localhost:8080/formulario/admin/alumnos/alumnos.php?fallo2");

}

?>