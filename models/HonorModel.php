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

    public function GetHonor($playerId, $targetId, $targetType) {
      $sql = "SELECT * FROM honor WHERE id_jugador = $playerId AND id_objetivo = $targetId AND tipo_objetivo = '$targetType'";
      $request = $this->select($sql);
      return $request;
    }

    public function AddHonor($playerId, $targetId, $targetType, $honor) {
      $sql = "INSERT INTO honor (id_jugador, id_objetivo, tipo_objetivo, puntaje) VALUES (?, ?, ?, ?)";
      $arrData = array($playerId, $targetId, $targetType, $honor);
      $request = $this->insert($sql, $arrData);
      return $request;
    }

    public function UpdateHonor($playerId, $targetId, $targetType, $honor) {
      $row = $this->GetHonor($playerId, $targetId, $targetType);
      if(!empty($row)) {
        if($honor == 0)
          return $this->DeleteHonor($row['id']);
        else {
          $sql = "UPDATE honor SET puntaje = ? WHERE id = {$row['id']}";
          $arrData = array($honor);
          $request = $this->update($sql, $arrData);
          return $request;
        }
      }
      else
        return NULL;
    }

    public function DeleteHonor($id) {
      $sql = "DELETE FROM honor WHERE id = {$id}";
      $request = $this->delete($sql);
      return $request;
    }
  }
?>
