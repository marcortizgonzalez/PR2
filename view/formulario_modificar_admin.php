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
    <h1><b>Modificar Usuario</b></h1>
    <br>
    <br>
    <?php
        $id_usuario=$_REQUEST['id_usuario'];

        require_once '../services/config.php';
        require_once '../services/conexion.php';

        $sql=$pdo->prepare("SELECT * FROM tbl_usuarios WHERE id_usuario=?");
        $sql->bindParam(1, $id_usuario);
        $sql->execute(); 

        $listaUsuarios=$sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaUsuarios as $usuarios){ 
    ?>
    <form action="../processes/modificar_admin.php" method="post" enctype="multipart/form-data" >

        <div class="form-group">
            <div class="col-sm-10">
                <input type="hidden" class="form-control" id="id_usuario" name="id_usuario" size="11" value="<?php echo "$id_usuario";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="nombre_usuario">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre_usuario" name="nombre_usuario" size="20" value="<?php echo "$usuarios[nombre_usuario]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="email_usuario">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email_usuario" name="email_usuario" size="30" value="<?php echo "$usuarios[email_usuario]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="contra_usuario">Contraseña:</label>
            <div class="col-sm-10">
                <input type="password" class="form-control" id="contra_usuario" name="contra_usuario" size="32" value="<?php echo "$usuarios[contra_usuario]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="telf_usuario">Telf:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="telf_usuario" name="telf_usuario" size="9" value="<?php echo "$usuarios[telf_usuario]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="img_admin">Foto:</label>
            <div class="col-sm-10">
                <input type="file" class="form-control" id="img_admin" accept="image/*" name="file">
                <br>
                <?php echo "<td><img style='width:200px;height:200px;' src='{$usuarios['img_usuario']}'</td>";?>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="button-1" name="guardar" >Guardar</button>
                <a href='verusuariosadmin.php' class='button-2'>Cancelar</a>
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