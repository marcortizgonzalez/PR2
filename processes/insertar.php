<?php 

include '../services/config.php';
include '../services/conexion.php';
include 'mesa.php';
include 'usuarios.php';

$id=$_GET['id_mesa'];
$capacidad=$_GET['capacidad_mesa'];
$ubicacion_mesa=$_GET['ubicacion_mesa'];
$email=$_GET['email_usuario'];


session_start();

$_SESSION['email']=$email;
$stmt = $pdo->prepare("UPDATE tbl_mesas SET inicio_reserva= CURRENT_TIMESTAMP(), email_usuario='{$email}' WHERE id_mesa=$id");
//$stmt2 =$pdo->prepare("INSERT INTO tbl_historial (id_mesa, capacidad_mesa, ubicacion_mesa, inicio_reserva) VALUES ({$id},{$capacidad},'{$ubicacion_mesa}',CURRENT_TIMESTAMP())");
$stmt2 =$pdo->prepare("INSERT INTO tbl_historial (id_mesa, capacidad_mesa, ubicacion_mesa, inicio_reserva, fin_reserva, email_usuario) VALUES ({$id},{$capacidad},'{$ubicacion_mesa}',CURRENT_TIMESTAMP(),NULL,'{$email}')");
try{
    $stmt-> execute();
    $stmt2-> execute();
    //print_r ($stmt2);
    if(empty($stmt) && empty($stmt2)){
        echo 'mal';
    }else{
        header("location:../view/vista.php");
        //echo 'hola';
        //echo $email;
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}