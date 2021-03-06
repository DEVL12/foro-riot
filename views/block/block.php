<?php getHeader($data, "headerForos"); ?>
<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <a href="<?= base_url() ?>">Foro Riot Games</a><!-- start: nav_sep -->
      <span class="nav-spacer">›</span>
      <strong>Reportar usuario</strong><!-- start: nav_sep -->
    </div>
    <br>

    <center>
      <div id ="log_reg_table" class="log_reg_table_msg" style="display: inline-block;"></div>
    </center>

    <form id="blockUser">
      <input type="hidden" name="id_player" value="<?= $data['user']['id_jugador'] ?>">
      <table border="0" cellspacing="0" cellpadding="5" class="tborder">
        <tbody>
          <tr>
            <td class="thead" colspan="2" style="text-align: center;"><h2>Reportando al jugador <?= $data['user']['nombre_jugador'] ?></h2></td>
          </tr>

          <tr>
            <td class="trow1" width="20%" style="font-size: 15px"><strong>Reporte dirigido a:</strong></td>
            <td class="trow1"> <?= $data['user']['nombre_jugador'] ?> <span class="smalltext"></span></td>
          </tr>

          <tr>
            <td class="trow1" width="20%" style="font-size: 15px"><strong>Fecha limite del ban:</strong></td>
            <td class="trow1"> <input type="date" min="<?= date("Y-m-d"); ?>" value="" name="date" required></td>
          </tr>

          <tr>
            <td class="trow2" valign="top" style="font-size: 15px"><strong>Detalles sobre el reporte:</strong><br>
            </td>
            <td class="trow2">
              <textarea id="mensaje" name="mensaje" rows="20" cols="70" tabindex="2" style="width: 100%; background-color: #15161b; color:#9F9C9C; font-size: 15px ;"></textarea>
            </td>
          </tr>
        </tbody>
      </table>
      <br>

      <div align="center">
        <input type="submit" id="submit_block" class="button" name="submit" value="Banear usuario" tabindex="3" accesskey="s">
      </div>
    </form>
    <br>
    <br clear="all">

  </div>
</div>
<?php getFooter($data, "footerForos")?>
