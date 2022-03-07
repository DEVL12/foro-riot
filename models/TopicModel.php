<?php  
	class TopicModel extends mysql
	{	
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
			$request = $this->GetTopic($id);
			if(!empty($request)) {
				$sql = "UPDATE tema SET nombre = ? WHERE id = $id";
				$arrData = array($name); // Usando el arreglo
				$request = $this->update($sql, $arrData);
				return $request;
			}
			else
				return NULL;
		}

		public function DeleteTopic(int $id){
			$request = $this->GetTopic($id); // Validando si existe
			if(!empty($request)){
				$sql = "DELETE FROM tema WHERE id = {$id}"; //Directamente sin encapsular la variable id
				$request = $this->delete($sql);
				return $request;
			}
			else
				return NULL;
		}
	}
?>