<?php
  class admin extends controllers
  {
    public function __construct()
    {
      session_start();
      parent::__construct();
    }

    public function admin()
    {
      $data = [
        'title' => "Foro Riot Games | Administrador",
        'script' => "prueba.js",
      ];
                           //ADMIN  //la vista
      $this->views->getViews($this, "admin", $data);
    }

    public function admin_delete_foro()
    {
      $data = [
        'title' => "Foro Riot Games | Administrador",
        'script' => "prueba.js",
      ];
                           //ADMIN  //la vista
      $this->views->getViews($this, "admin_foro", $data);
    }
  }
?>
