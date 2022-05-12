<?php getHeader($data, "headerForos"); ?>
<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <a href="<?= base_url() ?>">Foro Riot Games</a><!-- start: nav_sep -->
      <span class="nav-spacer">›</span>
      <a href="<?= base_url() ?>discussion">Foros</a><!-- start: nav_sep -->
      <span class="nav-spacer">›</span>
      <a href="<?= base_url() ?>discussion">Valorant</a><!-- start: nav_sep -->
      <span class="nav-spacer">›</span>
      <a href="<?= base_url() ?>discussion">Crear nueva discusión</a>
    </div>
    <br>

    <center>
      <div id ="log_reg_table" class="log_reg_table_msg" style="display: inline-block;"></div>
    </center>

    <form id="new-disc">
      <table border="0" cellspacing="0" cellpadding="5" class="tborder">
        <tbody>
          <tr>
            <td class="thead" colspan="2" style="text-align: center;"><h2>Crear una nueva Discusión</h2></td>
          </tr>
          <tr>
            <td>
              <br>
            </td>
          </tr>
          <tr>
            <td class="trow2" width="20%" style="font-size: 15px"><strong>Título de la Discusión:</strong></td>
            <td class="trow2"><input type="text" class="textbox" id="titulo" name="titulo" size="50" maxlength="85" placeholder="Escribe el titulo de tu discusión" tabindex="1" style="font-size:15px"></td>
          </tr>

          <tr>
            <td class="trow2" valign="top" style="font-size: 15px"><strong>Que quieres Compartir:</strong><br>
            </td>
            <td class="trow2">
              <textarea id="mensaje" name="mensaje" rows="20" cols="70" tabindex="2" style="width: 100%; background-color: #2E2D2D; color:#9F9C9C; font-size: 15px ;"></textarea>
            </td>
          </tr>

          <tr>
            <td class="trow2" width="20%" style="font-size: 20px"><strong>Que tipo de tema es:</strong></td>
            <td class="trow2">
              <span class="smalltext">
                <input type="checkbox" class="checkbox" name="matchusername" value="1">Reporte
                <input type="checkbox" class="checkbox" name="matchusername" value="2">Bug
                <input type="checkbox" class="checkbox" name="matchusername" value="3">Queja
              </span>
            </td>
          </tr>
        </tbody>
      </table>
      <br>

      <div align="center">
        <input type="submit" class="button" name="submit" value="Crear Discusión" tabindex="3" accesskey="s">
      </div>
    </form>
    <br>
    <br clear="all">

  </div>
</div>
<?php getFooter($data, "footerForos")?>
