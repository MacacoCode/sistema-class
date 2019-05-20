<?php
include('../../conexion.php');
	
	//recuperar las variables
	$idmateria=$_POST['idmateria'];
	$nombre=$_POST['nombre'];
	$grupo=$_POST['grupo'];
	$horaincio=$_POST['horainicio'];
	$horafinal=$_POST['horafinal'];
	$iddocente=$_POST['iddocente'];

	//hacemos la sentencia de sql
	$sql="INSERT INTO materias VALUES('$idmateria','$nombre')";
	$materiasdocentes = "INSERT into materia_docente (idmateria, iddocente, idgrupo) values ('$idmateria','$iddocente','$grupo')";
	$horario = "INSERT into hora_materia (horainicio, horfinal, idmateria, idgrupo) values ('$horaincio', '$horafinal' , '$idmateria' , '$grupo')";

	//verificamos la ejecucion
	if (mysqli_query($conexion, $sql) && mysqli_query($conexion, $materiasdocentes) && mysqli_query($conexion, $horario) ){
		header("Location: http://localhost:8080/formulario/admin/materias/materias.php");
			
	}
	else{
		header("Location: http://localhost:8080/formulario/admin/materias/materias.php");
		
	}
?>