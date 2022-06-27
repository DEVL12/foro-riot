<?php
class ReportsModel extends mysql
{
  public function __construct() {
    parent::__construct();
  }
  //funciones publicas
  public function Getdiscussions() { //obtener todas las discusiones
    $sql = $this->QueryDiscusions(); // Lo converti en una funcion porque el query era muy extenso y se repetia
    $request = $this->select_all($sql);
    return $request;
  }

  public function Getplayers() { //obtener a todos los jugadores
    $sql = $this->QueryPlayers(); // Lo converti en una funcion porque el query era muy extenso y se repetia
    $request = $this->select_all($sql);
    return $request;
  }

  public function Getbans() { //obtener a todos los caidos toxicos
    $sql = $this->QueryBans(); // Lo converti en una funcion porque el query era muy extenso y se repetia
    $request = $this->select_all($sql);
    return $request;
  }

  public function Getanswers() { //obtener todas las respuestas
    $sql = $this->QueryAnswers(); // Lo converti en una funcion porque el query era muy extenso y se repetia
    $request = $this->select_all($sql);
    return $request;
  }

  public function GetRangoFechas(string $desde, string $hasta) { //filtrar los reportes de discusiones por fechas
    $sql = "SELECT * FROM discusion
        INNER JOIN jugador ON discusion.fk_jugador = jugador.id_jugador
        WHERE fecha_discusion BETWEEN '$desde' AND '$hasta'";
    $request = $this->select_all($sql);
    return $request;
  }

  public function GetRangotimeAns(string $desde, string $hasta) { //filtrar los reportes de respuestas por fechas
    $sql = "SELECT * FROM respuesta
        INNER JOIN jugador ON respuesta.fk_jugador = jugador.id_jugador
        WHERE fecha_respuesta BETWEEN '$desde' AND '$hasta'";
    $request = $this->select_all($sql);
    return $request;
  }

  public function GetAllPlatforms() { //solicitar las plataformas
    $sql = "SELECT * FROM plataforma";
    $request = $this->select_all($sql);
    return $request;
  }

  public function GetAllTopics() { //solicitar los temas
    $sql = "SELECT * FROM tema";
    $request = $this->select_all($sql);
    return $request;
  }

  public function GetNumberOfDiscussionOfPlayer(string $playerId) { //numero de discusiones de un jugador
    $sql = "SELECT COUNT(id_discusion) AS cantidad FROM discusion WHERE fk_jugador = '$playerId'";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetNumberOfAnswersOfPlayer(string $playerId) { //numero de respuestas de un jugador
    $sql = "SELECT COUNT(id_respuesta) AS numeros_cant FROM respuesta WHERE fk_jugador = '$playerId'";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetNumberOfAnswersofDisc(string $discId) { //numero de respuestas en una discusion
    $sql = "SELECT COUNT(id_respuesta) AS cantidad FROM respuesta WHERE fk_discusion = '$discId'";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetNumberOfdisconplatform(string $platID) { //numero de discusiones en una plataforma
    $sql = "SELECT COUNT(id_discusion) AS cantidad FROM discusion WHERE fk_plataforma = '$platID'";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetNumberOfAnswersofplatform(string $platId) { //numero de respuestas en una plataforma
    $sql = "SELECT COUNT(id_respuesta) AS cantidad_resp FROM respuesta
        INNER JOIN discusion ON fk_discusion = id_discusion
        WHERE fk_plataforma = '$platId'";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetNumberOfdiscthemes(string $themeId) { //numero de discusiones en un tema
    $sql = "SELECT COUNT(id_discusion) AS disc_themes FROM discusion WHERE fk_tema = '$themeId'";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetNumberOfAnswersofthemes(string $themeId) { //numero de respuestas en un tema
    $sql = "SELECT COUNT(id_respuesta) AS ans_themes FROM respuesta
        INNER JOIN discusion ON fk_discusion = id_discusion
        WHERE fk_tema = '$themeId'";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetTotalDiscussions() { //numero de discusiones en total en la BD
    $sql = "SELECT COUNT(id_discusion) AS cant_total FROM discusion";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetTotalDiscussionstime(string $desde, string $hasta) { //numero de discusiones en total en la BD por fecha
    $sql = "SELECT COUNT(id_discusion) AS cantidad FROM discusion
        WHERE fecha_discusion BETWEEN '$desde' AND '$hasta'";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetTotalAnswers() { //numero de respuestas en total en la BD
    $sql = "SELECT COUNT(id_respuesta) AS cant_total FROM respuesta";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetTotalAnswerstime(string $desde, string $hasta) { //numero de respuestas en total en la BD por fecha
    $sql = "SELECT COUNT(id_respuesta) AS cantidad FROM respuesta
        WHERE fecha_respuesta BETWEEN '$desde' AND '$hasta'";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetTotalplayers() { //numero de discusiones en total en la BD
    $sql = "SELECT COUNT(id_jugador) AS cant_total FROM jugador";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetTotalPlatforms() { //numero de plataformas en total en la BD
    $sql = "SELECT COUNT(id_plataforma) AS cant_total FROM plataforma";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetTotalThemes() { //numero de temas en total en la BD
    $sql = "SELECT COUNT(id_tema) AS cant_total FROM tema";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetTotalBans() { //numero de bloqueos en total en la BD
    $sql = "SELECT COUNT(id_bloqueo) AS cant_total FROM bloqueo";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  public function GetRangoFechasBans(string $desde, string $hasta) { //filtrar los reportes de bloqueo por fechas
    $sql = "SELECT * FROM bloqueo
        WHERE fecha_bloqueo BETWEEN '$desde' AND '$hasta'";
    $request = $this->select_all($sql);
    return $request;
  }

  public function GetTotalBanstime(string $desde, string $hasta) { //numero de bloqueos en total en la BD por fecha
    $sql = "SELECT COUNT(id_bloqueo) AS cantidad FROM bloqueo
        WHERE fecha_bloqueo BETWEEN '$desde' AND '$hasta'";
    $requerimiento = $this->select($sql);
    return $requerimiento;
  }

  // funciones privadas

  private function QueryDiscusions() {
    return ("SELECT * FROM discusion
          INNER JOIN jugador ON discusion.fk_jugador = jugador.id_jugador
          INNER JOIN tema ON discusion.fk_tema = tema.id_tema
          INNER JOIN plataforma ON discusion.fk_plataforma = plataforma.id_plataforma"
    );
  }

  private function QueryAnswers() {
    return ("SELECT * FROM respuesta
          INNER JOIN discusion ON respuesta.fk_discusion = discusion.id_discusion
          INNER JOIN jugador ON discusion.fk_jugador = jugador.id_jugador
          INNER JOIN tema ON discusion.fk_tema = tema.id_tema
          INNER JOIN plataforma ON discusion.fk_plataforma = plataforma.id_plataforma"
    );
  }

  private function QueryPlayers() {
    return ("SELECT *  FROM jugador
          LEFT JOIN honor ON jugador.id_jugador = fk_jugador
          ORDER BY id_jugador"
    );
  }

  private function QueryBans() {
    return ("SELECT * FROM bloqueo
          INNER JOIN jugador ON bloqueo.fk_jugador = jugador.id_jugador"
    );
  }
}
?>
