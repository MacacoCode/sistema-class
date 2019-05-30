<?php
include('../../conexion.php');
include('../../Login/iniciar.php');

$usuario = $_SESSION['usuario']; //id del alumno

	$nombre=$_POST['nombre']; //nombre de la materia
    $grupo=$_POST['grupo']; //grupo de la materia
    
    //Pasar el nombre de la materia a id
	$recuperarID="SELECT idmateria as idmateria from materias where nombre='$nombre'";
	$consulta = mysqli_query($conexion, $recuperarID);
	$array = mysqli_fetch_array($consulta);
    $idmateria= $array['idmateria']; // id de la materia
    
    
	//Primera consulta para obtener la hora y dia de la materia
	$cdh="SELECT horainicio as inicio, horfinal as final,dia as dia from hora_materia where idmateria='$idmateria' and idgrupo='$grupo'";
	$consultahdm = mysqli_query($conexion, $cdh);
    $array = mysqli_fetch_array($consultahdm);
    
	$horainicio= $array['inicio'];
	$horafinal= $array['final'];
	$dia= $array['dia'];


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