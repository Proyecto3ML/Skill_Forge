
<?php
session_start();
if (!isset($_SESSION['usuario']) || $_SESSION['usuario']['tipo_usuario'] !== 'cliente') {
    header("Location:indexLogin.php");
    exit();
}
?>
<h1>Bienvenido, Cliente</h1>
<p>Has iniciado sesión correctamente.</p>
<a href="logout.php">Cerrar sesión</a>