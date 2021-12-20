<?php 

include '../services/config.php';
include '../services/conexion.php';


$id_mesa=$_REQUEST['id_mesa'];
$capacidad_mesa=$_REQUEST['capacidad_mesa'];
$ubicacion_mesa=$_REQUEST['ubicacion_mesa'];
$fecha_reserva=$_REQUEST['fecha_reserva'];
$id_horario=$_REQUEST['id_horario'];


$comparar=$pdo->prepare("SELECT * FROM tbl_historial WHERE id_mesa=$id_mesa and fecha_reserva='$fecha_reserva' and id_horario=$id_horario");
$comparar->execute();
$resultado = $comparar -> fetchAll(PDO::FETCH_ASSOC);



if($comparar -> rowCount() > 0){
    
    header("location:../view/vista.php");
    //echo "Mal";
    //print_r ($comparar);
    //print_r ($comparar -> rowCount());

} else{
    //$stmt2 =$pdo->prepare("INSERT INTO tbl_historial (id_mesa, capacidad_mesa, ubicacion_mesa, fecha_reserva) VALUES ({$id},{$capacidad},'{$ubicacion_mesa}',CURRENT_TIMESTAMP())");
    $stmt =$pdo->prepare("INSERT INTO tbl_historial (id_mesa, capacidad_mesa, ubicacion_mesa, fecha_reserva, id_horario) VALUES ({$id_mesa},{$capacidad_mesa},'{$ubicacion_mesa}','{$fecha_reserva}','{$id_horario}')");
    try{
        $stmt-> execute();
        //print_r ($stmt2);
        if(empty($stmt)){
            echo 'mal';
        }else{
            header("location:../view/vista.php");
            //print_r ($stmt);
            //print_r ($comparar);
            //print_r ($comparar -> rowCount());
            //echo 'Bien';
            //echo $email;
        
        }
    }catch(PDOException $e){
        echo 'mal';
    echo  $e->getMessage();
    }
}