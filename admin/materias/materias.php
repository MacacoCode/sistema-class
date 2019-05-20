<?php 

include('../../conexion.php');
include('../../Login/iniciar.php');
 
 ?>


<!DOCTYPE html>
<html>
<head>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
	<link rel="stylesheet" type="text/css" href="../../alumnos.css">
	<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>	
	
	<title>mostrar datos</title>
</head>
<body>
<div id="container">
		<?php include ('../../sidebar.php')?>

		<div id="main">
				<div class="contenedor-tabla"> 
					<h2>Tabla Materias</h2>
					<input type="text" name="search" id="search" class="form-control" placeholder="Buscar en tabla" />  
					<br>
						<table class="tabla" id="buscador">
								<thead>
								<tr>
									<td>Id Materia</td>
									<td>Nombre</td>
									<td>Acciones</td>
										
								</tr>
								</thead>
							<?php 
							$sql="SELECT * from materias";
							$result=mysqli_query($conexion,$sql);

							while($mostrar=mysqli_fetch_array($result)){
								echo "
								<tbody>
								<tr>
								<td>".$mostrar['idmateria']."</td>
								<td>".$mostrar['nombre']."</td>
								

								<td>
								<button >
								<a  href='updatemate.php?rn=$mostrar[idmateria]&sn=$mostrar[nombre]'>Editar</a>
								</button>

								<button >
								<a  href='deletemate.php?pn=$mostrar[idmateria]'>Borrar</a>
								</button>
								</td>
								
								</tr>
								</tbody>";
									
							?>
							
						<?php 
						}
						?>	
                    </table>
				
				</div>
			
			<div class="form col">
			<h2>Registrar</h2>	
				<form action="insertmate.php" method="POST" autocomplete="off">
					<p>ID Materia</p>
					
					<br>
					<input type="text" name="idmateria" placeholder="Id Materia" maxlength="8"  required>
					<p>Nombre</p>
					
					<br>
					<input type="text" name="nombre" placeholder="Nombre" maxlength="45" required>
					
					<br>
					<br>
					<input type="submit" value="Enviar"/>
				</form>
			</div>
	</div>
	</div>


	</body>
	</html>
	<?php include ('../main/searchbar.php')?>