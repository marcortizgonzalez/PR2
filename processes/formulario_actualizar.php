<!DOCTYPE html>
<html>
<title>Formulario Actualizar</title>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Formulario Entrada Registros</title>
</head>

<body>
<div class="crear_persona">
    <h1>Actualizar Mesa</h1>
    <?php
        $id_mesa=$_REQUEST['id_mesa'];

        require_once '../services/config.php';
        require_once '../services/conexion.php';

        $sql=$pdo->prepare("SELECT * FROM tbl_mesas WHERE id_mesa=?");
        $sql->bindParam(1, $id_mesa);
        $sql->execute(); 

        $listaMesas=$sql->fetchAll(PDO::FETCH_ASSOC);
        foreach($listaMesas as $registro){ 
    ?>
    
    <form action="modificar.php" method="POST">
        <div class="form-group">
            <label class="control-label col-sm-2" for="email">Email:</label>
            <div class="col-sm-10">
                <input type="email" class="form-control" id="email" name="email" value="<?php echo "$registro[email]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="nombre">Nombre:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo "$registro[nombre]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="apellido">Apellido:</label>
            <div class="col-sm-10">
                <input type="text" class="form-control" id="apellido" name="apellido" value="<?php echo "$registro[apellido]";?>">
            </div>
        </div>

        <div class="form-group">
            <label class="control-label col-sm-2" for="edad">Edad:</label>
            <div class="col-sm-10">
                <input type="number" class="form-control" id="edad" name="edad" value="<?php echo "$registro[edad]";?>">
            </div>
        </div>
        <div class="form-group">
            <div class="col-sm-offset-2 col-sm-10">
                <button type="submit" class="btn btn-info">Guardar</button>
                <a href='ver.php' class='btn btn-danger'>Cancelar</a>
            </div>
        </div>
    </form>
    <?php } ?>
</body>
</html>