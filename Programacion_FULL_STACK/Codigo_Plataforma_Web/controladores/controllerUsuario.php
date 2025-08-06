<?php

require_once(__DIR__ . '/../modelos/modeloUsuario.php');

if($_SERVER['REQUEST_METHOD']==='POST')
{
    $accion = $_POST['accion'];
    $usuario = new Usuario();

    switch($accion)
    {
        case "registrarUsuario":

            $nombre = $_POST['nombreUsuario'];
            $email = $_POST['emailUsuario'];
            $pass = $_POST['contraseniaUsuario'];
            $pass2 = $_POST['vfcontraseniaUsuario'];
            $direccion = $_POST['direccionUsuario'];
            $codPostal = $_POST['codPostalUsuario'];
            $telefono = $_POST['telefonoUsuario'];
            $tipoUsuario = $_POST['tipoUsuario'];

             if (empty($nombre) || empty($email) || empty($pass) || empty($pass2) || empty($direccion) || empty($codPostal) || empty($telefono)) 
            {
                header("Location: ../vistas/indexLogin.php?error=Campos_Vacios");
                exit(); 

            } 
             if ($pass !== $pass2) {
                header("Location: ../vistas/indexLogin.php?error=Passwords_no_coinciden");
                exit();
            }
            if ($usuario->verificarEmailExistente($email)) {
                header("Location: ../vistas/indexLogin.php?error=Email_ya_registrado");
                exit();
            }
            if ($usuario->registrarUsuario($nombre, $email, $pass, $direccion, $codPostal, $telefono, $tipoUsuario)) {
                
                if ($tipoUsuario === 'cliente') {
                    header("Location: ../vistas/perfilCliente.php?email=$email");
                } elseif ($tipoUsuario === 'proveedor') {
                    header("Location: ../vistas/perfilProveedor.php?email=$email");
                }
                exit();
            } else {
                header("Location: ../vistas/indexLogin.php?error=Error_al_registrar");
                exit();
            }
        break;

        case "loginUsuario":
        session_start();

        $email = $_POST['emailUsuario'];
        $pass = $_POST['contraseniaUsuario'];

        $datosUsuario = $usuario->verificarLogin($email, $pass);

        if ($datosUsuario) {
            $_SESSION['usuario'] = $datosUsuario;
            if ($datosUsuario['tipo_usuario'] === 'cliente') {
                header("Location: ../vistas/dashboardCliente.php");
            } elseif ($datosUsuario['tipo_usuario'] === 'proveedor') {
                header("Location: ../vistas/dashboardProveedor.php");
            } else {
                header("Location: ../vistas/dashboard.php");
            }
        } else {
            header("Location: ../vistas/indexLogin.php?error=Credenciales_invalidas");
        }
        exit();
        break;
        }
}
?>