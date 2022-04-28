<?php
	class player extends controllers
	{
		public function __construct()
		{
			parent::__construct();
		}

	  public function profile($Usuario = "")
		{
			if($Usuario == "")
			header("location: ".base_url()."Errors");

			$data = array();
			$data['title'] = "Foro Riot Games - Perfil de " . $Usuario;
			$data['script'] = "prueba.js";

			$this->views->getViews($this,"player",$data);
		}
	}
?>
