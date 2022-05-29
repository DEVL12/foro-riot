<?php
  class home extends controllers
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function home()
    {
      $data = array();
      $data['title'] = "Foro Riot Games | Inicio";
      $data['script'] = "prueba.js";
      $this->views->getViews($this, "home", $data);
    }

    public function aboutUs()
    {
      $data = array();
      $data['title'] = "Foro Riot Games | Sobre Nosotros";
      $data['script'] = "prueba.js";
      $this->views->getViews($this, "aboutUs", $data);
    }
  }
?>
