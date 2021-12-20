<!DOCTYPE html>
<html>
<title>CREAR MESA</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Formulario de entrada del dato</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<?php
    include 'ver.php';
    include '../services/conexion.php';

    session_start();
    if(!empty($_SESSION['email_admin'])){

    $ubicacion=$pdo->prepare("SELECT DISTINCT ubicacion_mesa FROM tbl_mesas");
    $ubicacion->execute();
    $listaUbicacion=$ubicacion->fetchAll(PDO::FETCH_ASSOC);
?>

<body>
<a href="../view/veradminmesas.php"><img src="../img/cumback2.png" class="cum"></a>    
<br>
    <center>
    <br>
    <form action="../processes/insertarmesa.php" method="POST" class="caja">
    <h1><b>Crear Mesa</b></h1>
    <br>
    <br>
        <div class="form-group">
            <div class="col-sm-10">
                <p>Capacidad mesa: </p>
                <input type="number" name="capacidad_mesa" size="2" required></input>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
        <p>Ubicación mesa:</p>
            <?php echo "<select name='ubicacion_mesa'>";
        
            foreach($listaUbicacion as $ubicacion){
                echo "<option value='".$ubicacion['ubicacion_mesa']."'>".$ubicacion['ubicacion_mesa']."</option>";
            }
        echo "</select>";
        ?>
        </div>
        </div>
        <p>
            <input type="submit" value="Enviar">
            <input type="reset" value="Borrar">
        </p>
        </p>
    </form>
    </center>
</body>
<?php
}else{
    header("Location:../index.php");
}
?>
</html>