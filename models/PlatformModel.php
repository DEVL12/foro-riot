<?php  
	class PlatformModel extends BaseModel
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function AddPlatform($name, $image){
			$this->sql = "INSERT INTO plataforma (nombre, imagen) VALUES ('$name', '$image')";
            $this->connection->query($this->sql);
		}

		public function GetAllPlatforms(){
			$this->result = mysqli_query($this->connection, "SELECT * FROM plataforma");
            return $this->GetRows();
		}

		public function GetPlatformByName($name){
			$this->result = mysqli_query($this->connection, "SELECT * FROM plataforma WHERE nombre = '$name'");
            return $this->GetRows();
		}

		public function UpdatePlatform($id, $name, $image){
			$this->sql = "UPDATE plataforma 
                SET nombre='$name', imagen='$image'
                WHERE id=$id";
            $this->connection->query($this->sql);
		}

		public function DeletePlatform($id){
			$this->sql = "DELETE FROM plataforma WHERE id=$id";
            $this->connection->query($this->sql);
		}
	}
?>