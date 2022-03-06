<?php
class BaseModel
	{
        protected $result;
        protected $response;
        protected $sql;
        protected $connection;

		public function __construct()
		{
			$host = "localhost";   //HOST//
            $user = "root";	 	   //USUARIO DEL HOST//
            $pass = "";	           //CONTRASEÑA//
            $db = "riot_foro";   //BASE DE DATOS//
            $this->connection = mysqli_connect($host,$user,$pass,$db);
		}

        protected function GetRows()
        {
            $rows = array();
            while($row = $this->result->fetch_assoc()){
                $rows[] = $row;
            }
            if(count($rows) >= 2)
                return $rows;
            else{
                if(empty($rows))
                    return $rows;
                else
                    return $rows[0];
            }
        }
    }
?>