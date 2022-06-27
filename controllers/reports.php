<?php
class PDF extends FPDF
{
  // Cabecera de página
  function Header()
  {
    // Logo
    $this->Image(base_url() . 'assets/images/riot-footer.png', 10, 8, 20);
    // Arial bold 15
    $this->SetFont('Arial', 'B', 18);
    // Movernos a la derecha
    $this->Cell(65);
    // Título
    $this->SetXY(80, 15);
    $this->Cell(50, 10, 'Reportes Foros Riot Games', 0, 1, 'C');
    // Salto de línea
    $this->Ln(20);
  }

  // Pie de página
  function Footer()
  {
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial', 'I', 8);
    // Número de página
    $this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
  }
}

class reports extends controllers
{
  public function __construct()
  {
    session_start();
    parent::__construct();
  }

  public function reports()
  {
    $plataforms = $this->model->GetAllPlatforms();
    $topic = $this->model->GetAllTopics();

    $data = [
      'title' => 'Foro Riot Games | Reportes',
      'script' => 'newdiscussion.js',
      'plataforms' => !empty($plataforms) ? $plataforms : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay videojuegos registrados.</h1>',
      'topic' => !empty($topic) ? $topic : '<h1 style="color: rgba(186, 51, 64, 1);">Lo sentimos, no hay tematicas registradas .</h1>',
    ];

    $this->views->getViews($this, "reports", $data);
  }

  public function pdf_discussions() //reportes de discusiones
  {
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];

    if (empty($desde) || empty($hasta)) {
      $datos = $this->model->Getdiscussions();
      $total = $this->model->GetTotalDiscussions();
    } else {
      $datos = $this->model->GetRangoFechas($desde, $hasta);
      $total = $this->model->GetTotalDiscussionstime($desde, $hasta);
    }

    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(10, 0, 0);
    $pdf->SetTitle('Reportes de Discusiones');
    $pdf->Cell(10, 9, 'Reportes de Discussiones de Foros:', 0, 1, 'L');
    $pdf->SetFont('Arial', 'B', 12);

    if (empty($desde) || empty($hasta)) {
      $pdf->Cell(10, 9, 'Cantidad de Discusiones en Total: ' . $total['cant_total'], 0, 1, 'L');
    } else {
      $pdf->Cell(10, 9, 'Cantidad de Discusiones en Total en las fechas introducidas: ' . $total['cantidad'], 0, 1, 'L');
    }

    $pdf->SetFillColor(0, 0, 0);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(5, 5, 'id', 0, 0, 'C', true);
    $pdf->Cell(60, 5, 'titulo', 0, 0, 'C', true);
    $pdf->Cell(50, 5, 'contenido', 0, 0, 'C', true);
    $pdf->Cell(22, 5, 'respuestas', 0, 0, 'C', true);
    $pdf->Cell(33, 5, 'fecha', 0, 0, 'C', true);
    $pdf->Cell(22, 5, 'creador', 0, 1, 'C', true);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(240, 240, 240);
    $pdf->SetTextColor(40, 40, 40);
    $pdf->SetDrawColor(250, 250, 250);

    for ($i = 0; $i < count($datos); $i++) {
      $pdf->Cell(5, 5, $datos[$i]['id_discusion'], 0, 0, 'C');
      $pdf->Cell(60, 5, utf8_decode($datos[$i]['titulo']), 0, 0, 'L');
      $pdf->Cell(50, 5, utf8_decode($datos[$i]['contenido_discusion']), 0, 0, 'L');
      $numbers = $this->model->GetNumberOfAnswersofDisc($datos[$i]['id_discusion']);
      $pdf->Cell(22, 5, utf8_decode($numbers['cantidad']), 0, 0, 'C');
      $pdf->Cell(33, 5, $datos[$i]['fecha_discusion'], 0, 0, 'L');
      $pdf->Cell(22, 5, utf8_decode($datos[$i]['nombre_jugador']), 0, 1, 'C');
    }

