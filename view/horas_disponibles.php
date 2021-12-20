<!DOCTYPE html>
<html>
<title>RESERVAR MESA</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Formulario de entrada del dato</title>
    <link rel="stylesheet" type="text/css" href="../css/style-2.css">
</head>

<?php

session_start();
if(!empty($_SESSION['email_admin'])){


$id_mesa=$_REQUEST['id_mesa'];
$capacidad_mesa=$_REQUEST['capacidad_mesa'];
$ubicacion_mesa=$_REQUEST['ubicacion_mesa'];
$fecha_reserva=$_REQUEST['fecha_reserva'];


include 'ver.php';
include '../services/conexion.php';

$horario=$pdo->prepare("SELECT * FROM tbl_horario");
$horario->execute();
$listaHorario=$horario->fetchAll(PDO::FETCH_ASSOC);

$comparar=$pdo->prepare("SELECT id_horario FROM tbl_historial WHERE id_mesa=$id_mesa and fecha_reserva='$fecha_reserva'");
$comparar->execute();
$resultado = $comparar -> fetchAll(PDO::FETCH_ASSOC);

?>
<body>
<a href='vista.php' class='enlace1'><img src="../img/cumback2.png" class="cum"></a>
<center>
    <br>
    <form action="../processes/insertar.php" method="POST" class="caja">

    <div class="form-group">
            <label class="col-sm-2" for="id_mesa">Id:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="id_mesa" name="id_mesa" size="11" value="<?php echo "$id_mesa";?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2" for="capacidad_mesa">Capacidad de la mesa:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="capacidad_mesa" name="capacidad_mesa" size="2" value="<?php echo "$capacidad_mesa";?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2" for="ubicacion_mesa">Ubicacion:</label>
            <div class="col-sm-10">
                <input type="text" name='ubicacion_mesa' id='ubicacion_mesa' value="<?php echo "$ubicacion_mesa";?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="col-sm-2" for="fecha_reserva">Fecha reserva:</label>
            <div class="col-sm-10">
                <input type="text" name='fecha_reserva' id='fecha_reserva' value="<?php echo "$fecha_reserva";?>" readonly>
            </div>
        </div>
    
        <div class="form-group">
            <label class="col-sm-2" for="nombre_usuario">Horas para reservar:</label>
            <div class="col-sm-10">
            <?php echo "<select name='id_horario' id='id_horario'></p>";
        
            foreach($listaHorario as $horario){
                echo "<option value='".$horario['id_horario']."'>|".$horario['id_horario']."| ".$horario['inicio_horario']." - ".$horario['fin_horario']."</option>";
            }
        echo "</select>";
        ?>
        </div>
        </div>
        <div class="form-group">
            <label class="col-sm-2" for="nombre_usuario"><b>Franjas horarias NO disponibles:</b></label>
            <div class="col-sm-10">

            <?php
            foreach($resultado as $comparar){
                if(empty($comparar['id_horario'])){
                    echo "Todo disponible";
                } else {
                    echo "|".$comparar['id_horario']."|";
                }
            }
            ?>
            </div>
        </div>

        <p>
            <input type="submit" value="Reservar">
        </p>
        </p>
    </form>
    <br>
    <br>

</center>
</body>

<?php
}else{
    header("Location:../index.php");
}
?>