<?php 
include '../services/config.php';
include '../services/conexion.php';


$id_camarero=$_GET['id_camarero'];

echo $pdo->exec("DELETE FROM tbl_camareros WHERE id_camarero=$id_camarero");
$stmt = $pdo->prepare("DELETE FROM tbl_camareros WHERE id_camarero=?");

$stmt->bindParam(1, $id_camarero);
$stmt->execute();

header("Location:../view/vercamareros.php");