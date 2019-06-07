<?php
include('../../conexion.php');
include('../../Login/iniciar.php');
error_reporting(0);

$idalumno = $_GET['idalumno'];
            $nombre = $_GET['nombre'];
            $segundonombre = $_GET['segundoNombre'];
            $apellido = $_GET['apellido'];
            $segundoapellido = $_GET['segundoapellido'];
            $telefono = $_GET['telefono'];
            $correo = $_GET['correo'];
            $carrera = $_GET['carrera']; //nombre de la carrera

            //Pasar el nombre de la carrera a su id
            $recuperarID="SELECT idcarrera as idcarrera from oferta_academica where nombre='$carrera'";
            $consulta = mysqli_query($conexion, $recuperarID);
            $array = mysqli_fetch_array($consulta);
            $idcarrera= $array['idcarrera'];
           
            $query ="UPDATE alumnos SET  nombre= '$nombre', apellido='$apellido', segundoNombre='$segundonombre', segundoApellido='$segundoapellido', correo='$correo', telefono='$telefono' WHERE idalumno='$idalumno' or nombre='$nombre' or apellido='$apellido' ";
            $sql ="UPDATE oferta_alumnos SET  idcarrera= '$idcarrera' WHERE idalumno='$idalumno' ";

            //$data = mysqli_query($conexion, $sqk) && mysqli_query($conexion, $query);
            if(mysqli_query($conexion, $query) && mysqli_query($conexion, $sql) )
            {
                header("Location: http://localhost:8080/formulario/admin/alumnos/alumnos.php");
            }
            else{
                header("Location: http://localhost:8080/formulario/admin/alumnos/alumnos.php?fallo=true");
            }

            ?>