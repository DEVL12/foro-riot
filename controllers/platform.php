<?php
  class platform extends controllers
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function platform()
    {
      $data = array();
      $data['titulo'] = "Plataformas";
      $data['contenido'] = "Vista de las Plataformas";
      $data['script'] = "prueba.js";

      $request = "HOLA :D";

      // $request = $this->model->GetAllPlatforms(); FUNCIONA
      // $request = $this->model->GetPlatformById(); FUNCIONA
      // $request = $this->model->AddPlatform("Lol-2","Imagen.png"); FUNCIONA
      // $request = $this->model->UpdatePlatform(10,"Lol-3","Imagen2.png"); FUNCIONA
      // $request = $this->model->DeletePlatform(10); FUNCIONA

      if($request == NULL)
        echo "No se encontró";
      else
        dep($request);

      $this->views->getViews($this,"platform",$data);
    }
  }
?>
