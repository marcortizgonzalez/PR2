<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camareros</title>
    <link rel="stylesheet" type="text/css" href="../css/vista.css">
</head>
<body>

<?php
include 'ver.php';
include '../services/conexion.php';
?>

<h2><b>Camareros</b></h2>
<div class="filtrado">
    <form action="vistacamareros.php" method="post">
        <input class="filtradobtn2" type="text" placeholder="Nombre" name="nombre_filtro">
        <input class="filtradobtn2" type="text" placeholder="Apellido" name="apellido_filtro">
        <input class="filtradobtn" type="submit" value="Filtrar" name="filtrar">
    </form>
</div>



<div class='centradotd'>
<td><a href='../view/vistausuarioadmin.php' class='enlace1'>Back</a></td>
</div>

<div class='table-centrada'>
<table class='table'>
<tr>
<th>Id</th>
<th>Nombre</th>
<th>Apellido</th>
<th>Email</th>
</tr>

<?php
  
if(isset($_POST['filtrar'])){
    $nombre_filtro=$_POST['nombre_filtro'];
    $apellido_filtro=$_POST['apellido_filtro'];

    //Filtrar apellido
    if(empty($nombre_filtro=$_POST['nombre_filtro']) && !empty($apellido_filtro=$_POST['apellido_filtro'])){
        $select=$pdo->prepare("SELECT * FROM tbl_camareros WHERE apellido_camarero LIKE '%{$apellido_filtro}%'");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_camarero']}</b></td>";
            echo "<td>{$filtro['nombre_camarero']}</td>";
            echo "<td>{$filtro['apellido_camarero']}</td>";  
            echo "<td>{$filtro['email_camarero']}</td>";
            echo '</tr>';
        }

    //Filtrar nombre 
    }elseif (!empty($nombre_filtro=$_POST['nombre_filtro']) && empty($apellido_filtro=$_POST['apellido_filtro'])){
            $select=$pdo->prepare("SELECT * FROM tbl_camareros WHERE nombre_camarero LIKE '%{$nombre_filtro}%'");
            $select->execute();
            $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
            //------------
            foreach ($listaFiltro as $filtro) {
                echo "<tr>";
                echo "<td><b>{$filtro['id_camarero']}</b></td>";
                echo "<td>{$filtro['nombre_camarero']}</td>";
                echo "<td>{$filtro['apellido_camarero']}</td>";  
                echo "<td>{$filtro['email_camarero']}</td>";
                echo '</tr>';
            }
    //Filtrar dos parametros
    }elseif (!empty($nombre_filtro=$_POST['nombre_filtro']) && !empty($apellido_filtro=$_POST['apellido_filtro'])){
        $select=$pdo->prepare("SELECT * FROM tbl_camareros WHERE nombre_camarero LIKE '%{$nombre_filtro}%' and apellido_camarero LIKE '%{$apellido_filtro}%'");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_camarero']}</b></td>";
            echo "<td>{$filtro['nombre_camarero']}</td>";
            echo "<td>{$filtro['apellido_camarero']}</td>";  
            echo "<td>{$filtro['email_camarero']}</td>";
            echo '</tr>';
        }

    //Filtrar sin parametros
    }else{
        $select=$pdo->prepare("SELECT * FROM tbl_camareros");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_camarero']}</b></td>";
            echo "<td>{$filtro['nombre_camarero']}</td>";
            echo "<td>{$filtro['apellido_camarero']}</td>";  
            echo "<td>{$filtro['email_camarero']}</td>";
            echo '</tr>';
        }
    }
} else {
$select=$pdo->prepare("SELECT * FROM tbl_camareros");
$select->execute();
$listaCamareros=$select->fetchAll(PDO::FETCH_ASSOC);

foreach ($listaCamareros as $camarero) {
    echo "<tr>";
    echo "<td><b>{$camarero['id_camarero']}</b></td>";
    echo "<td>{$camarero['nombre_camarero']}</td>";
    echo "<td>{$camarero['apellido_camarero']}</td>";  
    echo "<td>{$camarero['email_camarero']}</td>";
    echo '</tr>';
}

}


?>

</body>
</html>

