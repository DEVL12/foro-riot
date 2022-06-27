<?php
  class player extends controllers
  {
    public function __construct()
    {
      session_start();
      parent::__construct();
    }

    public function profile($name_player)
    {
      if(empty($name_player))
        header("location: ".base_url()."Errors");

      $request_user = $this->model->GetPlayer($name_player);

      (!empty($request_user))
        ? $data = ['title' => "Foro Riot Games - Perfil de " . $name_player, 'script' => "player.js", 'User' => $request_user]
        : header("location: ".base_url()."Errors");

      $this->views->getViews($this,"player",$data);
    }
  }
?>
