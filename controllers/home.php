<?php
  class home extends controllers
  {
    public function __construct()
    {
      session_start();
      parent::__construct();
    }

    public function home()
    {
      $data = [
        'title' => "Foro Riot Games | Inicio",
        'script' => "prueba.js",
      ];
      $this->views->getViews($this, "home", $data);
    }

    public function aboutUs()
    {
      $data = [
        'title' => "Foro Riot Games | Sobre Nosotros",
        'script' => "prueba.js",
      ];
      $this->views->getViews($this, "aboutUs", $data);
    }

    public function guide()
    {
      $data = [
        'title' => "Foro Riot Games | Guia de Uso",
        'script' => "prueba.js",
      ];
      $this->views->getViews($this, "guide", $data);
    }
  }
?>
