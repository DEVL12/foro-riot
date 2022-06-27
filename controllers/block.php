<?php
  class block extends controllers
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function blockuser($name_player) {
      if(empty($name_player))
        header("location: ".base_url()."Errors");

      $request_user = $this->model->GetPlayer_byName($name_player);

      (!empty($request_user))
      ? $data = ['title' => 'Bloqueo - Riot Games', 'script' => "block.js", 'User' => $request_user]
      : header("location: ".base_url()."Errors");

      $this->views->getViews($this,"block",$data);
    }
  }
?>
