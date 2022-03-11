<?php
	class PlayerModel extends mysql
	{
		public function __construct() {
			parent::__construct();
		}

		public function GetPlayersByAproxField($field, $search) {
			$sql = "SELECT * FROM jugador WHERE $field LIKE '%$search%'";
			$request = $this->select($sql);
			return $request;
		}

		public function GetPlayerById($id) {
			$sql = "SELECT * FROM jugador WHERE id = {$id}";
			$request = $this->select($sql);
			return $request;
		}

		public function AddPlayer($name, $photo, $email, $date, $user, $password) {
			$sql = "INSERT INTO jugador (nombre, foto, correo, fecha_nacimiento, estado, rol, usuario, contraseña)
							VALUES (?, ?, ?, ?, 1, 'jugador', ?, ?)";
			$arrData = array($name, $photo, $email, $date, $user, $password);
			$request = $this->insert($sql,$arrData);
			return $request;
		}

		public function UpdatePlayer($playerId, $name, $photo, $user, $password) {
			$request = $this->GetPlayerById($playerId);
			if(!empty($request)) {
				$sql = "UPDATE jugador
					SET nombre=?, foto =?, usuario=?, contraseña=?
					WHERE id={$playerId}";
				$arrData = array($name, $photo, $user, $password);
				$request = $this->update($sql, $arrData);
				return $request;
			}
			else
				return NULL;
		}

		public function TryLogIn($user, $password) {
			return $this->CheckLogIn($user, $password);
		}

		public function CheckUser($user) {
			return $this->CompareUser($user);
		}

		private function CompareUser($user) {
			$sql = "SELECT usuario FROM jugador WHERE usuario='$user'";
			$request = $this->select($sql);
			if(empty($request))
				return false;
			else
				return true;
		}

		private function ComparePassword($password) {
			$sql = "SELECT * FROM jugador WHERE contraseña='$password'";
			$request = $this->select($sql);
			if(empty($request))
				return false;
			else
				return true;
		}

		private function CheckLogIn($user, $password) {
			if( ($this->CompareUser($user)) && ($this->ComparePassword($password)) ) {
				var_dump('LOGUEADO');
					return true;
			}
			else{
				var_dump('ERROR');
				return false;
			}
		}
	}
?>
