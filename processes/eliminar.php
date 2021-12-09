<?php 

include '../services/config.php';
include '../services/conexion.php';
include 'mesa.php';
include 'usuarios.php';


$id_mesa=$_GET['id_mesa'];

$email=$_GET['email_usuario'];


session_start();

$_SESSION['email']=$email;
$stmt = $pdo->prepare("UPDATE tbl_historial SET fin_reserva= CURRENT_TIMESTAMP() WHERE id_mesa={$id_mesa} and isnull(fin_reserva)");
//$stmt = $pdo->prepare("UPDATE tbl_historial SET fin_reserva= CURRENT_TIMESTAMP(), email_usuario= $email WHERE id_mesa={$id_mesa} and isnull(fin_reserva)");
$stmt2 = $pdo->prepare("UPDATE `tbl_mesas` SET `inicio_reserva` = NULL, `fin_reserva` = NULL, `email_usuario`= NULL WHERE id_mesa={$id_mesa}");
try{
    $stmt-> execute();
    $stmt2-> execute();

    if(empty($stmt) && empty($stmt2)){
        echo 'mal';
        
    }else{
        header("location:../view/vista.php");
    }
}catch(PDOException $e){
    echo 'mal';
   echo  $e->getMessage();
}