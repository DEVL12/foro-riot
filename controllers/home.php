<?php 
	class home extends controllers
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function home()
		{
			$data = array();
			$data['titulo'] = "Página principal";
			$data['contenido'] = "Sea bienvenido a nuestro foro :D"; 
			$data['script'] = "prueba.js"; 

			$this->views->getViews($this,"home",$data);
		}
	}
?>