<?php
$email = $_GET['email'] ?? '';
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Perfil Cliente - SkillForge</title>
</head>
<body>
    <h2>Registro exitoso</h2>
    <p>¡Bienvenido a SkillForge, estimado cliente!</p>
    <p>Ahora completá la información de tu perfil para comenzar a usar la plataforma.</p>

    <form action="guardarPerfilCliente.php" method="post">
        <input type="hidden" name="email" value="<?= htmlspecialchars($email) ?>">
        <label for="edad">Edad:</label>
        <input type="number" name="edad" id="edad" min="18" max="100"><br><br>
        <label for="genero">Género:</label>
        <select name="genero" id="genero">
            <option value="">--Seleccionar--</option>
            <option value="masculino">Masculino</option>
            <option value="femenino">Femenino</option>
            <option value="otro">Otro</option>
        </select><br><br>
        <input type="submit" value="Guardar Perfil">
        <a href="../vistas/logout.php">
        <button type="button">Volver al Menú</button>
        </a>
    </form>
</body>
</html>
