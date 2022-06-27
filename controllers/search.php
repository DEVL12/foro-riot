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
      $query = " WHERE ";
      if(!empty($_POST['keywords']))
        $query .= ($_POST['postthread'] != 1) ? "titulo LIKE '%{$_POST['keywords']}%' AND " : "contenido_discusion LIKE '%{$_POST['keywords']}%' AND ";


      if(!empty($_POST['author']))
        $query .= (isset($_POST['matchusername'])) ? "nombre_jugador = '{$_POST['author']}' AND " : "nombre_jugador LIKE '%{$_POST['author']}%' AND ";


      if(!empty($_POST['plataforms']))
        $query .= "id_plataforma = {$_POST['plataforms']} AND ";


      if(!empty($_POST['plataforms']))
        $query .= "id_plataforma = {$_POST['plataforms']} AND ";

      if(!empty($_POST['topic']))
        $query .= "id_tema = {$_POST['topic']} AND ";

      $query = ($query !== " WHERE ") ? trim($query," AND ") : " ";

      $request_foro = $this->model->GetAll_ResultsForums($query);

      (!empty($request_foro))
        ? $arrResponse = ['status' => true, 'data' => $request_foro]
        : $arrResponse = ['status' => false, 'msg' => 'Lo sentimos, no hemos encontrado ninguna discusión con los datos insertados'];

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
    }
  }
?>
