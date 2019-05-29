<?php
include('../../conexion.php');
include('../../Login/iniciar.php');

$nota = $_GET['nota'];
$alumno = $_GET['al'];
$apellido = $_GET['ap'];
$materia = $_GET['mat'];
$grupo = $_GET['gr'];
echo $nota;
echo $alumno,$apellido,$materia,$grupo;

?>