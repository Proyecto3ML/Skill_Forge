<?php

class ConexionBD
{
private $servidor = "localhost";
private $usuario = "root";
private $contrasenia = "";
private $baseDeDatos = "empresaskillforge";
private $conexion;

public function obtenerConexion()
{
	$this->conexion = new mysqli($this->servidor, $this->usuario, $this->contrasenia, $this->baseDeDatos);
	if ($this->conexion->connect_error)
	{
		exit("Error de conexión: " . $this->conexion->connect_error);
	}
	return $this->conexion;
}
}
?>