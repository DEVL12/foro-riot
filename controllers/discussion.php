<?php
	class discussion extends controllers
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function discussion()
		{
			$data = array();
			$data['title'] = "Foro Riot Games";
			$data['script'] = "discussion.js";
			$this->views->getViews($this,"discussion",$data);
		}
	}
?>
