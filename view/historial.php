<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Historial Proyecto RICK-DECKARD21</title>

    <link rel="stylesheet" type="text/css" href="../css/historial.css">
</head>
<body>
<a href="../view/vista.php"><img src="../img/cumback2.png" class="cum"></a>    
<br>
    <div>
        <h1 class="queso">Historial</h1>

    </div>
<?php
include 'ver.php';
include '../services/conexion.php';

session_start();

if(!empty($_SESSION['email'])){

?>
<br>

<?php
    $ubicacion=$pdo->prepare("SELECT DISTINCT ubicacion_mesa FROM tbl_mesas");
    $ubicacion->execute();
    $listaUbicacion=$ubicacion->fetchAll(PDO::FETCH_ASSOC);
?>

<div class="filtrado">
    <form action="historial.php" method="post">
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

<?php

echo "<br>";
echo "<div class='table-centrada'>";
echo "<table class='table'>";
echo "<tr>";
echo "<th>Id historial</th>";
echo "<th>Nº mesa</th>";
echo "<th>Capacidad</th>";
echo "<th>Ubicación</th>";
echo "<th>Fecha de inicio</th>";
echo "<th>Fecha de fin</th>";
echo "<th>Reservado por</th>";
echo "</tr>";

//Con filtro
if(isset($_POST['filtrar'])){
    $capacidad=$_POST['capacidad_mesa'];
    $ubicacion=$_POST['ubicacion_mesa'];
    //var_dump($capacidad);
    //var_dump($ubicacion);
    //Filtrar solo por ubicacion
    //------------
    if(empty($capacidad=$_POST['capacidad_mesa']) && !empty($ubicacion=$_POST['ubicacion_mesa'])){
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE ubicacion_mesa LIKE '%{$ubicacion}%'");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
    //------------
    foreach ($listaFiltro as $filtro) {
        echo "<td><b>{$filtro['id_historial']}</b></td>";
        echo "<td>{$filtro['id_mesa']}</td>";
        echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
        echo "<td>{$filtro['ubicacion_mesa']}</td>";  
        echo "<td>{$filtro['inicio_reserva']}</td>";
        echo "<td>{$filtro['fin_reserva']}</td>";
        echo "<td>{$filtro['email_usuario']}</td>";
        echo '</tr>';
    }
    //Filtrar solo por capacidad    
    }elseif(!empty($capacidad=$_POST['capacidad_mesa']) && empty($ubicacion=$_POST['ubicacion_mesa'])){
        //------------    
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE capacidad_mesa>=$capacidad");
        //$select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE capacidad_mesa>='{$capacidad}' order by capacidad_mesa DESC");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_historial']}</b></td>";
            echo "<td>{$filtro['id_mesa']}</td>";
            echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
            echo "<td>{$filtro['ubicacion_mesa']}</td>";  
            echo "<td>{$filtro['inicio_reserva']}</td>";
            echo "<td>{$filtro['fin_reserva']}</td>";
            echo "<td>{$filtro['email_usuario']}</td>";
            echo '</tr>';
        }
    //Filtrar teniendo los 2 parametros
    }elseif(!empty($capacidad=$_POST['capacidad_mesa']) && !empty($ubicacion=$_POST['ubicacion_mesa'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE ubicacion_mesa LIKE '%{$ubicacion}%' and capacidad_mesa=$capacidad");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_historial']}</b></td>";
            echo "<td>{$filtro['id_mesa']}</td>";
            echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
            echo "<td>{$filtro['ubicacion_mesa']}</td>";  
            echo "<td>{$filtro['inicio_reserva']}</td>";
            echo "<td>{$filtro['fin_reserva']}</td>";
            echo "<td>{$filtro['email_usuario']}</td>";
            echo '</tr>';
        }
    }
    //Filtrar sin aÃ±adir parametros
    }else{
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_historial");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_historial']}</b></td>";
            echo "<td>{$filtro['id_mesa']}</td>";
            echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
            echo "<td>{$filtro['ubicacion_mesa']}</td>";  
            echo "<td>{$filtro['inicio_reserva']}</td>";
            echo "<td>{$filtro['fin_reserva']}</td>";
            echo "<td>{$filtro['email_usuario']}</td>";
            echo '</tr>';
        }
    }

}else{
    header("Location:../index.php");
}
?>
</body>
</html>