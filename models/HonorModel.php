<?php  
	class HonorModel extends BaseModel
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function AddHonor($playerId, $targetId, $targetType, $honor){
			$this->sql = "INSERT INTO honor (id_jugador, id_objetivo, tipo_objetivo, puntaje)
					  VALUES ($playerId, $targetId, '$targetType', $honor)";
			$this->connection->query($this->sql);
		}

		public function GetHonorsOfAPlayer($playerId){
			$this->result = mysqli_query($this->connection, 
				"SELECT h.puntaje FROM honor h 
				INNER JOIN discusion d ON d.id = h.id_objetivo
				WHERE h.tipo_objetivo='discusion' AND d.id_autor = $playerId");
            $userDiscussions = $this->GetRows();

			$this->result = mysqli_query($this->connection,
				"SELECT h.puntaje FROM honor h 
				INNER JOIN respuesta r ON r.id = h.id_objetivo
				WHERE h.tipo_objetivo='respuesta' AND r.id_autor = $playerId");
			$userAnswers = $this->GetRows();
			
			$rows = array_merge($userDiscussions, $userAnswers);
			$honors = 0;
			foreach ($rows as $key => $value){
				if(!empty($value['puntaje']))
					$honors += $value['puntaje'];
				else
					$honors += $value;
			}
			return $honors;
		}

		public function GetHonor($playerId, $targetId, $targetType){
			$this->result = mysqli_query($this->connection, "SELECT * FROM honor
								WHERE id_jugador=$playerId AND id_objetivo=$targetId AND tipo_objetivo='$targetType'");
            return $this->GetRows();
		}

		public function UpdateHonor($playerId, $targetId, $targetType, $honor){
			$row = $this->GetHonor($playerId, $targetId, $targetType);
			if($honor == 0){
				$this->DeleteHonor($row['id']);
			}else{
				$this->sql = "UPDATE honor SET puntaje=$honor WHERE id=" . $row['id'];
				$this->connection->query($this->sql);
			}
		}

		public function DeleteHonor($id){
			$this->sql = "DELETE FROM honor WHERE id=$id";
			$this->connection->query($this->sql);
		}

	}
?>