<?php
  class discussion extends controllers
  {
    public function __construct() {
      session_start();
      parent::__construct();
    }

    public function discussion($name_plataform) {
      $discussion = (empty($name_plataform))
        ? $this->model->GetAllDiscussions()
        : $this->model->GetAllDiscussionsByPlataform($name_plataform);
      $plataforms = $this->model->GetAllPlatforms();
      $honors = [];

      for($i = 0; $i < count($discussion); $i++) {
        $honors[$i] = $this->model->GetDiscussionHonors($discussion[$i]["id_discusion"]);
        if($honors[$i] == null)
          $honors[$i] = 0;
      }

      $data = [
        'title' => empty($name_plataform) ? "Foro general - Riot Games" : "Foro {$name_plataform} - Riot Games",
        'script' => "discussion.js",
        'discussion' => !empty($discussion) ? $discussion : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay discusiones registradas.</h1>',
        'plataforms' => !empty($plataforms) ? $plataforms : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay videojuegos registrados.</h1>',
        'honors' => !empty($honors) ? $honors : '<h1 style="color: rgba(186, 51, 64, 1);"></h1>',
        'name_plataform' => empty($name_plataform) ? "Riot Games" : $name_plataform,
      ];

      $this->views->getViews($this,"discussion",$data);
    }

    public function foro($name_plataform){
      $this->discussion($name_plataform);
    }

    public function newdiscussion() {
      $plataforms = $this->model->GetAllPlatforms();
      $topic = $this->model->GetAllTopics();

      $data = [
        'title' => 'Foro Riot Game',
        'script' => 'newdiscussion.js',
        'plataforms' => !empty($plataforms) ? $plataforms : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay videojuegos registrados.</h1>',
        'topic' => !empty($topic) ? $topic : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay tematicas registradas .</h1>',
      ];

      $this->views->getViews($this,"newdiscussion",$data);
    }


    public function add_discussion()
    {
      $titulo = strClean($_POST['titulo']);
      $id_usuario = $_SESSION['dataUser']['id_jugador'];
      $mensaje = strClean($_POST['mensaje']);
      $tema = strClean($_POST['tema']);
      $plataformas = strClean($_POST['plataformas']);
      $request_discussion = $this->model-> AddDiscussion($titulo, $id_usuario, $mensaje, $tema, $plataformas);

      ($request_discussion > 0)
        ? $arrResponse = ['status' => true, 'msg' => 'Tu discusión creada correctamente']
        : $arrResponse = ['status' => false, 'msg' => 'Ocurrio un error al crear la discusión. intentelo mas tarde'];

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
    }
  }
?>
