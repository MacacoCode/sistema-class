<?php 

include('../../conexion.php');
include('../../Login/iniciar.php');

include('../../validarsesion.php');
$usuario = $_SESSION['usuario']; 
validaradmin($usuario,$conexion);

?>


<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
<link rel="stylesheet" type="text/css" href="../../alumnos.css">
<link rel="stylesheet" type="text/css" href="../../pop-up.css">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	

<title>Reportes</title>
</head>
<body background-color: #fff>
<div id="container">
        <?php include ('../../sidebar.php')?>

    <div id="main">
   
    <div class="form col">
				<h2>Cambiar clave</h2>	
				<form action="updateclave.php" method="POST" autocomplete="off" pattern="\S">
					<p>Usuario</p>
					
					<br>
					<input type="text" name="usuario" placeholder="Usuario" maxlength="15" required >
                    <br>
                    <br>
                    <button class="pop-up-activate">Actualizar</button>
            <div class="pop-up">
			    <div >
				<p>¿Esta seguro?</p>
				<input type="submit" name="submit" value="Confirmar"/>
					
				<br>
                <input class= "pop-up-cancel" type="button" value="Cancelar">
                </div>
            </div>
            </form>
           
					
			
</body>
</html>

<?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
					<p>Nueva contraseña: 12345678</p>
                    <input class='pop-up-cancel' type='button' value='Aceptar'>
                </div>
            </div> ";
       }
    ?>