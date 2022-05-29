<?php
  class discussion extends controllers
  {
    public function __construct() {
      parent::__construct();
    }

    public function discussion() {
      $discussion = $this->model->GetAllDiscussions();
      $plataforms = $this->model->GetAllPlatforms(); //Vere como mejoro esto xd

      $data = [
        'title' => "Foro general - Riot Games",
        'script' => "discussion.js",
        'discussion' => !empty($discussion) ? $discussion : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay discusiones registradas.</h1>',
        'plataforms' => !empty($plataforms) ? $plataforms : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay videojuegos registrados.</h1>',
        'name_plataform' => "Riot Games"
      ];

      $this->views->getViews($this,"discussion",$data);
    }

    public function foro($name_plataform) {
      $discussion = $this->model->GetAllDiscussionsByPlataform($name_plataform);
      $plataforms = $this->model->GetAllPlatforms(); //Vere como mejoro estox2 xd

      $data = [
        'title' => "Foro {$name_plataform} - Riot Games",
        'script' => "discussion.js",
        'discussion' => !empty($discussion) ? $discussion : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay discusiones registradas.</h1>',
        'plataforms' => !empty($plataforms) ? $plataforms : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay videojuegos registrados.</h1>',
        'name_plataform' => $name_plataform,
      ];

      $this->views->getViews($this,"discussion",$data);
    }

    public function newdiscussion() {
      $data = array();
      $data['title'] = "Foro Riot Games";
      $data['script'] = "newdiscussion.js";
      $this->views->getViews($this,"newdiscussion",$data);
    }
  }
?>
