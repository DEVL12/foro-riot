<?php  
	class BlockModel extends BaseModel
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function AddBlock($playerId, $unlockDate, $reason){
				$this->sql = "INSERT INTO bloqueo (id_jugador, fecha_bloqueo, fecha_tope, motivo, estado)
					  VALUES ('$playerId', '". date('d/m/Y') . "', '$unlockDate', '$reason', 1)";
				$this->connection->query($this->sql);
		}

		public function GetAllBlocksOfAPlayer($playerId){
			$this->result = mysqli_query($this->connection, "SELECT * FROM bloqueo WHERE id_jugador =  $playerId");
			$buffer = array_reverse($this->GetRows());
			$result = null;
			if(!empty($buffer['estado']))
				$result[0] = $buffer;
			else
				$result = $buffer;
            return $result;
		}
		
		public function RemoveBlock($playerId, $blockId){
			$this->sql = "UPDATE bloqueo 
			SET estado=-1
			WHERE id_jugador=$playerId AND id=$blockId";
			$this->connection->query($this->sql);
		}

		public function RemoveLastBlockOfAPlayer($playerId){
			$blocks = $this->GetAllBlocksOfAPlayer($playerId);
			$this->RemoveBlock($playerId, $blocks[0]['id']);
		}
	}
?>