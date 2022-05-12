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
			$data['title'] = "Bloqueo";
			$data['script'] = "block.js";
			$this->views->getViews($this,"block",$data);
		}
	}
?>
