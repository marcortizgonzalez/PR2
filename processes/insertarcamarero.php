<?php 
include '../services/config.php';
include '../services/conexion.php';


$nombre=$_POST['nombre'];
$apellido=$_POST['apellido'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$img_camarero="../img_camarero/".date('j-m-y')."-".$_FILES['file']['name'];



$error=false;
if(move_uploaded_file($_FILES['file']['tmp_name'],$img_camarero)){
    try {
        $stmt = $pdo->prepare("INSERT INTO tbl_camareros (nombre_camarero, apellido_camarero, email_camarero, contra_camarero, img_camarero) VALUES (:nombre, :apellido, :email, :pass, :img_camarero)" );
        // Bind
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':apellido', $apellido);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':img_camarero', $img_camarero);

        // Excecute
        //print_r($stmt);
        $stmt->execute();
        header("Location:../view/vercamareros.php");
        } catch (\Throwable $th) {
            //throw $th;
            echo $th;
            $error=true;
            unlink($img_camarero);
        }
        if ($error) {
        header("Location:../view/vercamareros.php?error=1");
        }else {
        header("Location:../view/vercamareros.php");
        }  
    }else{
        header("Location:../view/vercamareros.php?error=1");
    }


