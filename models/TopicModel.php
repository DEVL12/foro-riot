<?php  
	class TopicModel extends BaseModel
	{
		public function __construct()
		{
			parent::__construct();
		}
		public function AddTopic($name){
			$this->sql = "INSERT INTO tema (nombre) VALUES ('$name')";
            $this->connection->query($this->sql);
		}

		public function GetAllTopics(){
			$this->result = mysqli_query($this->connection, "SELECT * FROM tema");
            return $this->GetRows();
		}

		public function GetTopicByName($name){
			$this->result = mysqli_query($this->connection, "SELECT * FROM tema WHERE nombre = '$name'");
            return $this->GetRows();
		}

		public function UpdateTopic($id, $name){
			$this->sql = "UPDATE tema 
                SET nombre='$name'
                WHERE id=$id";
            $this->connection->query($this->sql);
		}

		public function DeleteTopic($id){
			$this->sql = "DELETE FROM tema WHERE id=$id";
            $this->connection->query($this->sql);
		}
	}
?>