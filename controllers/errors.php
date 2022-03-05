<?php 
	class errors extends controllers
	{
		public function __construct()
		{
			parent::__construct();
		}

		public function notFound()
		{
			$this->views->getViews($this,"errors");
		}
	}
	
	$notFound = new errors;
	$notFound->notFound();
?>