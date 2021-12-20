<?php
include '../services/config.php';
include '../services/conexion.php';

$id_mesa=$_REQUEST['id_mesa'];
$capacidad_mesa=$_REQUEST['capacidad_mesa'];
$ubicacion_mesa=$_REQUEST['ubicacion_mesa'];

$stmt = $pdo->prepare("UPDATE tbl_mesas SET capacidad_mesa='{$capacidad_mesa}', ubicacion_mesa='{$ubicacion_mesa}' WHERE id_mesa='{$id_mesa}';");
try{
    if(isset($_POST['guardar'])){
        //echo 'bien';
        $stmt->execute();
        //print_r($stmt);
        header("Location:../view/veradminmesas.php");
    }
}catch(PDOException $e){
    //echo 'mal';
    echo 'mal';
    echo  $e->getMessage();
}