    $pdf->Output();
  }

  public function pdf_answers() //reportes de respuestas
  {
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];

    if (empty($desde) || empty($hasta)) {
      $datos = $this->model->Getanswers();
      $total = $this->model->GetTotalAnswers();
    } else {
      $datos = $this->model->GetRangotimeAns($desde, $hasta);
      $total = $this->model->GetTotalAnswerstime($desde, $hasta);
    }

    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(10, 0, 0);
    $pdf->SetTitle('Reportes de Respuestas');
    $pdf->Cell(10, 9, 'Reportes de Respuestas de Foros:', 0, 1, 'L');
    $pdf->SetFont('Arial', 'B', 12);

    if (empty($desde) || empty($hasta)) {
      $pdf->Cell(10, 9, 'Cantidad de Respuestas en Total: ' . $total['cant_total'], 0, 1, 'L');
    } else {
      $pdf->Cell(10, 9, 'Cantidad de Respuestas en Total en las fechas introducidas: ' . $total['cantidad'], 0, 1, 'L');
    }

    $pdf->SetFillColor(0, 0, 0);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(5, 5, 'id', 0, 0, 'C', true);
    $pdf->Cell(50, 5, 'contenido', 0, 0, 'C', true);
    $pdf->Cell(40, 5, 'cont. orig', 0, 0, 'C', true);
    $pdf->Cell(10, 5, 'editado', 0, 0, 'C', true);
    $pdf->Cell(20, 5, 'fecha', 0, 0, 'C', true);
    $pdf->Cell(40, 5, 'discusion', 0, 0, 'C', true);
    $pdf->Cell(22, 5, 'creador', 0, 1, 'C', true);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(240, 240, 240);
    $pdf->SetTextColor(40, 40, 40);
    $pdf->SetDrawColor(250, 250, 250);

    for ($i = 0; $i < count($datos); $i++) {
      $pdf->Cell(5, 5, $datos[$i]['id_respuesta'], 0, 0, 'C', true);
      $pdf->Cell(50, 5, utf8_decode($datos[$i]['contenido_respuesta']), 0, 0, 'L', true);
      $pdf->Cell(40, 5, utf8_decode($datos[$i]['contenido_original_respuesta']), 0, 0, 'L', true);

      if($datos[$i]['editado_respuesta'] < 1) { //aca no se si 1 es que no fue cambiado si si por favor arreglalo si esta mal
        $pdf->Cell(10, 5, 'No', 0, 0, 'C', true);
      } else {
        $pdf->Cell(10, 5, utf8_decode('Sí'), 0, 0, 'C', true);
      }

      $pdf->Cell(20, 5, $datos[$i]['fecha_respuesta'], 0, 0, 'C', true);
      $pdf->Cell(40, 5, $datos[$i]['titulo'], 0, 0, 'L', true);
      $pdf->Cell(22, 5, utf8_decode($datos[$i]['nombre_jugador']), 0, 1, 'C', true);
    }

    $pdf->Output();
  }

  public function pdf_player() //reportes de jugadores
  {
    $datos = $this->model->Getplayers();
    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(10, 0, 0);
    $pdf->SetTitle('Reportes de Jugadores');
    $pdf->Cell(10, 9, 'Reportes Jugadores de Foros:', 0, 1, 'L');
    $pdf->SetFont('Arial', 'B', 12);

    $cantidadplay = $this->model->GetTotalplayers();
    $pdf->Cell(10, 9, 'Reportes Jugadores de Foros: ' . $cantidadplay['cant_total'], 0, 1, 'L');
    $pdf->SetFillColor(0, 0, 0);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->SetFont('Arial', 'B', 12);
    $pdf->Cell(8, 5, 'id', 0, 0, 'C', true);
    $pdf->Cell(40, 5, 'Nombre', 0, 0, 'C', true);
    $pdf->Cell(40, 5, 'correo', 0, 0, 'C', true);
    $pdf->Cell(15, 5, 'estado', 0, 0, 'C', true);
    $pdf->Cell(15, 5, 'rol', 0, 0, 'C', true);
    $pdf->Cell(25, 5, 'discusiones', 0, 0, 'C', true);
    $pdf->Cell(25, 5, 'respuestas', 0, 0, 'C', true);
    $pdf->Cell(15, 5, 'honor', 0, 1, 'C', true);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(240, 240, 240);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetDrawColor(250, 250, 250);

    for ($i = 0; $i < count($datos); $i++) {
      $pdf->Cell(8, 5, $datos[$i]['id_jugador'], 0, 0, 'C', true);
      $pdf->Cell(40, 5, utf8_decode($datos[$i]['nombre_jugador']), 0, 0, 'C', true);
      $pdf->Cell(40, 5, utf8_decode($datos[$i]['correo']), 0, 0, 'C', true);

      if ($datos[$i]['estado_jugador'] < 1) {
        $pdf->Cell(15, 5, 'Bloqueado', 0, 0, 'C', true);
      } else {
        $pdf->Cell(15, 5, 'Activo', 0, 0, 'C', true);
      }

      $pdf->Cell(15, 5, utf8_decode($datos[$i]['rol']), 0, 0, 'C', true);
      $prueba2 = $this->model->GetNumberOfDiscussionOfPlayer($datos[$i]['id_jugador']);
      $pdf->Cell(25, 5, $prueba2['cantidad'], 0, 0, 'C', true);
      $answers = $this->model->GetNumberOfAnswersOfPlayer($datos[$i]['id_jugador']);
      $pdf->Cell(25, 5, $answers['numeros_cant'], 0, 0, 'C', true);

      if (empty($datos[$i]['puntaje'])) {
        $pdf->Cell(15, 5, 'Error', 0, 1, 'C', true); //uno de los jugadores en este caso DEVL12 no tiene honor y saldria vacio
      } else {
        $pdf->Cell(15, 5, $datos[$i]['puntaje'], 0, 1, 'C', true);
      }
    }

    $pdf->Output();
  }

  public function pdf_platforms() //reportes de las plataformas
  {
    $datos = $this->model->GetAllPlatforms();
    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(10, 0, 0);
    $pdf->SetTitle('Reportes de Plataformas del Foro');
    $pdf->Cell(10, 9, 'Reportes de plataformas:', 0, 1, 'L');
    $pdf->SetFont('Arial', 'B', 12);
    $numplat = $this->model->GetTotalPlatforms();
    $pdf->Cell(10, 9, 'Cantidad de plataformas en el Sistema: ' . $numplat['cant_total'], 0, 1, 'L');
    $pdf->SetFillColor(0, 0, 0);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(8, 5, 'id', 0, 0, 'C', true);
    $pdf->Cell(55, 5, 'Nombre', 0, 0, 'C', true);
    $pdf->Cell(40, 5, 'num. discusiones', 0, 0, 'C', true);
    $pdf->Cell(40, 5, 'num. respuestas', 0, 1, 'C', true);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(240, 240, 240);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetDrawColor(250, 250, 250);

    for ($i = 0; $i < count($datos); $i++) {
      $pdf->Cell(8, 5, $datos[$i]['id_plataforma'], 0, 0, 'C', true);
      $pdf->Cell(55, 5, utf8_decode($datos[$i]['nombre_plataforma']), 0, 0, 'C', true);
      $cantidad = $this->model->GetNumberOfdisconplatform($datos[$i]['id_plataforma']);
      $pdf->Cell(40, 5, $cantidad['cantidad'], 0, 0, 'C', true);
      $cantidadresp = $this->model->GetNumberOfAnswersofplatform($datos[$i]['id_plataforma']);
      $pdf->Cell(40, 5, $cantidadresp['cantidad_resp'], 0, 1, 'C', true);
    }

    $pdf->Output();
  }

  public function pdf_Themes() //reportes de los temas
  {
    $datos = $this->model->GetAllTopics();
    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(10, 0, 0);
    $pdf->SetTitle('Reportes de Temas');
    $pdf->Cell(10, 9, 'Reportes de Temas de Foros:', 0, 1, 'L');
    $pdf->SetFont('Arial', 'B', 12);
    $themestotal = $this->model->GetTotalThemes();
    $pdf->Cell(10, 9, 'Cantidad de temas en el Sistema: ' . $themestotal['cant_total'], 0, 1, 'L');
    $pdf->SetFillColor(0, 0, 0);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(8, 5, 'id', 0, 0, 'C', true);
    $pdf->Cell(45, 5, 'Nombre', 0, 0, 'C', true);
    $pdf->Cell(45, 5, 'num. discusiones', 0, 0, 'C', true);
    $pdf->Cell(45, 5, 'num. respuestas', 0, 1, 'C', true);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(240, 240, 240);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetDrawColor(250, 250, 250);

    for ($i = 0; $i < count($datos); $i++) {
      $pdf->Cell(8, 5, $datos[$i]['id_tema'], 0, 0, 'C', true);
      $pdf->Cell(45, 5, $datos[$i]['nombre_tema'], 0, 0, 'C', true);
      $numdisc = $this->model->GetNumberOfdiscthemes($datos[$i]['id_tema']);
      $pdf->Cell(45, 5, $numdisc['disc_themes'], 0, 0, 'C', true);
      $numresp = $this->model->GetNumberOfAnswersofthemes($datos[$i]['id_tema']);
      $pdf->Cell(45, 5, $numresp['ans_themes'], 0, 1, 'C', true);
    }

    $pdf->Output();
  }

  public function pdf_Bans() //reportes de los bloqueos
  {
    $desde = $_POST['desde'];
    $hasta = $_POST['hasta'];

    if (empty($desde) || empty($hasta)) {
      $datos = $this->model->Getbans();
      $total = $this->model->GetTotalBans();
    } else {
      $datos = $this->model->GetRangoFechasBans($desde, $hasta);
      $total = $this->model->GetTotalBanstime($desde, $hasta);
    }

    $pdf = new PDF('P', 'mm', 'A4');
    $pdf->AliasNbPages();
    $pdf->AddPage();
    $pdf->SetMargins(10, 0, 0);
    $pdf->SetTitle('Reportes de Baneos de Jugadores');
    $pdf->Cell(10, 9, 'Reportes de Baneos de Jugadores de Foros:', 0, 1, 'L');
    $pdf->SetFont('Arial', 'B', 12);

    if (empty($desde) || empty($hasta)) {
      $pdf->Cell(10, 9, 'Baneos Totales del sistema: ' . $total['cant_total'], 0, 1, 'L');
    } else {
      $pdf->Cell(10, 9, 'Baneos Totales del sistema: ' . $total['cantidad'], 0, 1, 'L');
    }

    $pdf->SetFillColor(0, 0, 0);
    $pdf->SetTextColor(255, 255, 255);
    $pdf->Cell(8, 5, 'id', 0, 0, 'C', true);
    $pdf->Cell(22, 5, 'Jugador', 0, 0, 'C', true);
    $pdf->Cell(40, 5, 'motivo', 0, 0, 'C', true);
    $pdf->Cell(33, 5, 'fecha', 0, 0, 'C', true);
    $pdf->Cell(33, 5, 'fecha tope', 0, 0, 'C', true);
    $pdf->Cell(15, 5, 'estado', 0, 1, 'C', true);
    $pdf->SetFont('Arial', '', 10);
    $pdf->SetFillColor(240, 240, 240);
    $pdf->SetTextColor(0, 0, 0);
    $pdf->SetDrawColor(250, 250, 250);

    for ($i = 0; $i < count($datos); $i++) {
      $pdf->Cell(8, 5, $datos[$i]['id_bloqueo'], 0, 0, 'C', true);
      $pdf->Cell(22, 5, utf8_decode($datos[$i]['nombre_jugador']), 0, 0, 'C', true);
      $pdf->Cell(40, 5, utf8_decode($datos[$i]['motivo_bloqueo']), 0, 0, 'C', true);
      $pdf->Cell(33, 5, utf8_decode($datos[$i]['fecha_bloqueo']), 0, 0, 'C', true);
      $pdf->Cell(33, 5, utf8_decode($datos[$i]['fecha_tope']), 0, 0, 'C', true);
      $pdf->Cell(15, 5, utf8_decode($datos[$i]['estado_bloqueo']), 0, 0, 'C', true);
      //la verdad no se si se refiere a que esta 1 o 0
      //si esta permabaneado o kickeado por dias asi q alli lo dejo
    }

    $pdf->Cell(8, 5, '50', 0, 0, 'C', true); //prueba de como se veria
    $pdf->Cell(22, 5, 'its a test', 0, 0, 'C', true);
    $pdf->Cell(40, 5, 'piedrero sin remedio', 0, 0, 'C', true);
    $pdf->Cell(33, 5, '10/06/2022', 0, 0, 'C', true);
    $pdf->Cell(33, 5, '10/08/2022', 0, 0, 'C', true);
    $pdf->Cell(15, 5, 'kickeado?', 0, 0, 'C', true);
    $pdf->Output(); // oko xd
  }
}
?>
