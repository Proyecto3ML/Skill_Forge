<?php
$email = $_GET['email'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil Proveedor - SkillForge</title>
</head>
<body>
    <h2>Registro exitoso</h2>
    <p>¡Bienvenido a SkillForge, proveedor!</p>
    <p>Por favor completá los datos de tu perfil profesional:</p>

    <form action="guardarPerfilProveedor.php" method="post">
        <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
        <label for="oficio">Seleccioná tu oficio principal:</label>
        <select name="oficio" id="oficio" required>
            <option value="">--Seleccionar--</option>
            <option value="carpintero">Carpintero</option>
            <option value="desarrollador_web">Desarrollador Web</option>
            <option value="electricista">Electricista</option>
            <option value="mecanico">Mecánico</option>
            <option value="plomero">Plomero</option>
        </select><br><br>
        <label for="experiencia">Años de experiencia:</label>
        <input type="number" name="experiencia" id="experiencia" min="0" max="50"><br><br>
        <label for="descripcion">Descripción profesional:</label><br>
        <textarea name="descripcion" id="descripcion" cols="30" rows="5" placeholder="Contanos sobre vos y tus servicios..."></textarea><br><br>
        <input type="submit" value="Guardar Perfil">
        <a href="../vistas/logout.php">
        <button type="button">Volver al Menú</button>
        </a>
    </form>
</body>
</html>
