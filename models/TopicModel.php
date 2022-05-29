<?php
  class topicModel extends mysql
  {
    public function __construct() {
      parent::__construct();
    }

    public function GetTopic($id)  {
      $sql = "SELECT * FROM tema WHERE id = {$id}";
      $request = $this->select($sql);
      return $request;
    }

    public function GetAllTopics() {
      $sql = "SELECT * FROM tema";
      $request = $this->select_all($sql);
      return $request;
    }

    public function AddTopic($name) {
      $sql = "INSERT INTO tema (nombre) VALUES (?)";
          $arrData = array($name);
      $request = $this->insert($sql,$arrData);
      return $request;
    }

    public function UpdateTopic($name, $id) {
      $request = $this->GetTopic($id);
      if(!empty($request)) {
        $sql = "UPDATE tema SET nombre = ? WHERE id = $id";
        $arrData = array($name);
        $request = $this->update($sql, $arrData);
        return $request;
      }
      else
        return NULL;
    }

    public function DeleteTopic($id) {
      $request = $this->GetTopic($id);
      if(!empty($request)){
        $sql = "DELETE FROM tema WHERE id = {$id}";
        $request = $this->delete($sql);
        return $request;
      }
      else
        return NULL;
    }
  }
?>
