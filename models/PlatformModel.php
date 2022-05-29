<?php
  class platformModel extends mysql
  {
    public function __construct() {
      parent::__construct();
    }

    public function GetAllPlatforms() {
      $sql = "SELECT * FROM plataforma";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetPlatformById($id) {
      $sql = "SELECT * FROM plataforma WHERE id = {$id}";
      $request = $this->select($sql);
      return $request;
    }

    public function AddPlatform($name, $image) {
      $sql = "INSERT INTO plataforma (nombre, imagen) VALUES (?,?)";
      $arrData = array($name, $image);
      $request = $this->insert($sql,$arrData);
      return $request;
    }

    public function UpdatePlatform($id, $name, $image) {
      $request = $this->GetPlatformById($id);
      if(!empty($request)) {
        $sql = "UPDATE plataforma SET nombre = ?, imagen = ? WHERE id = {$id}";
        $arrData = array($name, $image);
        $request = $this->update($sql, $arrData);
        return $request;
      }
      else
        return NULL;
    }

    public function DeletePlatform($id) {
      $request = $this->GetPlatformById($id);
      if(!empty($request)){
        $sql = "DELETE FROM plataforma WHERE id = {$id}";
        $request = $this->delete($sql);
        return $request;
      }
      else
        return NULL;
    }
  }
?>
