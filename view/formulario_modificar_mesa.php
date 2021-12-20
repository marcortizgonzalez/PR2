<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Formulario Modificar</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<?php
session_start();
if(!empty($_SESSION['email_admin'])){
?>

<body>
<br>
<center>
<div class="caja">
    <h1><b>Modificar Mesa</b></h1>
    <br>
    <br>
    <?php
        $id_mesa=$_REQUEST['id_mesa'];

        require_once '../services/config.php';
        require_once '../services/conexion.php';

        $ubicacion=$pdo->prepare("SELECT DISTINCT ubicacion_mesa FROM tbl_mesas");
        $ubicacion->execute();
        $listaUbicacion=$ubicacion->fetchAll(PDO::FETCH_ASSOC);

        $sql=$pdo->prepare("SELECT * FROM tbl_mesas WHERE id_mesa=?");
        $sql->bindParam(1, $id_mesa);
        $sql->execute(); 

        $listaMesas=$sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaMesas as $mesas){ 
    ?>
    <form action="../processes/modificar_mesa.php" method="post">

        <div class="form-group">
            <label class="control-label col-sm-2" for="id_usuario">Id:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="id_mesa" name="id_mesa" size="11" value="<?php echo "$id_mesa";?>" readonly>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="nombre_usuario">Capacidad de la mesa:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="capacidad_mesa" name="capacidad_mesa" size="2" value="<?php echo "$mesas[capacidad_mesa]";?>" required>
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email_usuario">Ubicacion:</label>
            <div class="col-sm-10">

                <select name='ubicacion_mesa' id='ubicacion_mesa' value="<?php echo "$mesas[ubicacion_mesa]";?>">
                <?php
                foreach($listaUbicacion as $ubicacion){
                echo "<option value='".$ubicacion['ubicacion_mesa']."'>".$ubicacion['ubicacion_mesa']."</option>";
                }
                echo "</select>";
                ?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="button-1" name="guardar" >Guardar</button>
                <a href='veradminmesas.php' class='button-2'>Cancelar</a>
            </div>
        </div>
    </form>
    <?php } ?>
</center>
</body>
<?php
}else{
    header("Location:../index.php");
    session_unset();
    session_destroy();
}
?>
</html>