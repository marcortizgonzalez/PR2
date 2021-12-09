<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Enlaces camareros</title>
    <link rel="stylesheet" type="text/css" href="../css/enlaces.css">
</head>

<?php
include 'ver.php';
include '../services/conexion.php';
session_start();
if(!empty($_SESSION['email'])){
?>

    <body>
        <a href='vercamareros.php' class='btnenlace'>Ver camareros</a>
        <br>
        <br>
        <a href='verusuariosadmin.php' class='btnenlace'>Ver usuarios admins</a>
        <br>
        <br>
        <a href='vistausuarioadmin.php' class='btnenlace'>Ver pagina pricipal</a>
    </body>

<?php
}else{
    header("Location:../index.php");
}
?>

</html>