<?php
include('../../conexion.php');
	
	//recuperar las variables
	$codigoMateria=$_POST['codigo'];
	$nombre=$_POST['nombre'];
	$grupo=$_POST['grupo'];
	$horaincio=$_POST['horainicio'];
	$horafinal=$_POST['horafinal'];
	$iddocente=$_POST['iddocente'];
	$dia=$_POST['dia'];

	//hacemos la sentencia de sql
	$sql="INSERT INTO materias (codigo, nombre)VALUES('$codigoMateria','$nombre')";
	mysqli_query($conexion, $sql);
	//Recuperamos el idmateria
	$recuperarID="SELECT idmateria as idmateria from materias where nombre='$nombre'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
	$idmateria= $array['idmateria'];



	$materiasdocentes = "INSERT into materia_docente (idmateria, iddocente, idgrupo) values ('$idmateria','$iddocente','$grupo')";
	$horario = "INSERT into hora_materia (horainicio, horfinal, idmateria, idgrupo,dia) values ('$horaincio', '$horafinal' , '$idmateria' , '$grupo', '$dia')";

	//verificamos la ejecucion
	if (mysqli_query($conexion, $horario) && mysqli_query($conexion, $materiasdocentes) ){
		header("Location: http://localhost:8080/formulario/admin/materias/materias.php");
			
	}
	else{
		echo"Error al insertar datos";
		
	}
?>