<?php
  class session extends controllers
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function login()
    {
      $data = array();
      $data['title'] = "Foro Riot Games - Iniciar sesión";
      $this->views->getViews($this,"login",$data);
    }

    public function register()
    {
      $data = array();
      $data['title'] = "Foro Riot Games - Registro";
      $this->views->getViews($this,"register",$data);
    }
  }
?>
