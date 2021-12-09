<?php 
include '../services/config.php';
include '../services/conexion.php';
include 'administrador.php';

$nombre=$_POST['nombre'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$telf=$_POST['telf'];

$stmt = $pdo->prepare("INSERT INTO tbl_usuarios (nombre_usuario, email_usuario, contra_usuario, telf_usuario) VALUES (:nombre, :email, :pass, :telf)" );
// Bind
$stmt->bindParam(':nombre', $nombre);
$stmt->bindParam(':email', $email);
$stmt->bindParam(':pass', $pass);
$stmt->bindParam(':telf', $telf);
// Excecute
$stmt->execute();
header("Location:../view/vistausuarios.php");


