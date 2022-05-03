<?php
	class search extends controllers
	{
		public function __construct()
		{
			parent::__construct();
		}

    public function search()
		{
			$data = array();
			$data['title'] = "Foro Riot Games - Búsqueda";
			$data['script'] = "search.js";
			$this->views->getViews($this,"search",$data);
		}
  }
?>
