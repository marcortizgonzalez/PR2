<!DOCTYPE html>
<html>
<title>CREAR CAMAREROS</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Formulario de entrada del dato</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
</head>

<body>
<a href="../view/vercamareros.php"><img src="../img/cumback2.png" class="cum"></a>    
<br>
<center>
    <br>
    <form action="../processes/insertarcamarero.php" method="POST" enctype="multipart/form-data" class="caja">
    <h1><b>Crear Camarero</b></h1>
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
        <p>Apellido: </p>
            <input type="text" name="apellido" size="20" required></input>
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
        <p>Foto: </p>
            <input class="form-control" type="file" accept="image/*" name="file" id="" width="100%" required></input>
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
