<?php 
include('../../conexion.php');
include('../../Login/iniciar.php');
$idalumno = $_GET['rn'];
//$sql = "DELETE from oferta_alumnos where idalumno='$idalumno'";
$query = "UPDATE alumnos set activo='0' where idalumno = '$idalumno'";


$data = mysqli_query($conexion, $query);
if($data)
{
   
    header("Location: http://localhost:8080/formulario/admin/alumnos/alumnos.php");
}
else 
{
    header("Location: http://localhost:8080/formulario/admin/alumnos/alumnos.php?fallo2");

}

?>