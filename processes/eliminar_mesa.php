<?php 
include '../services/config.php';
include '../services/conexion.php';


$id_mesa=$_GET['id_mesa'];

echo $pdo->exec("DELETE FROM tbl_mesas WHERE id_mesa=$id_mesa");
$stmt = $pdo->prepare("DELETE FROM tbl_mesas WHERE id_mesa=?");

$stmt->bindParam(1, $id_mesa);
$stmt->execute();

header("Location:../view/veradminmesas.php");