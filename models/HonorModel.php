<?php
  class honorModel extends mysql
  {
    public function __construct() {
      parent::__construct();
    }

    public function GetHonorsOfAPlayer($playerId) {
      $sql = "SELECT h.puntaje FROM honor h
        INNER JOIN discusion d ON d.id = h.id_objetivo
        WHERE h.tipo_objetivo='discusion' AND d.id_autor = {$playerId}";
      $userDiscussions = $this->select($sql);

      $sql = "SELECT h.puntaje FROM honor h
      INNER JOIN respuesta r ON r.id = h.id_objetivo
      WHERE h.tipo_objetivo='respuesta' AND r.id_autor = {$playerId}";
      $userAnswers = $this->select_all($sql);

      $rows = array_merge($userDiscussions, $userAnswers);
      $honors = 0;
      foreach ($rows as $key => $value){
        if(!empty($value['puntaje']))
          $honors += $value['puntaje'];
        else
          $honors += $value;
      }
      return $honors;
    }

    public function GetTotalDiscussionHonor($id){
      $sql = "SELECT puntaje FROM honor WHERE id_objetivo = $id AND tipo_objetivo = 'discusion'";
      $request = $this->select($sql);

      $honors = 0;
      foreach ($request as $key => $value){
        if(!empty($value['puntaje']))
          $honors += $value['puntaje'];
        else
          $honors += $value;
      }
      return $honors;
    }

    public function GetHonorsOfADiscussion($id) {
      $sql = "SELECT * FROM honor WHERE id_objetivo = {$id} AND tipo_objetivo = 'discusion'";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetHonorsOfAnAnswer($id){
      $sql = "SELECT * FROM honor WHERE id_objetivo = {$id} AND tipo_objetivo = 'respuesta'";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetHonor($targetId, $targetType, $playerId) {
      $sql = "SELECT * FROM honor WHERE id_objetivo = $targetId AND tipo_objetivo = '$targetType' AND fk_jugador = $playerId";
      $request = $this->select($sql);
      return $request;
    }

    public function AddHonor($playerId, $targetId, $targetType, $honor) {
      $sql = "INSERT INTO honor (fk_jugador, id_objetivo, tipo_objetivo, puntaje) VALUES (?, ?, ?, ?)";
      $arrData = array($playerId, $targetId, $targetType, $honor);
      $request = $this->insert($sql, $arrData);
      return $request;
    }

    public function UpdateHonor($honorId, $honor) {
      $sql = "UPDATE honor SET puntaje = ? WHERE id_honor = {$honorId}";
      $arrData = array($honor);
      $request = $this->update($sql, $arrData);
      return $request;
    }

    public function DeleteHonor($id) {
      $sql = "DELETE FROM honor WHERE id_honor = {$id}";
      $request = $this->delete($sql);
      return $request;
    }
  }
?>
