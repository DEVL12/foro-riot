<?php getHeader($data, "headerForos");
$islogin = isset($_SESSION['islogin']);
?>
<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <span class="active">Foro Riot Games</span>
    </div>
    <br/>

    <div id="welcomemsg" class="guestwelcomemsg">
      <h1>¡Bienvenido a la sección de ayuda! </h1>
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
      <table class="tborder">
        <thead>
          <tr>
            <td class="trow1">
              <div><strong>Usuario</strong></div>
            </td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="trow1">
              <strong>
                <a href="<?= base_url() ?>help/frq_quest/registro">Registrarse en el sistema</a>
                </strong>
                <br>
                <span class="smalltext">Ventajas y privilegios de estar registrado.</span>
            </td>
          </tr>
          <tr>
            <td class="trow1">
              <strong>
                <a href="<?= base_url() ?>help/frq_quest/actualizar_perfil">Actualizar el perfil</a>
                </strong>
                <br>
                <span class="smalltext">Cómo actualizar tus datos.</span>
            </td>
          </tr>
        </tbody>
      </table>
      <br>
      <table class="tborder">
        <thead>
          <tr>
            <td class="trow1">
              <div><strong>Participación</strong></div>
            </td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="trow1">
              <strong>
                <a href="<?= base_url() ?>help/frq_quest/discusion_nueva">Crear discusión nueva</a>
                </strong>
                <br>
                <span class="smalltext">Cómo crear una nueva discusión en un foro.</span>
            </td>
          </tr>
          <tr>
            <td class="trow1">
              <strong>
                <a href="<?= base_url() ?>help/frq_quest/discusion_responder" >Responder una discusion</a>
                </strong>
                <br>
                <span class="smalltext">Cómo responder a una discusión.</span>
            </td>
          </tr>
        </tbody>
      </table>
      <br>
      <table class="tborder">
        <thead>
          <tr>
            <td class="trow1">
              <div><strong>¿Esto no responde tus dudas? Contactanos por:</strong></div>
            </td>
          </tr>
        </thead>
        <tbody>
          <tr>
            <td class="trow1">
              <span><strong>Twitter:</strong></span>
              <br>
              <span class="smalltext">@riotgames</span>
              <br>
              <span class="smalltext">@RiotSupport</span>
              <br>
              <span class="smalltext">@RiotGamesFrance</span>
              <br>
              <span class="smalltext">@RiotGamesJapan</span>
              <br>
              <span class="smalltext">@RiotGamesBrasil</span>
            </td>
          </tr>
          <tr>
            <td class="trow1">
              <span><strong>Facebook:</strong></span>
              <br>
              <span class="smalltext">@RiotGames </span>
            </td>
          </tr>
          <tr>
            <td class="trow1">
              <span><strong>Soporte de la página:</strong></span>
              <br>
              <span class="smalltext">Soportefororiot@gmail.com</span>
            </td>
          </tr>
        </tbody>
      </table>
    </div>
    <br class="clear" />
    <br clear="all">
  </div>
</div>
<?php getFooter($data, "footerForos") ?>
