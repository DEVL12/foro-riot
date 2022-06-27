<?php
  class blockModel extends mysql
  {
    public function __construct() {
      parent::__construct();
    }

    public function GetBlock($id) {
      $sql = "SELECT * FROM bloqueo WHERE id = {$id}";
      $request = $this->select($sql);
      return $request;
    }

    public function GetPlayer_byName($name)
    {
      $sql = "SELECT id_jugador, nombre_jugador FROM jugador WHERE nombre_jugador = '{$name}'";
      $request = $this->select($sql);
      return $request;
    }

    public function GetAllBlocksOfAPlayer($playerId) {
      $sql = "SELECT * FROM bloqueo WHERE id_jugador = {$playerId}";
      $request = $this->select_all($sql);
      return array_reverse($request);
    }

    public function AddBlock($playerId, $date, $reason) {
      $sql = "INSERT INTO bloqueo (fk_jugador, fecha_bloqueo, fecha_tope, motivo_bloqueo, estado_bloqueo)
      VALUES (?, '". date('Y-m-d') . "', ?, ?, 1)";
      $arrData = [$playerId, $date, $reason];
      $request = $this->insert($sql,$arrData);
      return $request;
    }

    public function RemoveBlock($blockId) {
      $request = $this->GetBlock($blockId);
      if(!empty($request)) {
        $sql = "UPDATE bloqueo SET estado = ? WHERE id = ?";
        $arrData = array(-1, $blockId);
        $request = $this->update($sql, $arrData);
        return $request;
      }
      else
        return NULL;
    }

    public function RemoveLastBlockOfAPlayer($playerId) {
      $blocks = $this->GetAllBlocksOfAPlayer($playerId);
      $request = $this->RemoveBlock($blocks[0]['id']);
      return $request;
    }
  }
?>
