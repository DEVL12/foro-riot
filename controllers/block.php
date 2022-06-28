<?php
  class block extends controllers
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function blockuser($name_player) {
      if(isset($_SESSION['islogin'])) {
        if($_SESSION['dataUser']['rol'] != "admin") {
          header("location: ".base_url()."Errors");
        }
      }

      if(empty($name_player))
        header("location: ".base_url()."Errors");

      $request_user = $this->model->GetPlayer_byName($name_player);

      (!empty($request_user))
        ? $data = ['title' => 'Bloqueo - Riot Games', 'script' => "block.js", 'user' => $request_user]
        : header("location: ".base_url()."Errors");

      $this->views->getViews($this,"block",$data);
    }

    public function add_block()
    {
      if(isset($_SESSION['islogin'])) {
        if($_SESSION['dataUser']['rol'] != "admin") {
          header("location: ".base_url()."Errors");
        }
      }

      $id_player = strClean($_POST['id_player']);
      $date = strClean($_POST['date']);
      $mensaje = strClean($_POST['mensaje']);

      $request_block = $this->model->AddBlock($id_player, $date, $mensaje);
      ($request_block > 0)
        ? $arrResponse = ['status' => true]
        : $arrResponse = ['status' => false];

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
    }

    public function Check_bans()
    {
      $this->model->UpdateBans();
      if(isset($_SESSION['islogin'])) {
        $request_ban = $this->model->GetAllActivesBlocksOfAPlayer($_SESSION['dataUser']['id_jugador']);

        if(!empty($request_ban))
          header("location: ".base_url()."session/logout");
      }
    }
  }
?>
