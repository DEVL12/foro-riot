<?php
  class mysql extends conexion
  {
    private $conexion;
    private $strQuery;
    private $arrValues;

    function __construct()
    {
      $this->conexion = new conexion();
      $this->conexion = $this->conexion->conect();
    }

    public function insert(string $Query, array $arrvalues)
    {
      $this->strQuery = $Query;
      $this->arrValues = $arrvalues;

      $Insert = $this->conexion->prepare($this->strQuery);
      $ResInsert = $Insert->execute($this->arrValues);

      if($ResInsert)
      {
        $lastInsert = $this->conexion->lastInsertId();
      }
      else
      {
        $lastInsert = 0;
      }

      return $lastInsert;
    }

    public function select(string $Query)
    {
      $this->strQuery = $Query;

      $Result = $this->conexion->prepare($this->strQuery);
      $Result->execute();
      $Data = $Result->fetch(PDO::FETCH_ASSOC);
      return $Data;
    }

    public function select_all(string $Query)
    {
      $this->strQuery = $Query;

      $Result = $this->conexion->prepare($this->strQuery);
      $Result->execute();
      $Data = $Result->fetchall(PDO::FETCH_ASSOC);
      return $Data;
    }

    public function update(string $Query, array $arrvalues)
    {
      $this->strQuery = $Query;
      $this->arrValues = $arrvalues;

      $Update = $this->conexion->prepare($this->strQuery);
      $ResUpdate = $Update->execute($this->arrValues);
      return $ResUpdate;
    }

    public function delete(string $Query)
    {
      $this->strQuery = $Query;

      $Result = $this->conexion->prepare($this->strQuery);
      $Delete = $Result->execute();
      return $Delete;
    }
  }
?>
