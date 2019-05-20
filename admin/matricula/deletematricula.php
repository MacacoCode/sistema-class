<?php 
include('../../conexion.php');

$idmateria = $_GET['pn'];
$idalumno = $_GET['sc'];

$query = "DELETE   from materias_alumnos where idmateria = '$idmateria' and idalumno = '$idalumno'";

$data = mysqli_query($conexion, $query);
if($data)
{
   
    header("Location: http://localhost:8080/formulario/admin/matricula/matricula.php");
}
else 
{
    echo "Sorry, ERROR";
}

?>