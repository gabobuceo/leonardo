<?php 
class CN{
	private $conexion; private $total_consultas;

	public function conectar(){ 
		$config = include('../config/config.php');
		try {
			$conexion = new PDO('mysql:host='.$config->bdhost.';dbname='.$config->bdname, $config->bduser, $config->bdpass);
			$conexion->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
			return($conexion);
		} catch (PDOException $e) {
			print "<p>Error: No puede conectarse con la base de datos.</p> $e \n";
			exit();
		}
	}

	public function consulta($consulta,$cn){ 
		$this->total_consultas++;
		$resultado = $cn->prepare($consulta);
		$resultado->execute();
		return $resultado->fetchAll();
	}
}
?> 