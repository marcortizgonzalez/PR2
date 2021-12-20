<?php 
include '../services/config.php';
include '../services/conexion.php';


$id_usuario=$_GET['id_usuario'];

echo $pdo->exec("DELETE FROM tbl_usuarios WHERE id_usuario=$id_usuario");
$stmt = $pdo->prepare("DELETE FROM tbl_usuarios WHERE id_usuario=?");

$stmt->bindParam(1, $id_usuario);
$stmt->execute();

header("Location:../view/verusuariosadmin.php");