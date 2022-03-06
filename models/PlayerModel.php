<?php  
	class PlayerModel extends BaseModel
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function AddPlayer($name, $photo, $email, $birthdayDate, $user, $password){
			$this->sql = "INSERT INTO jugador (nombre, foto, correo, fecha_nacimiento, estado, rol, usuario, contraseña)
				  VALUES ('$name', '$photo', '$email', '$birthdayDate', 1, 'jugador', '$user', '$password')";
			$this->connection->query($this->sql);
		}
		
		public function GetPlayersByAproxField($field, $search){
			$this->result = mysqli_query($this->connection, "SELECT * FROM jugador WHERE $field LIKE '%$search%'");
            return $this->GetRows();
		}

		public function TryLogIn($user, $password){
			return $this->CheckLogIn($user, $password);
		}

		public function UpdatePlayer($playerId, $name, $photo, $user, $password){
			$this->sql = "UPDATE jugador 
			SET nombre='$name', foto='$photo', usuario='$user', contraseña='$password'
			WHERE id=$playerId";
			$this->connection->query($this->sql);
		}
		
		public function CheckUser($user){
			return $this->CompareUser($user);
		}

		public function CheckThis($field, $data){
			if($field = 'usuario')
				return $this->CheckUser();
			else{
				$this->result = mysqli_query($this->connection, "SELECT $field FROM jugador WHERE $field='$data'");
				if(empty($this->GetRows()))
					return false;
				else
					return true;
			}
		}

		private function CompareUser($user){
			$this->result = mysqli_query($this->connection, "SELECT usuario FROM jugador WHERE usuario='$user'");
			if(empty($this->GetRows()))
				return false;
			else
				return true;
		}
		
		private function ComparePassword($password){
			$this->result = mysqli_query($this->connection, "SELECT * FROM jugador WHERE contraseña='$password'");
			if(empty($this->GetRows()))
				return false;
			else
				return true;
		}

		private function CheckLogIn($user, $password){
			if($this->CompareUser($user)){
				if($this->ComparePassword($password)){
					var_dump('LOGUEADO');
					return true;
				}
				else{
					var_dump('ERROR');
					return false;
				}
			}
		}
	}
?>