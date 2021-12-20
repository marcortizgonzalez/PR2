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
    <h1><b>Modificar Camarero</b></h1>
    <br>
    <br>
    <?php
        $id_camarero=$_REQUEST['id_camarero'];

        require_once '../services/config.php';
        require_once '../services/conexion.php';

        $sql=$pdo->prepare("SELECT * FROM tbl_camareros WHERE id_camarero=?");
        $sql->bindParam(1, $id_camarero);
        $sql->execute(); 

        $listaCamareros=$sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaCamareros as $camareros){ 
    ?>
    <form action="../processes/modificar_camarero.php" method="post" enctype="multipart/form-data">

        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" class="form-control" id="id_camarero" name="id_camarero" size="11" value="<?php echo "$id_camarero";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="nombre_camarero">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre_camarero" name="nombre_camarero" size="20" value="<?php echo "$camareros[nombre_camarero]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="apellido_camarero">Apellido:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="apellido_camarero" name="apellido_camarero" size="20" value="<?php echo "$camareros[apellido_camarero]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email_camarero">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email_camarero" name="email_camarero" size="30" value="<?php echo "$camareros[email_camarero]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="contra_camarero">Contraseña:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="contra_camarero" name="contra_camarero" size="32" value="<?php echo "$camareros[contra_camarero]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="img_admin">Foto:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="img_camarero" accept="image/*" name="file">
                <br>
                <?php echo "<td><img style='width:200px;height:200px;' src='{$camareros['img_camarero']}'</td>";?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="button-1" name="guardar" >Guardar</button>
                <a href='vercamareros.php' class='button-2'>Cancelar</a>
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