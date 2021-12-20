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


session_start();
if(!empty($_SESSION['email_admin'])){

?>
<a href='../view/vistausuarioadmin.php' class='enlace1'><img src="../img/cumback2.png" class="cum"></a>
<div class='centradotd'>



<h2><b>Administradores</b></h2>

<br>
<br>
<td><a type='button' class='btnhistorial'href='formulario_insertar_admin.php'>Crear</a></td>
</div>

<div class='table-centrada'>
<table class='table'>
<tr>
<th>Id</th>
<th>Nombre</th>
<th>Email</th>
<th>Telf</th>
<th>Foto</th>
<th>Modificar</th>
<th>Eliminar</th>
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
    echo "<td><img style='width:200px;height:200px;' src='{$usuarios['img_usuario']}'</td>";
    if($_SESSION['email_admin']==$usuarios['email_usuario']){
        echo "<td><a></a></td>";
        echo "<td><a></a></td>";
    } else{
        echo "<td><a type='button' class='button-1' href='formulario_modificar_admin.php?id_usuario={$usuarios['id_usuario']}'>Modificar</a></td>";
        echo "<td><a type='button' class='button-2' href='../processes/eliminar_admin.php?id_usuario={$usuarios['id_usuario']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
    }
    
    echo '</tr>';
}

}else{
    header("Location:../index.php");
    session_unset();
    session_destroy();
}
?>

</div>

</body>
</html>
