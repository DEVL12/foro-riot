<?php
	class block extends controllers
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function block()
		{
			$data = array();
			$data['titulo'] = "Bloqueo";
			$data['contenido'] = "Esta es la vista sobre los bloqueos";
			$data['script'] = "prueba.js";

      $request = "Hola :D";

      // $request = $this->model->GetBlock(1); FUNCIONA
      // $request = $this->model->GetAllBlocksOfAPlayer(1); FUNCIONA

			/*
				$DEADLINE = date("d-m-Y",strtotime(date("d-m-Y")."+ 100 days"));
				$request = $this->model->AddBlock(1, $DEADLINE, "troll"); FUNCIONA
			*/

      // $request = $this->model->RemoveBlock(1); FUNCIONA
      // $request = $this->model->RemoveLastBlockOfAPlayer(1); FUNCIONA

			dep($request); // Mostrando los arreglos de datos adquiridos o los estado del update o select antes de llamar a la vista
			$this->views->getViews($this,"block",$data);
		}
	}
?>
