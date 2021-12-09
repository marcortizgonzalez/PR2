<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/vista.css">
    <title>VistaUsuariosAdmins</title>
</head>
<body>
    
<?php
include 'ver.php';
include '../services/conexion.php';
?>

<div class='centradotd'>


<h2><b>Administradores</b></h2>
<td><a href='../view/vistausuarioadmin.php' class='enlace1'>Back</a></td>
<br>
<br>
<td><a type='button' class='btn btn-success'href='../processes/formulario_insertar.php'>Crear</a></td>
</div>

<div class='table-centrada'>
<table class='table'>
<tr>
<th>Id</th>
<th>Nombre</th>
<th>Email</th>
<th>Telf</th>
</tr>

<?php


$select=$pdo->prepare("SELECT * FROM tbl_usuarios");
$select->execute();
$listaUsuarios=$select->fetchAll(PDO::FETCH_ASSOC);

foreach ($listaUsuarios as $usuarios) {
    echo "<tr>";
    echo "<td><b>{$usuarios['id_usuario']}</b></td>";
    echo "<td>{$usuarios['nombre_usuario']}</td>";
    echo "<td>{$usuarios['email_usuario']}</td>";
    echo "<td>{$usuarios['telf_usuario']}</td>";  
    echo '</tr>';
}

?>
</div>

</body>
</html>
