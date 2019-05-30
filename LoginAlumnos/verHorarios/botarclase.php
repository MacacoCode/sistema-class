<?php 
include('../../conexion.php');
include('../../Login/iniciar.php');

$usuario = $_SESSION['usuario'];

$idmateria = $_GET['rn'];



$sql = "DELETE from materias_alumnos where idalumno='$usuario' and idmateria='$idmateria' ";


$data =  mysqli_query($conexion, $sql); 
if($data)
{
   
    header("Location: http://localhost:8080/formulario/LoginAlumnos/verHorarios/verHorarios.php");
}
else 
{
    echo"Error al botar materia";

}

?>