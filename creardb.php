<?php

$link = mysqli_connect("uni.crxav7eabiql.us-east-2.rds.amazonaws.com:3306", "admin", "0011202001");
 
// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
 
//creacion base de datos
$base = "CREATE DATABASE IF NOT EXISTS universidad";
if(mysqli_query($link, $base)){
    
} else{
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($link);
}

$conn = mysqli_connect("uni.crxav7eabiql.us-east-2.rds.amazonaws.com:3306", "admin", "0011202001", "universidad");

//tabla facultades
$facultades= "CREATE table if not exists facultades(
    idfacultad varchar(10) not null,
    primary key(idfacultad),
    nombre_facultad varchar (45) not null
    )Engine= innodb;";  
 
    if (mysqli_query($conn, $facultades)) {
    } else {
        echo "Error al crear la tabla: " . mysqli_error($conn);
    }

//tabla oferta
$oferta= "CREATE table if not exists oferta_academica(
    idcarrera MEDIUMINT NOT NULL AUTO_INCREMENT,
    idoferta varchar(10) not null,
    nombre varchar(45) not null, 
    primary key (idcarrera, nombre),
    tipo enum('Pregrado', 'Posgrado'),
    idfacultad varchar(10) ,
    foreign key(idfacultad) references facultades(idfacultad)
    )Engine =  innodb;";
 
    if (mysqli_query($conn, $oferta)) {
    } else {
        echo "Error al crear la tabla: " . mysqli_error($conn);
    }    




 //tabla coordinadores 
 $coord= "CREATE table if not exists coordinadores(
    idcoordinador varchar(10) not null, 
    nombre varchar (45) not null, 
    segundoNombre varchar(45),
        apellido varchar(45) not null,
        segundoApellido varchar(45) not null,
        sexo enum('Masculino','Femenino','Indefinido') not null,
        correo varchar (45) not null,
        telefono varchar(11) not null ,
    idcarrera mediumint not null,
    primary key (idcoordinador,idcarrera),
    foreign key (idcarrera) references oferta_academica(idcarrera)
    )Engine= innodb;";
 
