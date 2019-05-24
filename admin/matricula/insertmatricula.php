<?php
include('../../conexion.php');
	
	//recuperar las variables
	$idalumno=$_POST['idalumno'];
	$nombre=$_POST['nombre']; //nombre de la materia

	//Pasar el nombre de la materia a id
	$recuperarID="SELECT idmateria as idmateria from materias where nombre='$nombre'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
	$idmateria= $array['idmateria'];

	//Primera consulta para obtener la hora y dia de la materia
	$cdh="SELECT horainicio as inicio, horfinal as final,dia as dia from hora_materia where idmateria='$idmateria'";
	$consultahdm = mysqli_query($conexion, $cdh);
	$array = mysqli_fetch_array($consultahdm);
	$horainicio= $array['inicio'];
	$horafinal= $array['final'];
	$dia= $array['dia'];


	//Consulta para verificar si la hora y dia estan disponibles para un estudiante
	$sinchoque = "SELECT count(*) as sinchoque from materias, hora_materia, materias_alumnos
	where materias.idmateria = hora_materia.idmateria and materias.idmateria= materias_alumnos.idmateria
	and hora_materia.horainicio ='$horainicio' and hora_materia.horfinal='$horafinal' and hora_materia.dia='$dia' 
	 and materias_alumnos.idalumno='$idalumno'";
	
	$consultad = mysqli_query($conexion, $sinchoque);
	$arrayd = mysqli_fetch_array($consultad);

	if($arrayd['sinchoque']==0){
		
		//hacemos la sentencia de sql
	$sql="INSERT INTO materias_alumnos(idmateria, idalumno) VALUES('$idmateria','$idalumno')";
	//verificamos la ejecucion
	if(mysqli_query($conexion, $sql)){
		header("Location: http://localhost:8080/formulario/admin/matricula/matricula.php");
			
	}
	else{
		header("Location: http://localhost:8080/formulario/admin/matricula/matricula.php");
		
	}
	}
	else 
	{
		echo "La clase choca xd";
	}

	
?>