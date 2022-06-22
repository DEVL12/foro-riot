<?php
  class honor extends controllers
  {
    public function __construct()
    {
      parent::__construct();
    }

    public function honor()
    {
      $data = array();
      $data['titulo'] = "Honores";
      $data['contenido'] = "Vista de los honores";
      $data['script'] = "prueba.js";
      $this->views->getViews($this,"honor",$data);
    }

    public function AddHonor($data)
    {
      $arr_data = explode(",",$data);
      $id_player =$arr_data[0];
      $id_target =$arr_data[1];
      $target_type =$arr_data[2];
      $honor =$arr_data[3];
      $exist = $this->model->GetHonor($id_target, $target_type, $id_player);

      if(!empty($exist)) {
        if ($exist['puntaje'] == $honor) {
          $request_honor = $this->model->DeleteHonor($exist['id_honor']);
          $arrResponse = (!empty($request_honor))
            ? ['status' => true , 'msg' => "Su honor fue removido de esta publicación correctamente"]
            : ['status' => false, 'msg' => "Ocurrio un error al momento de eliminar el honor, intente más tarde"];
        } else {
          $request_honor = $this->model->UpdateHonor($exist['id_honor'], $honor);
          $arrResponse = (!empty($request_honor))
            ? ['status' => true , 'msg' => "Su honor fue modificado en esta publicación correctamente"]
            : ['status' => false, 'msg' => "Ocurrio un error al momento de modificar el honor, intente más tarde"];
        }
      } else {
        $request_honor = $this->model->AddHonor($id_player, $id_target, $target_type, $honor);
        $arrResponse = (!empty($request_honor))
            ? ['status' => true , 'msg' => "El honor fue añadido en esta publicación correctamente"]
            : ['status' => false, 'msg' => "Ocurrio un error al momento de añadir el honor, intente más tarde"];
      }
      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
    }
    public function GetHonor($data)
    {
      if(!empty($data)) {
        $arr_data = explode(",",$data);

        $request_honor = ($arr_data[0] == 'discusion')
          ? $this->model->GetHonorsOfADiscussion($arr_data[1])
          : $this->model->GetHonorsOfAnAnswer($arr_data[1]);

        $arrResponse = (!empty($request_honor))
          ? ['status' => true, 'data' => $request_honor]
          : ['status' => false];
      } else {
        $arrResponse = ['status' => false];
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
    }
  }
?>
