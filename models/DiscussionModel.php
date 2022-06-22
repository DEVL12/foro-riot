<?php
  class discussionModel extends mysql
  {
    public function __construct() {
      parent::__construct();
    }

    public function GetAllDiscussions() {
      $sql = $this->GetDiscusionQuery(); // Lo converti en una funcion porque el query era muy extenso y se repetia
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetAllDiscussionsByPlataform($name_plataform) {
      $sql =  $this->GetDiscusionQuery()." WHERE plataforma.nombre_plataforma = '{$name_plataform}'";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetDiscussionById($id) {
      $sql = "SELECT * FROM discusion WHERE id = {$id}";
      $request = $this->select($sql);
      return $request;
    }

    public function GetVisibleDiscussions() {
      $sql = "SELECT * FROM discusion WHERE estado != 'oculta'";
      $request = $this->select($sql);
      return $request;
    }

    public function GetLastDiscussions($number) {
      $discussions = $this->GetVisibleDiscussions();
      $discussions = array_reverse($discussions);
      $result = [];
      for ($i=0; $i <= $number-1; $i++) {
        if(!empty($discussions[$i]))
          array_push($result, $discussions[$i]);
      }
      return $result;
    }

    public function GetNumberOfDiscussionOfAPlayer($playerId) {
      $sql = "SELECT COUNT(id) FROM discusion WHERE id_autor =$playerId";
      $request = $this->select($sql);
      return $request;
    }

    public function GetDiscussionsByAproxField($field, $search) {
      $sql = "SELECT * FROM discusion WHERE $field LIKE '%$search%'";
      $request = $this->select($sql);
      return $request;
    }

    public function GetDiscussionsOfAnUser($id) {
      $sql = "SELECT * FROM discusion WHERE id_autor={$id}";
      $request = $this->select($sql);
      return $request;
    }

    public function GetAllPlatforms() { //No quiero repetir esto :C pero bueno luego veo como lo mejoro
      $sql = "SELECT * FROM plataforma";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetAllTopics() {
      $sql = "SELECT * FROM tema";
      $request = $this->select_all($sql);
      return $request;
    }

    public function AddDiscussion($title, $authorId, $content, $topic, $platform) {
      $sql = "INSERT INTO discusion (titulo, fk_jugador, contenido_discusion, contenido_original_discusion,
              editado_discusion, fk_tema, fk_plataforma , fecha_discusion, estado_discusion)
              VALUES (?, ?, ?, ?, 0, ?, ?, '". date('Y-m-d G:i:s') ."', 'abierta')";
      $arrData = array($title, $authorId, $content, $content, $topic, $platform);
      $request = $this->insert($sql,$arrData);
      return $request;
    }

    public function UpdateDiscussion($id, $title, $content, $image) {
      $request = $this->GetDiscussionById($id);
      if(!empty($request)) {
        $sql = "UPDATE discusion SET titulo = ?, contenido = ?, editado = 1, imagen = ? WHERE id = {$id}";
        $arrData = array($title, $content, $image);
        $request = $this->update($sql, $arrData);
        return $request;
      }
      else
        return NULL;
    }

    public function ChangeDiscussionState($id, $state){
      $request = $this->GetDiscussionById($id);
      if(!empty($request)) {
        $sql = "UPDATE discusion SET estado=? WHERE id={$id}";
        $arrData = array($state);
        $request = $this->update($sql, $arrData);
        return $request;
      }
      else
        return NULL;
    }

    public function DeleteDiscussion($id) {
      $request = $this->GetDiscussionById($id);
      if(!empty($request)) {
        $sql = "DELETE FROM honor WHERE id_objetivo = {$id} AND tipo_objetivo = 'discusion'";
        $request = $this->delete($sql);
        $sql = "DELETE FROM discusion WHERE id = {$id}";
        $request = $this->delete($sql);
        return $request;
      }
      else
        return NULL;
    }
    
    public function GetDiscussionHonors($id){
      $sql = "SELECT puntaje FROM honor WHERE id_objetivo = $id AND tipo_objetivo = 'discusion';";
      $request = $this->select_all($sql);

      $honors = 0;

      if($request != NULL) {
        for ($i=0; $i < count($request); $i++) { 
          if(!empty($request[$i]['puntaje'])){
            $honors += $request[$i]['puntaje'];
          }
        }
      }
      return $honors;
    }

    // PRIVATE FUNCTIONS
    private function GetDiscusionQuery() {
      return (
        "SELECT titulo, contenido_discusion, fecha_discusion, nombre_tema, nombre_jugador, nombre_plataforma, id_discusion
        FROM discusion
        INNER JOIN jugador ON discusion.fk_jugador = jugador.id_jugador
        INNER JOIN tema ON discusion.fk_tema = tema.id_tema
        INNER JOIN plataforma ON discusion.fk_plataforma = plataforma.id_plataforma"
      );
    }
  }
?>
