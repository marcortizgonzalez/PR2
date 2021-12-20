<?php


include '../services/config.php';
include '../services/conexion.php';


if (isset($_POST['email']) && isset($_POST['pass'])) {
    require_once '../services/conexion.php';
    session_start();
    $email=$_POST['email'];
    $pass=$_POST['pass'];  
    $stmt = $pdo->prepare("SELECT * FROM tbl_usuarios WHERE email_usuario='$email' and contra_usuario=MD5('{$pass}')");
    $stmt->execute();
    $comprobacion=$stmt->fetchAll(PDO::FETCH_ASSOC);
    try {
        if (!$comprobacion=="") {
            print_r($comprobacion);
            $_SESSION['email']=$email;
            header("location:../view/vistausuarioadmin.php");
        }else { 
            $stmt = $pdo->prepare("SELECT * FROM tbl_camareros WHERE email_camarero='$email' and contra_camarero=MD5('{$pass}')");
            $stmt->execute();
            $comprobacion=$stmt->fetchAll(PDO::FETCH_ASSOC);
            try {
                if (!$comprobacion=="") {
                    print_r($comprobacion);
                    $_SESSION['email']=$email;
                    header("location:../view/vista.php?email=$email");
                }else {
                    header("location: ../view/login.html");
                    //echo '<script language="javascript">alert("Email o contraseña incorrectos");</script>';
                    
                }
            } catch (PDOException $e) {
                echo $e->getMessage();
            }
            
        }
        /*else {
            header("location: ../view/login.html");
            //echo '<script language="javascript">alert("Email o contraseña incorrectos");</script>';
            
        }
        */
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
