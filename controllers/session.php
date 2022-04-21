<?php
  class session extends controllers
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function session()
    {
      $data = array();
      $data['titulo'] = "Foro Riot Games - Iniciar sesión";
      $data['script'] = "prueba.js";
      $this->views->getViews($this,"login",$data);
    }
  }
?>
