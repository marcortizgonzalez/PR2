<?php

include '../services/config.php';
include '../services/conexion.php';

//include '../processes/usuarios.php';
$sentencia=$pdo->prepare("SELECT * FROM tbl_mesas");
$sentencia->execute();
$listaMesas=$sentencia->fetchAll(PDO::FETCH_ASSOC);

$sentencia2=$pdo->prepare("SELECT * FROM tbl_historial");
$sentencia2->execute();
$listaHistorial=$sentencia2->fetchAll(PDO::FETCH_ASSOC);

$sentencia3=$pdo->prepare("SELECT * FROM tbl_camareros");
$sentencia3->execute();
$listaCamareros=$sentencia3->fetchAll(PDO::FETCH_ASSOC);

$sentencia4=$pdo->prepare("SELECT * FROM tbl_usuarios");
$sentencia4->execute();
$listaUsuarios=$sentencia4->fetchAll(PDO::FETCH_ASSOC);