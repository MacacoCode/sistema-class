<?php
include('../conexion.php');

include('../Login/iniciar.php');
//session_start();
error_reporting(0);
$usuario = $_SESSION['usuario'];
$clave=$_SESSION['clave'];

?>


<html>
    <head>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../estilo.css">
    <link rel="stylesheet" type="text/css" href="../pop-up.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
    </head>
    <body >

    <div class="container">
    
    </div>
        <h1 id="h1conf">Cambiar contraseña</h1>
        <br>
    <div class="form col" >
    <form action="" method="POST" autocomplete="off"  >
		<p>Usuario</p>
		<br>
        <input type="text" name="usuario"  maxlength="8" required value="<?php echo $usuario; ?>" DISABLED >
        
		<p>Contraseña</p>
		<br>
        <input type="password" name="clave" minlength="8" placeholder="Ingrese nueva contraseña" maxlength="10" required="required" >
        <br>
        <br>
        <input type="password" name="claverep" minlength="8" placeholder="Repita la contraseña" maxlength="10" required="required">
        <br>
		<br>
		<div class="pop-up">
			<div >
				<p>¿Esta seguro?</p>
				<input type="submit" name="submit" value="Confirmar"/>
					
				<br>
				<input class= "pop-up-cancel" type="button" value="Cancelar">
			</div>
		</div>
    </form>
    <button class="pop-up-activate">Actualizar</button>
    </div>
        <?php
          $newclave = $_POST['clave'];
          $confirmacion = $_POST['claverep'];
        if ($newclave == $confirmacion)
        {
                
                if($_POST['submit'])
                {
                    
                    $newclave = $_POST['clave'];
                

                    $query ="UPDATE login SET  clave= '$newclave' WHERE usuario='$usuario' ";
                    $data = mysqli_query($conexion, $query);
                    if($data)
                    {
                        header("Location: http://localhost:8080/formulario/Login/login.php");
                    }
                    else{
                        header("Location: http://localhost:8080/formulario/Login/login.php");
                    }
                }
        }
        else {
            header("Location: http://localhost:8080/formulario/admin/cambiarclave.php?fallo=true");
        }
      
        ?>

    <?php
       if(isset($_GET["fallo"]) && $_GET["fallo"] == 'true')
       {
          echo "
            <div class='pop-up-error'>
                <div>
                    <p>Las Contraseñas No Coinciden</p>
                    <button><a class='pop-up-cancel' href='cambiarclave.php'>Confirmar</a></button>
                </div>
            </div> ";
       }
     ?>
        <style>
        body{
            background-color:rgb(21, 32, 43);
        }
        </style>    
        
    </body>
    <script src="../pop-up.js"></script>
</html>