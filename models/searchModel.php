<?php
  class searchModel extends mysql // luego veo cual conviene mas
  {
    public function __construct() {
      parent::__construct();
    }

    public function GetAllPlatforms() {
      $sql = "SELECT * FROM plataforma";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetAllTopics() {
      $sql = "SELECT * FROM tema";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetAll_ResultsForums($query) {
      $sql = "SELECT discusion.*, jugador.*, plataforma.nombre_plataforma FROM discusion
              INNER JOIN jugador ON jugador.id_jugador = discusion.fk_jugador
              INNER JOIN plataforma ON plataforma.id_plataforma = discusion.fk_plataforma
              INNER JOIN tema ON tema.id_tema = discusion.fk_tema {$query}";
      $request = $this->select_all($sql);
      return $request;
    }
  }
?>
