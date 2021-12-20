<?php 
include '../services/config.php';
include '../services/conexion.php';


$nombre=$_POST['nombre'];
$email=$_POST['email'];
$pass=$_POST['pass'];
$telf=$_POST['telf'];
$img_usuario="../img_admin/".date('j-m-y')."-".$_FILES['file']['name'];

$error=false;
if(move_uploaded_file($_FILES['file']['tmp_name'],$img_usuario)){
    try {
        $stmt = $pdo->prepare("INSERT INTO tbl_usuarios (nombre_usuario, email_usuario, contra_usuario, telf_usuario, img_usuario) VALUES (:nombre, :email, :pass, :telf, :img_usuario)" );
        // Bind
        $stmt->bindParam(':nombre', $nombre);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':pass', $pass);
        $stmt->bindParam(':telf', $telf);
        $stmt->bindParam(':img_usuario', $img_usuario);
        // Excecute
        $stmt->execute();
        header("Location:../view/verusuariosadmin.php");
    } catch (\Throwable $th) {
        //throw $th;
        echo $th;
        $error=true;
        unlink($img_usuario);
    }
    if ($error) {
       header("Location:../view/verusuariosadmin.php?error=1");
    }else {
       header("Location:../view/verusuariosadmin.php");
    }  
   }else{
       header("Location:../view/verusuariosadmin.php?error=1");
   }

