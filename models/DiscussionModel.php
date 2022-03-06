<?php  
	class DiscussionModel extends BaseModel
	{
		public function __construct()
		{
			parent::__construct();
		}

        public function AddDiscussion($title, $authorId, $content, $topic, $platform, $image){
            $this->sql = "INSERT INTO discusion (titulo, id_autor, contenido, contenido_original, 
                editado, tema, plataforma, imagen, fecha, hora, estado)
                      VALUES ('$title', $authorId, '$content', '$content', 0, '$topic', '$platform',
                     '$image', '". date('d/m/Y') . "', '" . date('G:i') . "', 'abierta')";
            $this->connection->query($this->sql);
        }

        public function GetDiscussionById($id){
            $this->result = mysqli_query($this->connection, "SELECT * FROM discusion WHERE id=$id");
            return $this->GetRows();
        }

        public function GetAllDiscussions(){
            $this->result = mysqli_query($this->connection, "SELECT * FROM discusion");
            return $this->GetRows();
        }

        public function GetNumberOfDiscussionOfAPlayer($playerId){
            $this->result = mysqli_query($this->connection, "SELECT COUNT(id) FROM discusion WHERE id_autor =$playerId");
            $result = $this->GetRows();
			return $result['COUNT(id)'];
        }

        public function GetDiscussionsByAproxField($field, $search){
            $this->result = mysqli_query($this->connection, "SELECT * FROM discusion WHERE $field LIKE '%$search%'");
            return $this->GetRows();
        }

        public function GetDiscussionsOfAnUser($id){
            $this->result = mysqli_query($this->connection, "SELECT * FROM discusion WHERE id_autor=$id");
            return $this->GetRows();
        }
        
        public function UpdateDiscussion($id, $title, $content, $image){
            $this->sql = "UPDATE discusion 
                SET titulo='$title', contenido='$content',
                editado=1, imagen='$image'
                WHERE id=$id";
            $this->connection->query($this->sql);
        }

        public function ChangeDiscussionState($id, $state){
            $this->sql = "UPDATE discusion 
                SET estado='$state'
                WHERE id=$id";
            $this->connection->query($this->sql);
        }

        public function DeleteDiscussion($id){
            $this->sql = "DELETE FROM discusion WHERE id = $id";
            $this->connection->query($this->sql);
        }
	}
?>