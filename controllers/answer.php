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
			$data['titulo'] = "Respuestas";
			$data['contenido'] = "Esta es la vista sobre las respuestas";
			$data['script'] = "prueba.js";

			$request = "Hola :D";

			// $request  = $this->model->GetAnswerById(5); FUNCIONA
			// $request = $this->model->GetVisibleAnswers(); FUNCIONA
			// $request = $this->model->GetAllAnswersOfADiscussion(8); FUNCIONA
			// $request = $this->model->GetAllAnswersOfAPlayer(2); FUNCIONA
			// $request = $this->model->GetNumberOfAnswersOfAPlayer(2); FUNCIONA
			// $request = $this->model->GetAnswersByAproxField(); --> No se que parametros enviar exactamente :c
			// $request = $this->model->AddAnswer("Contenido1", "imagen.jpg", 2, 8, 8, "discusion"); FUNCIONA <- Esta funcion devuelve el ultimo id ingreado y si no es que hubo un error
			// $request = $this->model->UpdateAnswer(5, "Editando", "Imagen2.png"); FUNCIONA <- DEVUELVE 1 si se actualizo correctamente
			//$request = $this->model->DeleteAnswer(6); FUNCIONA <- DEVUELVE 1 si se elimino correctamente

			dep($request); // Mostrando los arreglos de datos adquiridos o los estado del update o select antes de llamar a la vista
			$this->views->getViews($this,"answer",$data);
		}
  }
?>
