<?php 
include '../services/config.php';
include '../services/conexion.php';


$id_historial=$_GET['id_historial'];

echo $pdo->exec("DELETE FROM tbl_historial WHERE id_historial=$id_historial");
$stmt = $pdo->prepare("DELETE FROM tbl_historial WHERE id_historial=?");

$stmt->bindParam(1, $id_historial);
$stmt->execute();

header("Location:../view/historial_admin.php");