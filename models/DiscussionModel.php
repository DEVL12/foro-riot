<?php
	class discussionModel extends mysql
	{
		public function __construct() {
			parent::__construct();
		}

    public function GetAllDiscussions() {
      $sql = "SELECT * FROM discusion";
      $request = $this->select_all($sql);
      return $request;
    }

    public function GetDiscussionById($id) {
      $sql = "SELECT * FROM discusion WHERE id = {$id}";
			$request = $this->select($sql);
			return $request;
    }

		public function GetVisibleDiscussions() {
			$sql = "SELECT * FROM discusion WHERE estado != 'oculta'";
			$request = $this->select($sql);
			return $request;
		}

    public function GetNumberOfDiscussionOfAPlayer($playerId) {
      $sql = "SELECT COUNT(id) FROM discusion WHERE id_autor =$playerId";
			$request = $this->select($sql);
			return $request;
    }

    public function GetDiscussionsByAproxField($field, $search) {
      $sql = "SELECT * FROM discusion WHERE $field LIKE '%$search%'";
			$request = $this->select($sql);
			return $request;
    }

    public function GetDiscussionsOfAnUser($id) {
      $sql = "SELECT * FROM discusion WHERE id_autor={$id}";
			$request = $this->select($sql);
			return $request;
    }

    public function AddDiscussion($title, $authorId, $content, $topic, $platform, $image) {
      $sql = "INSERT INTO discusion (titulo, id_autor, contenido, contenido_original,
                    editado, tema, plataforma, imagen, fecha, hora, estado)
            VALUES (?, ?, ?, ?, 0, ?, ?, ?, '". date('d/m/Y') . "', '" . date('G:i') . "', 'abierta')";
      $arrData = array($title, $authorId, $content, $content, $topic, $platform, $image);
      $request = $this->insert($sql,$arrData);
      return $request;
    }

    public function UpdateDiscussion($id, $title, $content, $image) {
      $request = $this->GetDiscussionById($id);
			if(!empty($request)) {
				$sql = "UPDATE discusion SET titulo = ?, contenido = ?, editado = 1, imagen = ? WHERE id = {$id}";
				$arrData = array($title, $content, $image);
				$request = $this->update($sql, $arrData);
				return $request;
			}
			else
				return NULL;
    }

    public function ChangeDiscussionState($id, $state){
      $request = $this->GetDiscussionById($id);
			if(!empty($request)) {
				$sql = "UPDATE discusion SET estado=? WHERE id={$id}";
				$arrData = array($state);
				$request = $this->update($sql, $arrData);
				return $request;
			}
			else
				return NULL;
    }

    public function DeleteDiscussion($id) {
      $request = $this->GetDiscussionById($id);
			if(!empty($request)) {
				$sql = "DELETE FROM honor WHERE id_objetivo = {$id} AND tipo_objetivo = 'discusion'";
				$request = $this->delete($sql);
				$sql = "DELETE FROM discusion WHERE id = {$id}";
				$request = $this->delete($sql);
				return $request;
			}
			else
				return NULL;
    }
	}
?>
