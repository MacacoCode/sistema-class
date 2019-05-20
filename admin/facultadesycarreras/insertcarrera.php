<?php
include('../../conexion.php');
	
	//recuperar las variables
	$idcarrera=$_POST['idcarrera'];
    $nombre=$_POST['nombre']; //nombre de la carrera
    $tipo = $_POST['tipo'];
    $idfacultad= $_POST['idfacultad'];


	//hacemos la sentencia de sql
	$sql="insert into oferta_academica (idoferta, nombre, tipo, idfacultad) values ('$idcarrera','$nombre', '$tipo', '$idfacultad');";
	//verificamos la ejecucion
	if(mysqli_query($conexion, $sql)){
		header("Location: http://localhost:8080/formulario/admin/facultadesycarreras/carreras.php");
			
	}
	else{
        header("Location: http://localhost:8080/formulario/admin/facultadesycarreras/carreras.php");
			
		
	}
?>