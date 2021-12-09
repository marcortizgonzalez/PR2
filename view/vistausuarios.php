<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/vista.css">
    <title>VistaUsuarios</title>
</head>
<body>
    
<?php
include 'ver.php';
include '../services/conexion.php';


echo "<div class='centradotd'";
echo "</div>";


echo "<h2><b>Administradores</b></h2>";
echo"<td><a href='../view/enlaces.html' class='enlace1'>Back</a></td>";
echo "<br>";
echo "<br>";
echo "<td><a type='button' class='btn btn-success'href='../processes/formulario_insertar.php'>Crear</a></td>";


echo "<div class='table-centrada'>";
echo "<table class='table'>";
echo "<tr>";
echo "<th>Id</th>";
echo "<th>Nombre</th>";
echo "<th>Email</th>";
echo "<th>Telf</th>";
echo "</tr>";




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

</body>
</html>
