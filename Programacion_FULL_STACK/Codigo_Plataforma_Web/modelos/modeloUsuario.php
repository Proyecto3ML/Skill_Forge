<?php
require_once(__DIR__ . '/../modelos/conexionBD.php');

class Usuario {

    private $conn;
    private $nombre;
	private $email;
    private $pass;
    private $pass2;
    private $direccion;
    private $codPostal;
    private $telefono;
    private $tipoUsuario;

	public function setDatosUsuario($nombre, $email, $pass, $direccion, $codPostal, $telefono, $tipoUsuario)
	{    
		$this->nombre=$nombre;
		$this->email=$email;
        $this->pass=$pass;
        $this->direccion=$direccion;
        $this->codPostal=$codPostal;
        $this->telefono=$telefono;
        $this->tipoUsuario=$tipoUsuario;
	}

    public function __construct() 
    {
        $conexion = new ConexionBD();
        $this->conn = $conexion->obtenerConexion();
    }

    public function registrarUsuario($nombre, $email, $pass, $direccion, $codPostal, $telefono, $tipoUsuario) 
    {
        $sql = "INSERT INTO usuarios (nombre, email, contrasenia, direccion, cod_postal, telefono, tipo_usuario) 
                VALUES (?, ?, ?, ?, ?, ?, ?)";
        $stmt = $this->conn->prepare($sql);
        $encriptPass = password_hash($pass, PASSWORD_DEFAULT);
        $stmt->bind_param("sssssss", $nombre, $email, $encriptPass, $direccion, $codPostal, $telefono, $tipoUsuario);
        return $stmt->execute();
    }

    public function verificarEmailExistente($email) 
    {
        $sql = "SELECT COUNT(*) as total FROM usuarios WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result()->fetch_assoc();
        return $resultado['total'] > 0;
    }

    public function verificarLogin($email, $contraseniaIngresada) 
    { 
        $sql = "SELECT * FROM usuarios WHERE email = ?";
        $stmt = $this->conn->prepare($sql);
        $stmt->bind_param("s", $email);
        $stmt->execute();
        $resultado = $stmt->get_result();
            if ($resultado->num_rows === 1) 
            {
                $usuario = $resultado->fetch_assoc();
                if (password_verify($contraseniaIngresada, $usuario['contrasenia'])) {
                    return $usuario;
                }
            }
            return false;
    }
}
?>