<?php
  class answerModel extends mysql
  {
    public function __construct() {
      parent::__construct();
    }


    public function GetAnswerById($id) {
      $sql = "SELECT * FROM respuesta WHERE id ={$id}";
      $request = $this->select($sql);
      return $request;
    }

    public function GetVisibleAnswers() {
      $sql = "SELECT * FROM respuesta WHERE estado != -1";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetAllAnswersOfADiscussion($discussionId) {
      $sql = "SELECT id_jugador, id_respuesta, nombre_jugador, rol, contenido_respuesta, editado_respuesta, fecha_respuesta, estado_respuesta, id_respuesta
              FROM respuesta
              INNER JOIN jugador ON jugador.id_jugador = respuesta.fk_jugador
              WHERE fk_discusion = {$discussionId} AND estado_respuesta != -1";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetAllAnswersOfAPlayer($authorId) {
      $sql = "SELECT * FROM respuesta WHERE id_autor ={$authorId}";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetNumberOfAnswersOfAPlayer($playerId) {
      $sql = "SELECT COUNT(id) FROM respuesta WHERE id_autor ={$playerId}";
      $request = $this->select($sql);
      return $request;
    }

    public function GetAnswersByAproxField($field, $search) {
      $sql = "SELECT * FROM respuesta WHERE $field LIKE '%$search%'";
      $request = $this->select($sql);
      return $request;
    }

    public function GetTitleAndNameOfADiscussionByid($id) {
      $sql = "SELECT titulo, nombre_jugador FROM discusion
              INNER JOIN jugador ON jugador.id_jugador = discusion.fk_jugador
              WHERE id_discusion = {$id}";
      $request = $this->select($sql);
      return $request;
    }

    public function AddAnswer($content, $image, $authorId, $discussionId, $targetId, $targetType) {
      $sql = "INSERT INTO respuesta (contenido, contenido_original, editado, imagen,
          id_autor, id_discusion, id_objetivo, tipo_objetivo, fecha, hora)
          VALUES (?, ?, 0, ?, ?, ?, ?, ?, '". date('d/m/Y') . "', '" . date('G:i') . "')";
      $arrData = array($content, $content, $image, $authorId, $discussionId, $targetId, $targetType);
      $request = $this->insert($sql,$arrData);
      return $request;
    }

    public function UpdateAnswer($id, $content, $image) {
      $request = $this->GetAnswerById($id);
      if(!empty($request)) {
        $sql = "UPDATE respuesta SET contenido= ?, editado = 1, imagen = ? WHERE id = {$id}";
        $arrData = array($content, $image);
        $request = $this->update($sql, $arrData);
        return $request;
      }
      else
        return NULL;
    }

    public function DeleteAnswer($id){
      $request = $this->GetAnswerById($id);
      if(!empty($request)){
        $sql = "DELETE FROM honor WHERE id_objetivo = {$id} AND tipo_objetivo='respuesta'";
        $request = $this->delete($sql);
        $sql = "DELETE FROM respuesta WHERE id={$id}";
        $request = $this->delete($sql);
        return $request;
      }
      else
        return NULL;
    }

    public function GetHonorsOf($id, $type){
      $sql = "SELECT puntaje FROM honor WHERE id_objetivo = $id AND tipo_objetivo = '$type'";
      $request = $this->select_all($sql);

      $honors = 0;
      foreach ($request as $key => $value){
        if(!empty($value['puntaje']))
          $honors += $value['puntaje'];
        else
          $honors += $value;
      }
      return $honors;
    }

    public function GetDiscussion($id){
      $sql = "SELECT * FROM discusion WHERE id_discusion = {$id}";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetPlayerData($id){
      $sql = "SELECT nombre_jugador,rol FROM jugador WHERE id_jugador = {$id}";
      $request = $this->select($sql);
      return $request;
    }
  }
?>
