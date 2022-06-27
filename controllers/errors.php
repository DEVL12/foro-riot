<?php
  class errors extends controllers
  {
    public function __construct()
    {
      session_start();
      parent::__construct();
    }

    public function notFound()
    {
      $data = array();
      $data['title'] = "Foro Riot Games - ERROR";
      $data['script'] = "prueba.js";
      $this->views->getViews($this,"errors", $data);
    }
  }

  $notFound = new errors;
  $notFound->notFound();
?>
