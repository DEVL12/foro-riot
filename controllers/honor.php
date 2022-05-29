<?php
  class honor extends controllers
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function honor()
    {
      $data = array();
      $data['titulo'] = "Honores";
      $data['contenido'] = "Vista de los honores";
      $data['script'] = "prueba.js";

      $request = "HOLA :D";

      // $request = $this->model->GetHonorsOfAPlayer(1); SUPONGO QUE FUNCIONA XD Igualmente averigua si debe funcionar asi
      // $request = $this->model->GetHonor(1, 5, "respuesta"); FUNCIONA
      // $request = $this->model->AddHonor(3, 8, "respuesta", 1); FUNCIONA
      // $request = $this->model->UpdateHonor(23, 8, "respuesta", 2); FUNCIONA
      // $request = $this->model->DeleteHonor(5); FUNCIONA

      if($request == NULL)
        echo "No se encontró";
      else
        dep($request);

      $this->views->getViews($this,"honor",$data);
    }
  }
?>
