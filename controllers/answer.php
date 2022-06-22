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
        'title' => "tal usuario - Respuestas",
        'script' => "answer.js",
        'data_answers' => (!empty($answers)) ? $answers : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay respuestas registradas.</h1>',
        'honors' => $honors,
        'discussion' => $final
      ];

      $this->views->getViews($this,"answer",$data);
    }

    public function reply($forum)
    {
      if($forum == "")
        header("location: ".base_url()."Errors");

      $data = array();
      $data['title'] = $forum." - Respondiendo";
      $data['script'] = "reply.js";
      $this->views->getViews($this,"reply",$data);
    }
  }
?>
