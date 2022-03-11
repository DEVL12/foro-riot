<?php
	class player extends controllers
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function player()
		{

			$data = array();
			$data['titulo'] = "Honores";
			$data['contenido'] = "Vista de los honores";
			$data['script'] = "prueba.js";

      $request = "HOLA :D";

      // $request = $this->model->GetPlayersByAproxField(); NO SE QUE PARAMETROS PONER :P
      // $request = $this->model->GetPlayerById(1); FUNCIONA
      // $request = $this->model->AddPlayer("DEVL12", "imagen.png", "jose@gmail.com", "17/08/02", "DEVL12! :3","nose"); FUNCIONA
      // $request = $this->model->UpdatePlayer(4, "DEVL12_2","Otraimagen.png","NOSE","1"); FUNCIONA
      // $request = $this->model->TryLogIn("NOSE","1"); FUNCIONA EXCELENTE :D Problemente estas funciones las ponga en un contralor destinado al login

      if($request == NULL)
        echo "No se encontró";
      else
        dep($request);

			$this->views->getViews($this,"player",$data);
		}
	}
?>
