<?php 
include('../../conexion.php');

$idmateria = $_GET['pn'];
$query = "DELETE   from materias where idmateria = '$idmateria'";
$q ="DELETE   from hora_materia where idmateria = '$idmateria'";
$k="DELETE   from materia_docente  where idmateria = '$idmateria'";
$f = "DELETE   from materias_alumnos  where idmateria = '$idmateria'";

if(mysqli_query($conexion, $k) && mysqli_query($conexion, $q) && mysqli_query($conexion, $f) && mysqli_query($conexion, $query))
{
   
    header("Location: http://localhost:8080/formulario/admin/materias/materias.php");
}
else 
{
    header("Location: http://localhost:8080/formulario/admin/materias/materias.php");
}

?>