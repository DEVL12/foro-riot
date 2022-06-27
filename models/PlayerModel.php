<?php
  class PlayerModel extends mysql
  {
    public function __construct() {
      parent::__construct();
    }

    public function GetPlayer($name_player){
      $sql = "SELECT * FROM jugador WHERE nombre_jugador = '{$name_player}'";
      $request = $this->select($sql);
      return $request;
    }
  }
?>
