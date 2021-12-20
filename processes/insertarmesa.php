<?php 
include '../services/config.php';
include '../services/conexion.php';


$capacidad_mesa=$_POST['capacidad_mesa'];
$ubicacion_mesa=$_POST['ubicacion_mesa'];


$stmt = $pdo->prepare("INSERT INTO tbl_mesas (capacidad_mesa, ubicacion_mesa) VALUES (:capacidad_mesa, :ubicacion_mesa)" );
// Bind
$stmt->bindParam(':capacidad_mesa', $capacidad_mesa);
$stmt->bindParam(':ubicacion_mesa', $ubicacion_mesa);

// Excecute
//print_r($stmt);
$stmt->execute();
header("Location:../view/veradminmesas.php");


