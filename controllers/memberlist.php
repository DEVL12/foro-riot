<?php
  class memberList extends controllers
  {
    public function __construct()
    {
      session_start();
      parent::__construct();
    }

    public function memberList()
    {
      $data = array();
      $data['title'] = "Foro Riot Games - Lista de miembros";
      $data['script'] = "memberList.js";
      $this->views->getViews($this, "memberList", $data);
    }
  }
?>
