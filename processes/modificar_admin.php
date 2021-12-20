<?php
include '../services/config.php';
include '../services/conexion.php';

$id_usuario=$_REQUEST['id_usuario'];
$nombre_usuario=$_REQUEST['nombre_usuario'];
$email_usuario=$_REQUEST['email_usuario'];
$contra_usuario=$_REQUEST['contra_usuario'];
$telf_usuario=$_REQUEST['telf_usuario'];
$img_usuario="../img_admin/".date('j-m-y')."-".$_FILES['file']['name'];

$stmt = $pdo->prepare("UPDATE tbl_usuarios SET nombre_usuario='{$nombre_usuario}', email_usuario='{$email_usuario}', contra_usuario='{$contra_usuario}', telf_usuario='{$telf_usuario}' WHERE id_usuario='{$id_usuario}';");
$stmt2 = $pdo->prepare("UPDATE tbl_usuarios SET nombre_usuario='{$nombre_usuario}', email_usuario='{$email_usuario}', contra_usuario='{$contra_usuario}', telf_usuario='{$telf_usuario}', img_usuario='{$img_usuario}' WHERE id_usuario='{$id_usuario}';");
try{
    if (isset($_POST['guardar'])){
        if(move_uploaded_file($_FILES['file']['tmp_name'],$img_usuario)){
            try{
                    $stmt2->execute();
                if(empty($stmt) && empty($stmt2)){
                    echo 'mal';
                }else{
                    header("location:../view/verusuariosadmin.php");
                }
            }catch(PDOException $e){
                echo 'mal';
            echo  $e->getMessage();
            }
        }else{
            try{
                $stmt->execute();
                if(empty($stmt) && empty($stmt2)){
                    echo 'mal';
                }else{
                    header("location:../view/verusuariosadmin.php");
                }
            }catch(PDOException $e){
                echo 'mal';
            echo  $e->getMessage();
            }
        }
    }
}catch(PDOException $e){
    //echo 'mal';
    echo 'mal';
    echo  $e->getMessage();
}

