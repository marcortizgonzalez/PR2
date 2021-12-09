<?php
include 'config.php';
include 'conexion.php';
/*$stmt = $pdo->prepare("UPDATE tbl_persona SET name=?, age=? WHERE id=?");
// Bind
$nombre = "Peter";
$edad = 19;
$id=2;
$stmt->bindParam(1, $nombre);
$stmt->bindParam(2, $edad);
$stmt->bindParam(3,$id);
// Excecute
$stmt->execute();*/
$email=$_REQUEST['email'];
$nombre=$_REQUEST['nombre'];
$apellido=$_REQUEST['apellido'];
$edad=$_REQUEST['edad'];
//$alumno=new Alumno($email,$nombre,$apellido, $edad);
$stmt = $pdo->prepare("UPDATE alumnos SET email=:email, nombre=:nombre, apellido=:apellido, edad=:edad WHERE email=:email" );
try{
    if($stmt->execute((array) $alumno)){
        //echo 'bien';
        header("Location:ver.php");
    }
}catch(PDOException $e){
    //echo 'mal';
    echo $e->getMessage();
    header("Location:ver.php");
}

