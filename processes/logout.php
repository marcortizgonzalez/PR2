<?php   
session_start();
session_unset();
session_destroy();

header("location:../view/login.html"); //redirige al login.html para cerrar sesion

?>