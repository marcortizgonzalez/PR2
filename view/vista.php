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
    <title>Vista Proyecto RICK-DECKARD21</title>
</head>
<body>
<div class='paddingtop'>
    <a class='btnlogout' href="../processes/logout.php">Log Out</a>
</div>



<a href="" id="open-modal">Soporte</a>
    <div class="left-part"></div>
    <div class="right-part"></div>
    <div class="modal">
        <div class="content">
            <h1>Teléfono de soporte 24/7</h1>
            <p><b>Telf. +34 902 24 25 26 - 806 34 12 77</b></p>
        </div>
    </div>
    <div class="bckg-close"></div>




<?php


include 'ver.php';
include '../services/conexion.php';

session_start();


if(!empty($_SESSION['email'])){

?>
<br>
<marquee behavior="scroll" direction="right" scrolldelay="1">Bienvenido <?php echo $_SESSION['email']; ?></marquee>
<br>

<?php
    echo "<h2><b>Administrar mesas</b></h2>";
    $ubicacion=$pdo->prepare("SELECT DISTINCT ubicacion_mesa FROM tbl_mesas");
    $ubicacion->execute();
    $listaUbicacion=$ubicacion->fetchAll(PDO::FETCH_ASSOC);
?>


<div class="filtrado">
    <form action="vista.php" method="post">
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
echo "<div class='centradotd'";
echo"<td><a href='../view/historial.php' class='btnhistorial'>Historial</a></td>";
echo "<br>";
echo "<br>";
echo"<td><a href='../view/enlaces.html' class='enlace1'>Back</a></td>";
echo "</div>";

echo "<div class='table-centrada'>";
echo "<table class='table'>";
echo "<tr>";
echo "<th>Nº Mesa</th>";
echo "<th>Capacidad</th>";
echo "<th>Ubicación</th>";
echo "<th>Inicio de la reserva</th>";
//echo "<th>Fin de la reserva</th>"; //comentar
echo "<th>Reservado por </th>";
echo "<th>Reservar/Quitar reserva</th>";
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
    $select=$pdo->prepare("SELECT * FROM tbl_mesas WHERE ubicacion_mesa LIKE '%{$ubicacion}%'");
    $select->execute();
    $listaFiltro=$select->fetchAll(PDO::FETCH_ASSOC);
    //------------
    foreach ($listaFiltro as $filtro) {
        echo "<tr>";
        echo "<td><b>{$filtro['id_mesa']}</b></td>";
        echo "<td>{$filtro['capacidad_mesa']} sillas</td>";
        echo "<td>{$filtro['ubicacion_mesa']}</td>";  
        echo "<td>{$filtro['inicio_reserva']}</td>";
        echo "<td>{$filtro['email_usuario']}</td>";
        if ($filtro['inicio_reserva']=$filtro['inicio_reserva']) {
            echo"<td><a href='../processes/eliminar.php?id_mesa={$filtro['id_mesa']}&email_usuario={$_SESSION['email']}&capacidad_mesa={$filtro['capacidad_mesa']}&ubicacion_mesa={$filtro['ubicacion_mesa']}' class='btnquitar'>Quitar reserva</a></td>";
        }else {
            echo"<td><a href='../processes/insertar.php?id_mesa={$filtro['id_mesa']}&email_usuario={$_SESSION['email']}&capacidad_mesa={$filtro['capacidad_mesa']}&ubicacion_mesa={$filtro['ubicacion_mesa']}' class='btnreservar'>Reservar</a></td>";
        }
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
                echo "<td>{$filtro['inicio_reserva']}</td>";
                echo "<td>{$filtro['email_usuario']}</td>";
                if ($filtro['inicio_reserva']=$filtro['inicio_reserva']) {
                    echo"<td><a href='../processes/eliminar.php?id_mesa={$filtro['id_mesa']}&email_usuario={$_SESSION['email']}&capacidad_mesa={$filtro['capacidad_mesa']}&ubicacion_mesa={$filtro['ubicacion_mesa']}' class='btnquitar'>Quitar reserva</a></td>";
                }else {
                    echo"<td><a href='../processes/insertar.php?id_mesa={$filtro['id_mesa']}&email_usuario={$_SESSION['email']}&capacidad_mesa={$filtro['capacidad_mesa']}&ubicacion_mesa={$filtro['ubicacion_mesa']}' class='btnreservar'>Reservar</a></td>";
                }
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
            echo "<td>{$filtro['inicio_reserva']}</td>";
            echo "<td>{$filtro['email_usuario']}</td>";
            if ($filtro['inicio_reserva']=$filtro['inicio_reserva']) {
                echo"<td><a href='../processes/eliminar.php?id_mesa={$filtro['id_mesa']}&email_usuario={$_SESSION['email']}&capacidad_mesa={$filtro['capacidad_mesa']}&ubicacion_mesa={$filtro['ubicacion_mesa']}' class='btnquitar'>Quitar reserva</a></td>";
            }else {
                echo"<td><a href='../processes/insertar.php?id_mesa={$filtro['id_mesa']}&email_usuario={$_SESSION['email']}&capacidad_mesa={$filtro['capacidad_mesa']}&ubicacion_mesa={$filtro['ubicacion_mesa']}' class='btnreservar'>Reservar</a></td>";
            }
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
            echo "<td>{$filtro['inicio_reserva']}</td>";
            echo "<td>{$filtro['email_usuario']}</td>";
            if ($filtro['inicio_reserva']=$filtro['inicio_reserva']) {
                echo"<td><a href='../processes/eliminar.php?id_mesa={$filtro['id_mesa']}&email_usuario={$_SESSION['email']}&capacidad_mesa={$filtro['capacidad_mesa']}&ubicacion_mesa={$filtro['ubicacion_mesa']}' class='btnquitar'>Quitar reserva</a></td>";
            }else {
                echo"<td><a href='../processes/insertar.php?id_mesa={$filtro['id_mesa']}&email_usuario={$_SESSION['email']}&capacidad_mesa={$filtro['capacidad_mesa']}&ubicacion_mesa={$filtro['ubicacion_mesa']}' class='btnreservar'>Reservar</a></td>";
            }
            echo '</tr>';
        }
    }
}else{
    header("Location:../index.php");
}
?>
</body>
</html>