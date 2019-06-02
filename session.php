<?php
    include('../../validarsesion.php');
    $name=$_SESSION['usuario'];

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <h1>El nombre es: <?php echo $name?></h1>    
</body>
</html>