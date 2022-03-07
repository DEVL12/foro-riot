<?php  
	class homeModel extends mysql
	{
		private $id;
		private $name; //ESTO LO PUEDES OMITI Y PONER LOS VALOR DIRECTAMENTE DESDE LOS PARAMETROS MAS QUE TODO LO HAGO POR CUESTIONES DE ENCAPSULACION
	
		public function __construct() {
			parent::__construct();
		}

		public function GetTopic($id)	{
			$sql = "SELECT * FROM tema WHERE id = {$id}";
			$request = $this->select($sql);
			return $request;
		}

		public function GetAllTopics() {
			$sql = "SELECT * FROM tema";
			$request = $this->select_all($sql);
			return $request;
		}

		public function AddTopic(string $name) {
			$sql = "INSERT INTO tema (nombre) VALUES (?)";
      $arrData = array($name);
			$request = $this->insert($sql,$arrData);
			return $request;		
		}

		public function UpdateTopic(string $name, int $id) {
			$this->id = $id;
			$this->name = $name; //ES OPCIONAL SI LO DESEA PUEDES OMITIRLO E INSERTAR LOS VALORES DE LOS PARAMETROS DIRECTAMENTE EN EL ARRAY
			$request = $this->GetTopic($this->id); //VALIDANDO SI EXISTE PARA PODER ACTUALIZARLO

			if(!empty($request)) {
				$sql = "UPDATE tema SET nombre = ?  WHERE id = ?";
				$arrData = array($this->name, $this->id); // Usando el arreglo
				$request = $this->update($sql, $arrData);
				return $request;
			}
			else {
				return NULL;
			}
		}

		public function DeleteTopic(int $id){
			$request = $this->GetTopic($id); // Validando si existe

			if(!empty($request)){
				$sql = "DELETE FROM tema WHERE id = {$id}"; //Directamente sin encapsular la variable id
				$request = $this->delete($sql);
				return $request;
			}
			else {
				return NULL;
			}
		}
	}
?>