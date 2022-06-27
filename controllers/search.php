<?php
  class search extends controllers
  {
    public function __construct()
    {
      session_start();
      parent::__construct();
    }

    public function search()
    {
      $plataforms = $this->model->GetAllPlatforms();
      $topic = $this->model->GetAllTopics();

      $data = [
        'title' => 'Foro Riot Games - Búsqueda',
        'script' => 'search.js',
        'plataforms' => !empty($plataforms) ? $plataforms : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay videojuegos registrados.</h1>',
        'topic' => !empty($topic) ? $topic : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay tematicas registradas .</h1>',
      ];

      $this->views->getViews($this,"search",$data);
    }

    public function search_forum()
    {
      dep($_POST);
    }
  }
?>
