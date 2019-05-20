<?php
include('../../conexion.php');
	
	//recuperar las variables
	$idalumno=$_POST['idalumno'];
	$nombre=$_POST['nombre'];


	//hacemos la sentencia de sql
	$sql="INSERT INTO materias_alumnos(idalumno, idmateria) VALUES('$idalumno','$nombre')";
	//verificamos la ejecucion
	if(mysqli_query($conexion, $sql)){
		header("Location: http://localhost:8080/formulario/admin/matricula/matricula.php");
			
	}
	else{
		header("Location: http://localhost:8080/formulario/admin/matricula/matricula.php");
		
	}
?>