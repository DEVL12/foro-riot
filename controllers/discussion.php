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
			$data['titulo'] = "Discusiones";
			$data['contenido'] = "Vista de las discusiones";
			$data['script'] = "prueba.js";
      $request = "HOLA :D";

      // $request = $this->model->GetAllDiscussions(); FUNCIONA
      // $request = $this->model->GetDiscussionById(8); FUNCIONA
      // $request = $this->model->GetVisibleDiscussions(); FUNCIONA
      // $request = $this->model->GetNumberOfDiscussionOfAPlayer(1); FUNCIONA
      // $request = $this->model->GetDiscussionsOfAnUser(1); FUNCIONA
      // $request = $this->model->GetDiscussionsByAproxField(); NO SE QUE PARAMETROS PONER XD pero creo que funciona
      // $request = $this->model->AddDiscussion("Hola", 1, "Holax2", "Queja", "Legends of Runaterra", "Imagen.png"); FUNCIONA
      // $request = $this->model->UpdateDiscussion(10, "Adios", "Hasta la vista","OtraImagen.png"); FUNCIONA
      // $request = $this->model->ChangeDiscussionState(10, "oculta"); FUNCIONA
      // $request = $this->model->DeleteDiscussion(10); FUNCIONA

      if($request === NULL)
        echo "No se encontró";
      else
        dep($request);

			$this->views->getViews($this,"discussion",$data);
		}
	}
?>
