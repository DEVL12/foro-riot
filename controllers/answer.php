<?php
  class answer extends controllers
  {

    public function __construct()
    {
      session_start();
      parent::__construct();
    }

    public function answers_for($id_discussion)
    {
      $answers = $this->model->GetAllAnswersOfADiscussion($id_discussion);
      $honors = [[], []];

      array_push($honors[0], $this->model->GetHonorsOf($id_discussion,'discusion'));


      for($i = 0; $i < count($answers); $i++){
        array_push($honors[1], $this->model->GetHonorsOf($answers[$i]['id_respuesta'],'respuesta'));
      }

      $discussion = $this->model->GetDiscussion($id_discussion);
      array_push($discussion, $this->model->GetPlayerData($discussion[0]['fk_jugador']));
      $final = $discussion[0];
      array_push($final, $discussion[1]);

      $data = [
        'title' =>  $discussion[0]['titulo']." - Respuestas",
        'script' => "answer.js",
        'data_answers' => (!empty($answers)) ? $answers : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay respuestas registradas.</h1>',
        'honors' => $honors,
        'discussion' => $final
      ];

      $this->views->getViews($this,"answer",$data);
    }

    public function reply($forum)
    {
      if(empty($forum))
        header("location: ".base_url()."Errors");

      $discussion = $this->model->GetTitleAndNameOfADiscussionByid($forum);
      $answers = $this->model->GetAllAnswersOfADiscussion($forum);
      if (empty($discussion)) header("location: ".base_url()."Errors");

      $data = [
        'title' => $discussion['titulo']." - Respondiendo",
        'discussion' => $discussion,
        'data_answers' => (!empty($answers)) ? $answers : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay respuestas registradas.</h1>',
        'script' => 'reply.js',
      ];

      $this->views->getViews($this,"reply",$data);
    }

    public function add_answer()
    {
      $id_discusion = strClean($_POST['id_discusion']);
      $message = strClean($_POST['message']);
      $id_usuario = $_SESSION['dataUser']['id_jugador'];

      if(empty($this->model->GetTitleAndNameOfADiscussionByid($id_discusion)))
        header("location: ".base_url()."Errors");

      $request_answer = $this->model->AddAnswer($message, $id_usuario, $id_discusion);
      ($request_answer > 0)
        ? $arrResponse = ['status' => true, 'msg' => 'Tu repuesta fue enviada correctamente', 'direction' => $id_discusion]
        : $arrResponse = ['status' => false, 'msg' => 'Ocurrio un error al momento de enviar tu respuesta. intentelo mas tarde'];

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
    }
  }
?>
