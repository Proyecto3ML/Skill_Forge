<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo_usuario'] !== 'proveedor') {
    header("Location:indexLogin.php");
    exit();
}
?>
<h1>Bienvenido, Proveedor</h1>
<p>Has iniciado sesión correctamente.</p>
<a href="logout.php">Cerrar sesión</a>