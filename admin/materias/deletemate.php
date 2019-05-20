<?php 
include('../../conexion.php');

$idmateria = $_GET['pn'];
$query = "DELETE   from materias where idmateria = '$idmateria'";

$data = mysqli_query($conexion, $query);
if($data)
{
   
    header("Location: http://localhost:8080/formulario/admin/materias/materias.php");
}
else 
{
    header("Location: http://localhost:8080/formulario/admin/materias/materias.php");
}

?>