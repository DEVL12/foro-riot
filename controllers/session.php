<?php
  class session extends controllers {
    public function __construct() {
      parent::__construct();
    }

    public function login() {
      $data['title'] = "Foro Riot Games - Iniciar sesión";
      $this->views->getViews($this,"login",$data);
    }

    public function register() {
      $data['title'] = "Foro Riot Games - Registro";
      $this->views->getViews($this,"register",$data);
    }

    public function setNewUser() {
      $name = strClean($_POST['username']);
      $email = strClean($_POST['email']);
      $password = strClean($_POST['password']);
      $request_Account = $this->model->VerifyAccount($name, $email);

      if($request_Account === false) {
        $requets = $this->model->AddUser($name, $email, $password);
        if($requets > 0) {
          $arrResponse = ['status' => true, 'msg' => 'USUARIO REGISTRADOR CORRECTAMENTE'];
        } else {
          $arrResponse = ['status' => false, 'msg' => 'OCURRIO UN ERROR AL REGISTRAR EL USUARIO'];
        }
      } else {
        $arrResponse = ['status' => false, 'msg' => $request_Account];
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
    }

    public function getUser() {
      $name = strClean($_POST['username']);
      $password = strClean($_POST['password']);
      $requets_login = $this->model->CheckLogIn($name, $password);

      if(is_array($requets_login) === true) {
        if(isset($requets_login[0]['fecha_tope'])) {
          $text = "TU CUENTA ESTA BANEADA";
          for($i = 1; $i <= count($requets_login); $i++) {
            $text .= "<br>{$i}) Motivo: {$requets_login[$i-1]['motivo_bloqueo']}<br>Fecha de vencimiento: {$requets_login[$i-1]['fecha_tope']}<hr>";
          }
          $arrResponse = ['status' => false, 'msg' => "BLOQUEADO", 'ban_info' => $text];
        } else {
          $arrResponse = ['status' => true, 'msg' => 'USUARIO LOGUEADO CORRECTAMENTE'];
          $_SESSION = ['dataUser' => $requets_login, 'islogin' => true];
        }
      } else {
        $arrResponse = ['status' => false, 'msg' => 'DATOS INCORRECTOS'];
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
    }

    public function GetPlayerById($id) {
      if(!empty($id)) {
        $request_player = $this->model->GetPlayerById($id);

        $arrResponse = (!empty($request_player))
          ? ['status' => true, 'data' => $request_player['nombre_jugador']]
          : ['status' => false];
      } else {
        $arrResponse = ['status' => false];
      }

      echo json_encode($arrResponse, JSON_UNESCAPED_UNICODE);
      die();
    }

    public function logout() {
      session_unset();
      session_destroy();
      header('location: '.Base_url().'Home');
    }
  }
?>
