<?php

$link = mysqli_connect("localhost:3307", "root", "");
 
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

$conn = mysqli_connect("localhost:3307", "root", "", "universidad");

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
    idoferta varchar(10) not null,
    primary key (idoferta),
    nombre varchar(45) not null, 
    tipo enum('pregrado', 'posgrado'),
    idfacultad varchar(10) ,
    foreign key(idfacultad) references facultades(idfacultad)
    )Engine =  innodb;";
 
    if (mysqli_query($conn, $oferta)) {
    } else {
        echo "Error al crear la tabla: " . mysqli_error($conn);
    }    


    //tabla pensum
$pensum= "CREATE table if not exists pensum (
    idpensum varchar(8) not null,
    primary key(idpensum),
    year datetime not null,
    idoferta varchar(10) not null,
    foreign key (idoferta) references oferta_academica(idoferta)
    )Engine= innodb;";
 
if (mysqli_query($conn, $pensum)) {
} else {
    echo "Error al crear la tabla: " . mysqli_error($conn);
}  

    //tabla alumnos 
    $alumnos= "CREATE table if not exists alumnos(
        idalumno varchar(10) not null,
        primary key (idalumno), 
        nombre varchar (45) not null, 
        apellido varchar(45)
        )Engine= innodb;";
     
    if (mysqli_query($conn, $alumnos)) {
    } else {
        echo "Error al crear la tabla: " . mysqli_error($conn);
    }  

       //tabla oferta_alumnos
       $matricula= "CREATE table if not exists oferta_alumnos(
        idoferta varchar(10) not null, 
        idalumno varchar(10) not null, 
        primary key (idoferta, idalumno),
        foreign key (idoferta) references oferta_academica(idoferta),
        foreign key(idalumno) references alumnos(idalumno)
        
        )Engine= innodb;";
     
       if (mysqli_query($conn, $matricula)) {
       } else {
           echo "Error al crear la tabla: " . mysqli_error($conn);
       }  

       //tabla tipo beca 
       $tipobeca= "CREATE table if not exists tipo_beca(
        idtipobeca varchar(5) not null, 
        primary key (idtipobeca),
        nombre varchar (45) not null
        )Engine= innodb;";
     
       if (mysqli_query($conn, $tipobeca)) {
       } else {
           echo "Error al crear la tabla: " . mysqli_error($conn);
       }  

          //tabla beca
    $beca= "CREATE table if not exists beca(
        idbeca varchar(5) not null, 
        primary key (idbeca), 
        porcentaje double not null, 
        idalumno varchar(10) not null, 
        idtipobeca varchar(50) not null, 
        foreign key (idalumno) references alumnos(idalumno),
        foreign key (idtipobeca) references tipo_beca(idtipobeca)
        
        )Engine= innodb;";
     
    if (mysqli_query($conn, $beca)) {
    } else {
        echo "Error al crear la tabla: " . mysqli_error($conn);
    }  
    
       //tabla materias
       $materias= "CREATE table if not exists materias(
        idmateria varchar (5) not null, 
        primary key (idmateria), 
        nombre varchar(45) not null
        )Engine= innodb;";
     
       if (mysqli_query($conn, $materias)) {
       } else {
           echo "Error al crear la tabla: " . mysqli_error($conn);
       }  

          //tabla materias_alumnos
    $materiasalumnos= "CREATE table if not exists materias_alumnos(
        idmateria varchar(5) not null,
        idalumno varchar (10) not null, 
        primary key(idmateria, idalumno),
        foreign key (idmateria) references materias(idmateria),
        foreign key (idalumno) references alumnos(idalumno)
        )Engine= innodb;";
     
    if (mysqli_query($conn, $materiasalumnos)) {
    } else {
        echo "Error al crear la tabla: " . mysqli_error($conn);
    }  

       //tabla horarios
       $horarios= "CREATE table if not exists horarios(
        horainicio time not null, 
        primary key(horainicio),
        horafinal time not null,
        dia varchar(10) not null
        )Engine= innodb;";
     
       if (mysqli_query($conn, $horarios)) {
       } else {
           echo "Error al crear la tabla: " . mysqli_error($conn);
       }  

          //tabla hora materia
    $horamateria= "CREATE table if not exists hora_materia(
        horainicio time not null, 
        idmateria varchar(5) not null, 
        idgrupo varchar (5) not null,
        primary key(horainicio, idmateria),
        foreign key (horainicio) references horarios(horainicio),
        foreign key (idmateria) references materias(idmateria)
        )Engine= innodb;";
     
    if (mysqli_query($conn, $horamateria)) {
    } else {
        echo "Error al crear la tabla: " . mysqli_error($conn);
    }  

       //tabla docentes
       $docentes= "CREATE table if not exists docentes(
        iddocente varchar(10) not null, 
        primary key (iddocente),
        nombre varchar (45) not null,
        apellido varchar(45) not null 
        )Engine= innodb;";
     
       if (mysqli_query($conn, $docentes)) {
       } else {
           echo "Error al crear la tabla: " . mysqli_error($conn);
       }  

          //tabla notas
    $notas= "CREATE table if not exists notas(
        nota double not null ,
        primary key (nota),
        idalumno varchar(10) not null,
        idmateria varchar(5) not null, 
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
        clave varchar(40) not null,
        cargo enum('alumno', 'profesor','admin'),
        primary key (usuario)
        
        )Engine = innodb;";

        if (mysqli_query($conn, $login)) {
        } else {
       echo "Error al crear la tabla: " . mysqli_error($conn);
        }  

       //tabla materias docentes
       $materiasdocentes= "CREATE table if not exists materia_docente(
        idmateria varchar(5) not null, 
        iddocente varchar(10) not null, 
        idgrupo varchar (5) not null,
        primary key (idmateria, iddocente),
        foreign key (idmateria) references materias(idmateria),
        foreign key (iddocente) references docentes(iddocente)
        
        )Engine= innodb;";
     
       if (mysqli_query($conn, $materiasdocentes)) {
       } else {
           echo "Error al crear la tabla: " . mysqli_error($conn);
       }  



        //Creacion cuenta admin 
       $admin= "INSERT into login (usuario, clave, cargo) values ('admin','root', 'admin');";
     
       if (mysqli_query($conn, $admin)) {
       } else {
           echo "Error poner el registro" . mysqli_error($conn);
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
        $borrarcuentas= "
        
        CREATE trigger borrar_alumnos after delete on alumnos
        for each row
        begin
        delete from login where usuario = old.idalumno;
        
        END;
        ";
     
       if (mysqli_query($conn, $borrarcuentas)) {
       } else {
           echo "Error al crear la tabla: " . mysqli_error($conn);
       }  

    
        //trigger para insertar profesores en la tabla docentes
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

       header("Location: http://localhost:8080/formulario/Login/login.php");

 
// Close connection
mysqli_close($link);
	
?>