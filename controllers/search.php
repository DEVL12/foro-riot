<?php
  class search extends controllers
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function search()
    {
      $data = [
        'title' => 'Foro Riot Games - Búsqueda',
        'script' => 'search.js',
      ];

      $this->views->getViews($this,"search",$data);
    }

    public function search_forum()
    {
      dep($_POST);
    }
  }
?>
