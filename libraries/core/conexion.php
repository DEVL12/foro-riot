<?php 
	class conexion
	{
		private $conexion;
		public function __construct()
		{
			$connectionString = "mysql:host=".DB_HOST.";dbname=".DB_NAME.";.DB_CHARSET.";

			try
			{
				$this->conexion = new PDO($connectionString,DB_USER,DB_PASSWORD);
				$this->conexion->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
			} catch (PDOException $e)
			{
				$this->conexion = "Error de conexión.";
				echo "ERROR: ".$e->getMessage();
			}
		}

		public function conect()
		{
			return $this->conexion;
		}
	}

?>