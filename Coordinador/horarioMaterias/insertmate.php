<?php
include('../../conexion.php');
	
	//recuperar las variables
	$nombreMateria=$_POST['nombreMateria'];
	$grupo=$_POST['grupo'];
	$horaincio=$_POST['horainicio'];
	$horafinal=$_POST['horafinal'];
	$dia=$_POST['dia'];
	$aula=$_POST['aula'];

	//Recuperamos el idmateria
	$recuperarID="SELECT idmateria as idmateria from materias where nombre='$nombreMateria'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
	$idmateria= $array['idmateria'];

	



	$horario = "INSERT into hora_materia (horainicio, horfinal, idmateria, idgrupo,dia,aula) values ('$horaincio', '$horafinal' , '$idmateria' , '$grupo', '$dia','$aula')";

	//verificamos la ejecucion
	if (mysqli_query($conexion, $horario) ){
	
		header("Location: http://localhost:8080/formulario/Coordinador/horarioMaterias/materias.php");
			
	}
	else{
		header("Location: http://localhost:8080/formulario/Coordinador/horarioMaterias/materias.php?fallo=true");
		
	}
?>