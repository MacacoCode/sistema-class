<?php
           include('../../conexion.php');
           include('../../Login/iniciar.php');
       error_reporting(0);

            $idcoord = $_GET['id'];
            $nombre = $_GET['nombre'];
            $apellido = $_GET['apellido'];
            $segundonombre = $_GET['segundoNombre'];
            $segundoapellido = $_GET['segundoapellido'];
            $telefono = $_GET['telefono'];
            $correo = $_GET['correo'];
            $carrera = $_GET['carrera']; 

        $recuperarID="SELECT idcarrera as idcarrera from oferta_academica where nombre='$carrera'";
	    $consulta = mysqli_query($conexion, $recuperarID);
	    $array = mysqli_fetch_array($consulta);
        $idcarrera= $array['idcarrera'];
    
           
            $query ="UPDATE coordinadores SET  nombre= '$nombre', apellido='$apellido', segundoNombre='$segundonombre', segundoApellido='$segundoapellido', correo='$correo', telefono='$telefono', idcarrera='$idcarrera' WHERE idcoordinador='$idcoord'";
           

            if(mysqli_query($conexion, $query))
            {
                header("Location: http://localhost:8080/formulario/admin/coord/coord.php");
            }
            else{
             echo"NEPE";
            }
        
      
        ?>