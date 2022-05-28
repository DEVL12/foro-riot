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

      $requets = $this->model->AddUser($name, $email, $password);
      echo $requets;

      die();
    }
  }
?>
