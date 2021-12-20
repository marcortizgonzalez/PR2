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
<a href="../view/vistausuarioadmin.php"><img src="../img/cumback2.png" class="cum"></a>    
<br>
    <div>
        <h1 class="queso">Historial</h1>

    </div>
<?php
include 'ver.php';
include '../services/conexion.php';

session_start();
if(!empty($_SESSION['email_admin'])){

?>
<br>

<?php

    $horario=$pdo->prepare("SELECT * FROM tbl_horario");
    $horario->execute();
    $listaHorario=$horario->fetchAll(PDO::FETCH_ASSOC);

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
        <input class="filtradobtn2" type="date" name="fecha_reserva" id='fecha_reserva' step="1" min="2021-01-01" max="2028-12-31">
        <input class="filtradobtn" type="submit" value="Filtrar" name="filtrar">
    </form>
</div>

<div>
<br>
<div class='table-centrada'>
<table class='table'>
<tr>
<th>Id historial</th>
<th>Nº mesa</th>
<th>Capacidad</th>
<th>Ubicación</th>
<th>Fecha reserva</th>
<th class="tooltip-wrap">Franja horaria
    <div class="tooltip-content">
    <?php
foreach($listaHorario as $horario){
    echo "<option value='".$horario['id_horario']."'>(".$horario['id_horario'].") ".$horario['inicio_horario']." - ".$horario['fin_horario']."</option>";
}
    ?>
  </div> 
</th>
<th>Eliminar reserva</th>

</tr>



<?php
//Con filtro
if(isset($_POST['filtrar'])){
    $capacidad=$_POST['capacidad_mesa'];
    $ubicacion=$_POST['ubicacion_mesa'];
    $fecha=$_POST['fecha_reserva'];
    //var_dump($capacidad);
    //var_dump($ubicacion);
    //var_dump($fecha);
    //Filtrar solo por ubicacion
    //------------
    if(empty($capacidad=$_POST['capacidad_mesa']) && empty($fecha=$_POST['fecha_reserva']) && !empty($ubicacion=$_POST['ubicacion_mesa'])){
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE ubicacion_mesa LIKE '%{$ubicacion}%'");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
    //------------
    foreach ($listaFiltro as $filtro) {
        echo "<td><b>{$filtro['id_historial']}</b></td>";
        echo "<td>{$filtro['id_mesa']}</td>";
        echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
        echo "<td>{$filtro['ubicacion_mesa']}</td>";  
        echo "<td>{$filtro['fecha_reserva']}</td>";
        echo "<td>{$filtro['id_horario']}</td>";
        echo "<td><a type='button' class='button-2' href='../processes/eliminar_reserva.php?id_historial={$filtro['id_historial']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
        echo '</tr>';
    }
    //Filtrar solo por capacidad    
    }elseif(!empty($capacidad=$_POST['capacidad_mesa']) && empty($ubicacion=$_POST['ubicacion_mesa']) && empty($fecha=$_POST['fecha_reserva'])){
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
            echo "<td>{$filtro['fecha_reserva']}</td>";
            echo "<td>{$filtro['id_horario']}</td>";
            echo "<td><a type='button' class='button-2' href='../processes/eliminar_reserva.php?id_historial={$filtro['id_historial']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
            echo '</tr>';
        }
    //Filtrar solo por fecha
    }elseif(empty($capacidad=$_POST['capacidad_mesa']) && empty($ubicacion=$_POST['ubicacion_mesa']) && !empty($fecha=$_POST['fecha_reserva'])){
        //------------    
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE fecha_reserva='$fecha'");
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
            echo "<td>{$filtro['fecha_reserva']}</td>";
            echo "<td>{$filtro['id_horario']}</td>";
            echo "<td><a type='button' class='button-2' href='../processes/eliminar_reserva.php?id_historial={$filtro['id_historial']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
            echo '</tr>';
        }
    //Filtrar teniendo capacidad y ubi
    }elseif(!empty($capacidad=$_POST['capacidad_mesa']) && !empty($ubicacion=$_POST['ubicacion_mesa']) && empty($fecha=$_POST['fecha_reserva'])){
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
            echo "<td>{$filtro['fecha_reserva']}</td>";
            echo "<td>{$filtro['id_horario']}</td>";
            echo "<td><a type='button' class='button-2' href='../processes/eliminar_reserva.php?id_historial={$filtro['id_historial']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
            echo '</tr>';
        }
    //Filtrar teniendo capacidad y fecha
    }elseif(!empty($capacidad=$_POST['capacidad_mesa']) && empty($ubicacion=$_POST['ubicacion_mesa']) && !empty($fecha=$_POST['fecha_reserva'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE capacidad_mesa=$capacidad and fecha_reserva='$fecha'");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_historial']}</b></td>";
            echo "<td>{$filtro['id_mesa']}</td>";
            echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
            echo "<td>{$filtro['ubicacion_mesa']}</td>";  
            echo "<td>{$filtro['fecha_reserva']}</td>";
            echo "<td>{$filtro['id_horario']}</td>";
            echo "<td><a type='button' class='button-2' href='../processes/eliminar_reserva.php?id_historial={$filtro['id_historial']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
            echo '</tr>';
        }
    //Filtrar teniendo ubi y fecha
    }elseif(empty($capacidad=$_POST['capacidad_mesa']) && !empty($ubicacion=$_POST['ubicacion_mesa']) && !empty($fecha=$_POST['fecha_reserva'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE ubicacion_mesa LIKE '%{$ubicacion}%' and fecha_reserva='$fecha'");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_historial']}</b></td>";
            echo "<td>{$filtro['id_mesa']}</td>";
            echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
            echo "<td>{$filtro['ubicacion_mesa']}</td>";  
            echo "<td>{$filtro['fecha_reserva']}</td>";
            echo "<td>{$filtro['id_horario']}</td>";
            echo "<td><a type='button' class='button-2' href='../processes/eliminar_reserva.php?id_historial={$filtro['id_historial']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
            echo '</tr>';
        }
    //Filtrar teniendo los 3 parametros
    }elseif(!empty($capacidad=$_POST['capacidad_mesa']) && !empty($ubicacion=$_POST['ubicacion_mesa']) && !empty($fecha=$_POST['fecha_reserva'])){
        //------------
        $select=$pdo->prepare("SELECT * FROM tbl_historial WHERE ubicacion_mesa LIKE '%{$ubicacion}%' and capacidad_mesa=$capacidad and fecha_reserva='$fecha'");
        $select->execute();
        $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
        //------------
        foreach ($listaFiltro as $filtro) {
            echo "<tr>";
            echo "<td><b>{$filtro['id_historial']}</b></td>";
            echo "<td>{$filtro['id_mesa']}</td>";
            echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
            echo "<td>{$filtro['ubicacion_mesa']}</td>";  
            echo "<td>{$filtro['fecha_reserva']}</td>";
            echo "<td>{$filtro['id_horario']}</td>";
            echo "<td><a type='button' class='button-2' href='../processes/eliminar_reserva.php?id_historial={$filtro['id_historial']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
            echo '</tr>';
        }
    }
    //Filtrar sin añadir parametros
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
            echo "<td>{$filtro['fecha_reserva']}</td>";
            echo "<td>{$filtro['id_horario']}</td>";
            echo "<td><a type='button' class='button-2' href='../processes/eliminar_reserva.php?id_historial={$filtro['id_historial']}'  onclick=\"return confirm('¿Estás seguro de borrar?')\">Borrar</a></td>";
            echo '</tr>';
        }
    }

}else{
    header("Location:../index.php");
}
?>
</div>

</body>
</html>