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
<marquee behavior="scroll" direction="right" scrolldelay="1">Bienvenido ADMIN <?php echo $_SESSION['email']; ?></marquee>
<br>
<h2><b>Zona administradores</b></h2>

<?php
    $ubicacion=$pdo->prepare("SELECT DISTINCT ubicacion_mesa FROM tbl_mesas");
    $ubicacion->execute();
    $listaUbicacion=$ubicacion->fetchAll(PDO::FETCH_ASSOC);
?>

<center>
<div class="row">
    <div class="four-column">
        <h3>Historial</h3>
        <a href='../view/historial_admin.php'><img src="../img/historialbtn.png" alt="btnhistorial"></a>
    </div>
    <div class="four-column">
        <h3>Camareros</h3>
        <a href='vercamareros.php'><img src="../img/camarero.png" alt="btncamarero"></a>
    </div>
    <div class="four-column">
        <h3>Administradores</h3>
        <a href='verusuariosadmin.php'><img src="../img/admin.png" alt="btnadmin"></a>
    </div>
    <div class="four-column">
        <h3>Mesas</h3>
        <a href='veradminmesas.php'><img src="../img/mesas.png" alt="btnmesas"></a>
    </div>
</div>
</center>
<?php
}else{
    header("Location:../index.php");
}
?>
</body>
</html>