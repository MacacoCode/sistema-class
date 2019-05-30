<?php
include('../../conexion.php');
include('../../Login/iniciar.php');

$usuario = $_SESSION['usuario']; //id del alumno

	$idmateria=$_GET['rn']; //id de la materia
    $grupo=$_GET['gr']; //grupo de la materia
	$horainicio= $_GET['ini'];
	$horafinal= $_GET['fin'];
	$dia= $_GET['dia'];

	//Consulta para verificar si la hora y dia estan disponibles para un estudiante
	$sinchoque = "SELECT count(*) as sinchoque FROM  materias, hora_materia, materias_alumnos 
	WHERE (hora_materia.horainicio BETWEEN cast('$horainicio' AS time) and cast('$horafinal' AS time)  or
	hora_materia.horfinal BETWEEN cast('$horainicio' AS time) and cast('$horafinal' AS time) )
	and hora_materia.dia='$dia' 
	and materias_alumnos.idalumno='$usuario' and materias.idmateria = hora_materia.idmateria and materias.idmateria= materias_alumnos.idmateria and materias_alumnos.idgrupo=hora_materia.idgrupo";
	
	$consultad = mysqli_query($conexion, $sinchoque);
	$arrayd = mysqli_fetch_array($consultad);

	if($arrayd['sinchoque']==0)
	{
			$sql="INSERT INTO materias_alumnos(idmateria, idalumno, idgrupo) VALUES('$idmateria','$usuario','$grupo')";
			//verificamos la ejecucion
			if(mysqli_query($conexion, $sql)){
				header("Location: http://localhost:8080/formulario/LoginAlumnos/inscribirMat/inscribirMat.php");
					
			}
			else{
                header("Location: http://localhost:8080/formulario/LoginAlumnos/inscribirMat/inscribirMat.php?fallo=true");
		
				
			}
	}
	else 
	{
        header("Location: http://localhost:8080/formulario/LoginAlumnos/inscribirMat/inscribirMat.php?fallo2=true");
	
	}


?>