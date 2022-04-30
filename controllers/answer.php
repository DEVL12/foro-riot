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

		public function reply($forum)
		{
			if($forum == "")
				header("location: ".base_url()."Errors");

			$data = array();
			$data['title'] = $forum." - Respondiendo";
			$data['script'] = "prueba.js";
			$this->views->getViews($this,"reply",$data);
		}
  }
?>
