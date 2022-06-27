<?php
  class topic extends controllers
  {
    public function __construct()
    {
      session_start();
      parent::__construct();
    }

    public function topic()
    {
      $data = array();
      $data['titulo'] = "Temas";
      $data['contenido'] = "Vista de los Temas";
      $data['script'] = "prueba.js";

      $request = "HOLA :D";

      // $request = $this->model->GetTopic(1); FUNCIONA
      // $request = $this->model->GetAllTopics(); FUNCIONA
      // $request = $this->model->AddTopic("XD"); FUNCIONA
      // $request = $this->model->UpdateTopic("DX", 47); FUNCIONA
      // $request = $this->model->DeleteTopic(47); FUNCIONA

      if($request == NULL)
        echo "No se encontró";
      else
        dep($request);

      $this->views->getViews($this,"topic",$data);
    }
  }
?>
