<?php
require_once 'config/config.php';

class Db {

	private $host;
	private $db;
	private $user;
	private $pass;
	public $conection;

	public function __construct() {		
		// Establecer los valores de host, base de datos, usuario y contraseña desde las constantes definidas en el archivo de configuración.
		$this->host = constant('DB_HOST');
		$this->db = constant('DB');
		$this->user = constant('DB_USER');
		$this->pass = constant('DB_PASS');

		try {
			// Intentar establecer una conexión PDO con la base de datos SQL Server utilizando los valores proporcionados.
			$this->conection = new PDO("sqlsrv:server=(local) ; Database = $this->db", "", "");
		} catch (PDOException $e) {
			// En caso de error, mostrar el mensaje de error y salir del script.
			echo $e->getMessage();
			exit();
		}
	}

}
?>
