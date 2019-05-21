<?php
include('../../conexion.php');
	
	//recuperar las variables
	$idalumno=$_POST['idalumno'];
	$nombre=$_POST['nombre']; //id de la materia

	//prueba para que no choquen las clases, hay que hacer las variables de insertmaterias globales?????
	/*
	$sinchoque = "SELECT count(*) as sinchoque from materias, hora_materia, materias_alumnos
	where materias.idmateria = hora_materia.idmateria and materias.idmateria= materias_alumnos.idmateria
	and hora_materia.horainicio ='10' and hora_materia.horfinal='12' and hora_materia.dia='Martes'  and materias_alumnos.idalumno='$idalumno';"
	*/

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