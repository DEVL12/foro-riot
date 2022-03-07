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

			$this->model->AddTopic(date("d-m-Y H:i:s A")); // Aqui estoy enviando un valor y llamo a mi modelo y su metodo definido como tal eleji la fecha para que no se repitan
			$temas = $this->model->GetAllTopics(); // seleccionando todos los arreglos
			$data['temas'] = $temas;

			$this->views->getViews($this,"home",$data);
		}

		public function updateTema($params)
		{
			$params = explode(",",$params);

			if(( count($params) == 2 ) && ( is_string($params[0]) == true && is_numeric($params[1]) == true)) {
				$request = $this->model->UpdateTopic($params[0],$params[1]);

				if($request != NULL)
					echo "Datos actualizados correctamente";
				else
					echo "No se pudo actualizar los datos";
			}
			else {
				echo "Los parametros no son correctos";
			}

			//$this->views->getViews($this,"home",$data); Y AQUI FACILMENTE PUEDO PONER UNA VISTA PERO ESO ME ENCARGO YO
		}

		public function deleteTema($params)
		{
			$request = $this->model->DeleteTopic($params);
			if($request != NULL)
				echo "Datos eliminados correctamente";
			else
				echo "No se pudo eliminar los datos";
			//$this->views->getViews($this,"home",$data); Y AQUI FACILMENTE PUEDO PONER UNA VISTA PERO ESO ME ENCARGO YO
		}
	}
?>