<?php  
	class AnswerModel extends BaseModel
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function AddAnswer($content, $image, $authorId, $discussionId, $targetId, $targetType){
			$this->sql = "INSERT INTO respuesta (contenido, contenido_original, editado, imagen,
			id_autor, id_discusion, id_objetivo, tipo_objetivo, fecha, hora)
				  VALUES ('$content', '$content', 0, '$image', $authorId, $discussionId,
				   $targetId, '$targetType', '". date('d/m/Y') . "', '" . date('G:i') . "')";
			$this->connection->query($this->sql);
		}

		public function GetAllAnswersOfADiscussion($id){
			$this->result = mysqli_query($this->connection, "SELECT * FROM respuesta WHERE id_discusion =$id");
            return $this->GetRows();
		}

		public function GetAllAnswersOfAPlayer($id){
			$this->result = mysqli_query($this->connection, "SELECT * FROM respuesta WHERE id_autor =$id");
            return $this->GetRows();
		}

		public function GetNumberOfAnswersOfAPlayer($playerId){
			$this->result = mysqli_query($this->connection, "SELECT COUNT(id) FROM respuesta WHERE id_autor =$playerId");
            $result = $this->GetRows();
			return $result['COUNT(id)'];
		}

		public function GetAnswersByAproxField($field, $search){
			$this->result = mysqli_query($this->connection, "SELECT * FROM respuesta WHERE $field LIKE '%$search%'");
            return $this->GetRows();
		}

		public function UpdateAnswer($id, $content, $image){
			$this->sql = "UPDATE respuesta 
			SET contenido='$content', editado=1, imagen='$image'
			WHERE id=$id";
			$this->connection->query($this->sql);
		}

		public function DeleteAnswer($id){	
			$this->sql = "DELETE FROM respuesta WHERE id=$id";
			$this->connection->query($this->sql);
		}
	}
?>