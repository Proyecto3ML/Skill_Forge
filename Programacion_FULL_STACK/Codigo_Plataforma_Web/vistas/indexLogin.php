<?php if (isset($_GET['error'])): ?>
    <p style="color:red;">
        <?php 
            switch($_GET['error']) {
                case 'Campos_Vacios': echo "Por favor, completá todos los campos."; break;
                case 'Passwords_no_coinciden': echo "Las contraseñas no coinciden."; break;
                case 'Email_ya_registrado': echo "Este email ya está registrado."; break;
                case 'Error_al_registrar': echo "Error al registrar. Intente nuevamente."; break;
            }
        ?>
    </p>
<?php endif; ?>


