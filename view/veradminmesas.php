<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/vista.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="../js/modalbox.js"></script>
    <script src="../js/vista.js"></script>
</head>
<body>

<?php


include 'ver.php';
include '../services/conexion.php';

session_start();
if(!empty($_SESSION['email_admin'])){

?>
<a href='../view/vistausuarioadmin.php' class='enlace1'><img src="../img/cumback2.png" class="cum"></a>
<h2><b>Administración de mesas</b></h2>

<?php
    $ubicacion=$pdo->prepare("SELECT DISTINCT ubicacion_mesa FROM tbl_mesas");
    $ubicacion->execute();
    $listaUbicacion=$ubicacion->fetchAll(PDO::FETCH_ASSOC);
?>

<div class='centradotd'>

<br>
<br>
<td><a type='button' class='btnhistorial'href='formulario_insertar_mesa.php'>Crear</a></td>
</div>

<div class="filtrado">
    <form action="veradminmesas.php" method="post">
        <input class="filtradobtn2" type="text" placeholder="Capacidad mesa" name="capacidad_mesa">
        <?php
        echo "<select name='ubicacion_mesa'>";
        echo "<option value='%%'>Ubicación</option>";
            foreach($listaUbicacion as $ubicacion){
                echo "<option value='".$ubicacion['ubicacion_mesa']."'>".$ubicacion['ubicacion_mesa']."</option>";
            }
        echo "</select>";
        ?>
        <input class="filtradobtn" type="submit" value="Filtrar" name="filtrar">
    </form>
</div>


<div class='table-centrada'>
<table class='table'>
<tr>
<th>Nº Mesa</th>
<th>Capacidad</th>
<th>Ubicación</th>
<th>Modificar</th>
<th>Eliminar</th>
</tr>

<?php
//Con filtro
if(isset($_POST['filtrar'])){
    $capacidad=$_POST['capacidad_mesa'];
    $ubicacion=$_POST['ubicacion_mesa'];
    //var_dump($capacidad);
    //var_dump($ubicacion);
    //Filtrar solo por ubicacion
    //------------
    if(empty($capacidad=$_POST['capacidad_mesa']) && !empty($ubicacion=$_POST['ubicacion_mesa'])){
    $select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE ubicacion_mesa LIKE '%{$ubicacion}%'");
    $select->execute();
    $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
    //------------
    foreach ($listaFiltro as $filtro) {
        echo "<tr>";
        echo "<td><b>{$filtro['id_mesa']}</b></td>";
        echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
        echo "<td>{$filtro['ubicacion_mesa']}</td>";
        echo "<td><a type='button' class='button-1' href='formulario_modificar_mesa.php?id_mesa={$filtro['id_mesa']}'>Modificar</a></td>";
        echo "<td><a type='button' class='button-2' href='../processes/eliminar_mesa.php?id_mesa={$filtro['id_mesa']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
        echo '</tr>';
    }
    //Filtrar solo por capacidad    
    }elseif(!empty($capacidad=$_POST['capacidad_mesa']) && empty($ubicacion=$_POST['ubicacion_mesa'])){
            //------------    
            $select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE capacidad_mesa>=$capacidad");
            //$select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE capacidad_mesa>='{$capacidad}' order by capacidad_mesa DESC");
            $select->execute();
            $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
            //------------
            foreach ($listaFiltro as $filtro) {
                echo "<tr>";
                echo "<td><b>{$filtro['id_mesa']}</b></td>";
                echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
                echo "<td>{$filtro['ubicacion_mesa']}</td>";
                echo "<td><a type='button' class='button-1' href='formulario_modificar_mesa.php?id_mesa={$filtro['id_mesa']}'>Modificar</a></td>";
                echo "<td><a type='button' class='button-2' href='../processes/eliminar_mesa.php?id_mesa={$filtro['id_mesa']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
                echo '</tr>';
            }
    //Filtrar teniendo los 2 parametros
    }elseif(!empty($capacidad=$_POST['capacidad_mesa']) && !empty($ubicacion=$_POST['ubicacion_mesa'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE ubicacion_mesa LIKE '%{$ubicacion}%' and capacidad_mesa=$capacidad");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_mesa']}</b></td>";
            echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
            echo "<td>{$filtro['ubicacion_mesa']}</td>";
            echo "<td><a type='button' class='button-1' href='formulario_modificar_mesa.php?id_mesa={$filtro['id_mesa']}'>Modificar</a></td>";
            echo "<td><a type='button' class='button-2' href='../processes/eliminar_mesa.php?id_mesa={$filtro['id_mesa']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
            echo '</tr>';
        }
    }
    //Filtrar sin añadir parametros
    }else{
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_mesas");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_mesa']}</b></td>";
            echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
            echo "<td>{$filtro['ubicacion_mesa']}</td>";
            echo "<td><a type='button' class='button-1' href='formulario_modificar_mesa.php?id_mesa={$filtro['id_mesa']}'>Modificar</a></td>";
            echo "<td><a type='button' class='button-2' href='../processes/eliminar_mesa.php?id_mesa={$filtro['id_mesa']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
            echo '</tr>';
        }
    }
}else{
    header("Location:../index.php");
}
?>
</body>
</html>