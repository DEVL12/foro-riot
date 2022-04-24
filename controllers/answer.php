<?php
	class answer extends controllers
	{
		public function __construct()
		{
			parent::__construct();
		}

    public function answer()
		{
			$data = array();
			$data['title'] = "tal usuario - Respuestas";
			$data['script'] = "prueba.js";
			$this->views->getViews($this,"answer",$data);
		}
  }
?>