if (mysqli_query($conn, $coord)) {
} else {
    echo "Error al crear la tabla: " . mysqli_error($conn);
}  


    //tabla alumnos 
    $alumnos= "CREATE table if not exists alumnos(
        idalumno varchar(10) not null,
        primary key (idalumno), 
        nombre varchar (45) not null,
        segundoNombre varchar (45), 
        apellido varchar(45) not null,
        segundoApellido varchar (45) not null,
        sexo enum('Masculino','Femenino','Indefinido') not null,
        correo varchar (45) not null,
        telefono varchar(11) not null,
        activo mediumint default 1
        )Engine= innodb;";
     
    if (mysqli_query($conn, $alumnos)) {
    } else {
        echo "Error al crear la tabla: " . mysqli_error($conn);
    }  

       //tabla oferta_alumnos
       $matricula= "CREATE table if not exists oferta_alumnos(
        idcarrera mediumint not null,
        idalumno varchar(10) not null, 
        primary key (idcarrera, idalumno),
        foreign key (idcarrera) references oferta_academica(idcarrera),
        foreign key(idalumno) references alumnos(idalumno)
        
        )Engine= innodb;";
     
       if (mysqli_query($conn, $matricula)) {
       } else {
           echo "Error al crear la tabla: " . mysqli_error($conn);
       }  

     
    
       //tabla materias
       $materias= "CREATE table if not exists materias(
        idmateria MEDIUMINT NOT NULL AUTO_INCREMENT,
        codigo varchar (5) not null,
        prerequisito MEDIUMINT, 
        nombre varchar(45) not null,
        primary key (idmateria, nombre) 
        )Engine= innodb;";
     
       if (mysqli_query($conn, $materias)) {
       } else {
           echo "Error al crear la tabla: " . mysqli_error($conn);
       }  

        

          //tabla materias_alumnos
            $materiasalumnos= "CREATE table if not exists materias_alumnos(
                idmateria MEDIUMINT not null,
                idalumno varchar (10) not null, 
                idgrupo varchar(5) not null,
                primary key(idmateria, idalumno),
                foreign key (idmateria) references materias(idmateria),
                foreign key (idalumno) references alumnos(idalumno)
                )Engine= innodb;";
            
            if (mysqli_query($conn, $materiasalumnos)) {
            } else {
                echo "Error al crear la tabla: " . mysqli_error($conn);
            }  

        

          //tabla hora materia
    $horamateria= "CREATE table if not exists hora_materia(
        horainicio TIME not null,
        horfinal TIME not null, 
        idmateria MEDIUMINT not null, 
        idgrupo varchar (5) not null,
        dia varchar(12) not null,
        aula varchar(5) not null,   
        primary key(idgrupo, idmateria, dia),
        foreign key (idmateria) references materias(idmateria)
        )Engine= innodb;";
     
    if (mysqli_query($conn, $horamateria)) {
    } else {
        echo "Error al crear la tabla: " . mysqli_error($conn);
    }  

       //tabla docentes
       $docentes= "CREATE table if not exists docentes(
        iddocente varchar(15) not null, 
        primary key (iddocente),
        nombre varchar (45) not null,
        segundoNombre varchar(45),
        apellido varchar(45) not null,
        segundoApellido varchar(45) not null,
        sexo enum('Masculino','Femenino','Indefinido') not null,
        correo varchar (45) not null,
        telefono varchar(11) not null 
        )Engine= innodb;";
     
       if (mysqli_query($conn, $docentes)) {
       } else {
           echo "Error al crear la tabla: " . mysqli_error($conn);
       }  

          //tabla notas
    $notas= "CREATE table if not exists notas(
        nota double default null,
        idalumno varchar(10) not null,
        idmateria MEDIUMINT not null,
        idgrupo varchar(5) not null, 
        primary key (idalumno,idmateria),
        foreign key (idalumno) references alumnos(idalumno),
        foreign key (idmateria) references materias(idmateria)
        )Engine= innodb;";
     
    if (mysqli_query($conn, $notas)) {
    } else {
        echo "Error al crear la tabla: " . mysqli_error($conn);
    }  

        //tabla login
       $login = "CREATE table if not exists login(
        usuario varchar(50) not null,
        clave varchar(150) not null,
        cargo enum('alumno', 'profesor','admin','coord'),
        primary key (usuario)
        
        )Engine = innodb;";

        if (mysqli_query($conn, $login)) {
        } else {
       echo "Error al crear la tabla: " . mysqli_error($conn);
        }  

       //tabla materias docentes
       $materiasdocentes= "CREATE table if not exists materia_docente(
        idmateria MEDIUMINT not null, 
        iddocente varchar(15) not null, 
        idgrupo varchar (5) not null,
        primary key (idmateria,idgrupo),
        foreign key (idmateria) references materias(idmateria),
        foreign key (iddocente) references docentes(iddocente)
        
        )Engine= innodb;";
     
       if (mysqli_query($conn, $materiasdocentes)) {
       } else {
           echo "Error al crear la tabla: " . mysqli_error($conn);
       }  
                //tabla pensum
        $pensum= "CREATE table if not exists pensum (
            idcarrera MEDIUMINT not null,
            semestre enum('Semestre I', 'Semestre II', 'Semestre III') not null,
            idmateria mediumint not null,
            primary key(semestre, idmateria, idcarrera),
            foreign key (idmateria) references materias(idmateria),
            foreign key (idcarrera) references oferta_academica(idcarrera)
            )Engine= innodb;";
        
        if (mysqli_query($conn, $pensum)) {
        } else {
            echo "Error al crear la tabla: " . mysqli_error($conn);
        }  

      
       /*TRIGGERSSS*/ 

          //trigger para insertar coordinadores en la tabla login
          $cuentacoord= "
    
          CREATE trigger cuenta_coord after insert on coordinadores
          for each row
          begin
          insert into login(usuario, clave, cargo) values (new.idcoordinador, '12345678', 'coord');
          
          END ;
         ";
         
         if (mysqli_query($conn, $cuentacoord)) {
      } else {
          echo "Error al crear la tabla: " . mysqli_error($conn);
      }  
  
  
  
          //trigger para borrar cuentas de coordinadores -->login 
          $borrarcoor= "
          
          CREATE trigger borrar_coord after delete on coordinadores
          for each row
          begin
          delete from login where usuario = old.idcoordinador;
          
          END;
          ";
       
         if (mysqli_query($conn, $borrarcoor)) {
         } else {
             echo "Error al crear la tabla: " . mysqli_error($conn);
         }  

    
       //trigger para insertar alumnos en la tabla login
       $cuentaalumnos= "
    
        CREATE trigger cuentas_alumnos after insert on alumnos
        for each row
        begin
        insert into login(usuario, clave, cargo) values (new.idalumno, '12345678', 'alumno');
        
        END ;
       ";
       
       if (mysqli_query($conn, $cuentaalumnos)) {
    } else {
        echo "Error al crear la tabla: " . mysqli_error($conn);
    }  

    
          //trigger para borrar cuentas de alumnos -->login 
          $borraralumnos= "
          
          CREATE trigger borrar_alumnos after delete on alumnos
          for each row
          begin
          delete from login where usuario = old.idalumno;
          
          END;
          ";
       
         if (mysqli_query($conn, $borraralumnos)) {
         } else {
             echo "Error al crear la tabla: " . mysqli_error($conn);
         }  

    
        //trigger para insertar profesores en la tabla login
        $cuentaprofes= "
        CREATE trigger cuentas_docentes after insert on docentes
        for each row
        begin
        insert into login(usuario, clave, cargo) values (new.iddocente, '12345678', 'profesor');

        END;
        ";
     
       if (mysqli_query($conn, $cuentaprofes)) {
       } else {
           echo "Error al crear la tabla: " . mysqli_error($conn);
       }  

       //trigger para borrar cuentas de docentes -->login 
       $borrardocentes= "
        
       CREATE trigger borrar_docentes after delete on docentes
       for each row
       begin
       delete from login where usuario = old.iddocente;
       
       END;
       ";
    
      if (mysqli_query($conn, $borrardocentes)) {
      } else {
          echo "Error al crear la tabla: " . mysqli_error($conn);
      }  

      //trigger para meter alumnos en tabla notas    
      $notas= "
        
      CREATE trigger notasAlumnos after insert on materias_alumnos
      for each row
      begin
      insert into notas( idalumno, idmateria, idgrupo) values (new.idalumno, new.idmateria, new.idgrupo);

      
      END;
      ";
   
     if (mysqli_query($conn, $notas)) {
     } else {
         echo "Error al crear la tabla: " . mysqli_error($conn);
     }  

    

      
 
 



       header("Location: http://localhost:8080/formulario/Login/login.php");

 
// Close connection
mysqli_close($link);
	
?>
