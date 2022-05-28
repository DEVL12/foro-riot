<?php
  class session extends controllers {
    public function __construct() {
      parent::__construct();
    }

    public function login() {
      $data = array();
      $data['title'] = "Foro Riot Games - Iniciar sesión";
      $this->views->getViews($this,"login",$data);
    }

    public function register() {
      $data = array();
      $data['title'] = "Foro Riot Games - Registro";
      $this->views->getViews($this,"register",$data);
    }

    public function setNewUser() {
      $name = strClean($_POST['username']);
      $email = strClean($_POST['email']);
      $password = strClean($_POST['password']);

      $request_Account = $this->model->VerifyAccount($name, $email);
      if($request_Account === false ) {
        $requets = $this->model->AddUser($name, $email, $password);
        if($requets > 0) {
          $arrResponse = array('status' => true, 'msg' => 'USUARIO REGISTRADOR CORRECTAMENTE');
        } else {
          $arrResponse = array('status' => false, 'msg' => 'OCURRIO UN ERROR AL REGISTRAR EL USUARIO. INTENTELO MAS TARDE');
        }
      } else {
        $arrResponse =  array('status' => false, 'msg' => $request_Account);
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
    }
  }
?>
