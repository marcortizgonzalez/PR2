<?php
include '../services/config.php';
include '../services/conexion.php';

$id_camarero=$_REQUEST['id_camarero'];
$nombre_camarero=$_REQUEST['nombre_camarero'];
$apellido_camarero=$_REQUEST['apellido_camarero'];
$email_camarero=$_REQUEST['email_camarero'];
$contra_camarero=$_REQUEST['contra_camarero'];
$img_camarero="../img_camarero/".date('j-m-y')."-".$_FILES['file']['name'];

$stmt = $pdo->prepare("UPDATE tbl_camareros SET nombre_camarero='{$nombre_camarero}', apellido_camarero='{$apellido_camarero}', email_camarero='{$email_camarero}', contra_camarero='{$contra_camarero}' WHERE id_camarero='{$id_camarero}';");
$stmt2 = $pdo->prepare("UPDATE tbl_camareros SET nombre_camarero='{$nombre_camarero}', apellido_camarero='{$apellido_camarero}', email_camarero='{$email_camarero}', contra_camarero='{$contra_camarero}', img_camarero='{$img_camarero}' WHERE id_camarero='{$id_camarero}';");
try{
    if (isset($_POST['guardar'])){
        if(move_uploaded_file($_FILES['file']['tmp_name'],$img_camarero)){
            try{
                    $stmt2->execute();
                if(empty($stmt) && empty($stmt2)){
                    echo 'mal';
                }else{
                    header("location:../view/vercamareros.php");
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
                    header("location:../view/vercamareros.php");
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
