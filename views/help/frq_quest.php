<?php getHeader($data, "headerForos");
$islogin = isset($_SESSION['islogin']); ?>
<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <span class="active">Foro Riot Games</span>
    </div>
    <br />

    <div id="welcomemsg" class="guestwelcomemsg">
      <h1>Intrucciones para <?= $data['name_plataform'] ?> </h1>
      <?php
        if ($islogin) echo "¡HOLA! " . $_SESSION['dataUser']['nombre_jugador'] . " es un gusto volverte a ver. ¿Deseas compartir algo con nosotros?";
        else echo "Inicia sesion para que puedas compartir con nosotros :P.";
      ?>
      <br><br>
      <?php
      if (!$islogin) { ?>
        <a href="<?= base_url() ?>session/login" style="color:#fff;">Login</a> &nbsp;&nbsp;
        <a href="<?= base_url() ?>session/register" style="color:#fff;width:auto;" class="button">Register</a>
      <?php } ?>
    </div>

    <div id="content">
      <?php require_once('opcions/'.$data['help']); ?>
    </div>
  </div>
</div>

<?php getFooter($data, "footerForos") ?>
