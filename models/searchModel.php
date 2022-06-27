<?php
  class searchModel extends mysql // luego veo cual conviene mas
  {
    public function __construct() {
      parent::__construct();
    }

    public function GetAllPlatforms() {
      $sql = "SELECT * FROM plataforma";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetAllTopics() {
      $sql = "SELECT * FROM tema";
      $request = $this->select_all($sql);
      return $request;
    }
  }
?>
