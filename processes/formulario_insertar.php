<!DOCTYPE html>
<html>
<title>CREAR ADMINISTRADOR</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <title>Formulario de entrada del dato</title>
</head>

<body>
    <br>
    <form action="insertaradmin.php" method="POST">
        <p>Nombre: <input type="text" name="nombre" size="20"></p>
        <p>Email: (xxxx@gmail.com) <input type="email" name="email" size="30"></p>
        <p>Contraseña: (bd4f881f9422e07ed3ee9da1284e4ef3 = qwe12345) <input type="text" name="pass" size="32"></p>
        <p>Telefono: <input type="number" name="telf" size="9"></p>
            <p>
                <input type="submit" value="Enviar">
                <input type="reset" value="Borrar">
            </p>
        </p>
    </form>
</body>
</body>