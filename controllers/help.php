<?php
  class help extends controllers
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function help()
    {
      $data = [
        'title' => "Foro Riot Games | Ayuda",
        'script' => "prueba.js",
      ];

      $this->views->getViews($this, "help", $data);
    }

    public function frq_quest($help)
    {
      $data = [
        'title' => "Foro Riot Games | Ayuda - ".$help,
        'script' => "prueba.js",
        'help' => $help.'.php',
      ];

      switch ($help) {
        case 'registro': $data['name_plataform'] = "registro"; break;
        case 'actualizar_perfil': $data['name_plataform'] = "actualizar mi perfil"; break;
        case 'discusion_nueva': $data['name_plataform'] = "añadir una nueva discusión"; break;
        case 'discusion_responder': $data['name_plataform'] = "responder a una discusión"; break;
        default: header("location: ".base_url()."Errors"); break;
      }

      $this->views->getViews($this, 'frq_quest', $data);
    }
  }
?>
