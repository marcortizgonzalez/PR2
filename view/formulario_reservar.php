<!DOCTYPE html>
<html>
<title>RESERVAR MESA</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Formulario de entrada del dato</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<?php


session_start();
if(!empty($_SESSION['email_camarero'])){


$id_mesa=$_REQUEST['id_mesa'];
$capacidad=$_GET['capacidad_mesa'];
$ubicacion_mesa=$_GET['ubicacion_mesa'];


    include 'ver.php';
    include '../services/conexion.php';

    $ubicacion=$pdo->prepare("SELECT DISTINCT ubicacion_mesa FROM tbl_mesas");
    $ubicacion->execute();
    $listaUbicacion=$ubicacion->fetchAll(PDO::FETCH_ASSOC);

    $sql=$pdo->prepare("SELECT * FROM tbl_mesas WHERE id_mesa=?");
    $sql->bindParam(1, $id_mesa);
    $sql->execute(); 

    $listaMesas=$sql->fetchAll(PDO::FETCH_ASSOC);
    foreach($listaMesas as $mesas){ 


?>    
<body>
<a href='vista.php' class='enlace1'><img src="../img/cumback2.png" class="cum"></a>
<center>
    <br>
    <form action="horas_disponibles.php" method="POST" class="caja">

    <div class="form-group">
            <label class="control-label col-sm-2" for="id_mesa">Id:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="id_mesa" name="id_mesa" size="11" value="<?php echo "$id_mesa";?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="capacidad_mesa">Capacidad de la mesa:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="capacidad_mesa" name="capacidad_mesa" size="2" value="<?php echo "$mesas[capacidad_mesa]";?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="ubicacion_mesa">Ubicacion:</label>
            <div class="col-sm-10">
                <input type="text" name='ubicacion_mesa' id='ubicacion_mesa' value="<?php echo "$mesas[ubicacion_mesa]";?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="fecha_reserva">Fecha reserva:</label>
            <div class="col-sm-10">
            <input class="form-control" type="date" name="fecha_reserva" id='fecha_reserva' step="1" min="2021-01-01" max="2028-12-31" value="<?php echo date("Y-m-d");?>">
            </div>
        </div>

        <p>
            <input type="submit" value="Ver horas disponibles">
        </p>
        </p>
    </form>
<?php } 

}else{
    header("Location:../index.php");
}
?>

</center>
</body>
</html>