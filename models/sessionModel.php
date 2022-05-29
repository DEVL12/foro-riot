<?php
  class sessionModel extends mysql
  {
    public function __construct() {
      parent::__construct();
    }

    public function AddUser($name, $email, $password) {
      $sql = "INSERT INTO jugador (nombre_jugador, correo, estado_jugador, rol, contrasenia)
              VALUES (?, ?, 1, 'jugador', ?)";
      $arrData = array($name, $email, $password);
      $request = $this->insert($sql,$arrData);
      return $request;
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

    public function VerifyAccount($user, $email) {
      $user = $this->CompareUser($user);
      $email = $this->CompareEmail($email);

      if($user || $email) {
        $user ? $data = ["msg" => "El nombre de usuario ya está en uso", "input" => "username"] : $data = [NULL];
        $email ? $data2 = ["msg" => "El correo ya está en uso", "input" => "email"] : $data2 = [NULL];
        $msg = [$data, $data2];
      } else {
        $msg = false;
      }
      return $msg;
    }

    public function CheckLogIn($user, $password) {
      return ( ($this->CompareUser($user)) && ($this->ComparePassword($password)) ) ? true : false;
    }

    private function CompareUser($user) {
      $sql = "SELECT * FROM jugador WHERE nombre_jugador = '{$user}'";
      $request = $this->select($sql);
      return (empty($request)) ? false : true;
    }

    private function ComparePassword($password) {
      $sql = "SELECT * FROM jugador WHERE contraseña='{$password}'";
      $request = $this->select($sql);
      return (empty($request)) ? false : true;
    }

    private function CompareEmail($email) {
      $sql = "SELECT * FROM jugador WHERE correo ='{$email}'";
      $request = $this->select($sql);
      return (empty($request)) ? false : true;
    }
  }
?>
