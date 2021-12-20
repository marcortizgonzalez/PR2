<!DOCTYPE html>
<html>
<title>CREAR ADMINISTRADOR</title>
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
if(!empty($_SESSION['email_admin'])){
?>

<body>
<a href="../view/verusuariosadmin.php"><img src="../img/cumback2.png" class="cum"></a>    
<br>
<center>
    <br>
    <form action="../processes/insertaradmin.php" method="POST" enctype="multipart/form-data" class="caja">
    <h1><b>Crear Admin</b></h1>
    <br>
    <br>
        <div class="form-group">
            <div class="col-sm-10">
                <p>Nombre: </p>
                <input type="text" name="nombre" size="20" required></input>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
        <p>Email: (xxxx@gmail.com) </p>
        <input type="email" name="email" size="30" required></input>
        </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
        <p>Contraseña: (bd4f881f9422e07ed3ee9da1284e4ef3 = qwe12345) </p>
        <input type="text" name="pass" size="32" required></input>
        </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
        <p>Telefono: </p>
        <input type="number" name="telf" size="9" required></input>
        </div>
        </div>

        <div class="form-group">
            <div class="col-sm-10">
        <p>Foto: </p>
        <input class="form-control" type="file" accept="image/*" name="file" id="" width="100%" required></input>
        </div>
        </div>
        <br>
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
    session_unset();
    session_destroy();
}
?>
</html>