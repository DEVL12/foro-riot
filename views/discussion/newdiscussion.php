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
            <td class="trow1" valign="top" style="font-size: 15px">
            <strong>Videojuego:</strong>
            <td class="trow1">
              <select name="forum">
                <option value="" selected="selected" style="display: none;">Buscar en todos los foros</option>
                <option value="League of Legends">League of Legends</option>
                <option value="Valorant">Valorant</option>
                <option value="League of Legends Wild Rift">League of Legends Wild Rift</option>
                <option value="Legends of Runaterra">Legends of Runaterra</option>
                <option value="Teamfight Tactics">Teamfight Tactics</option>
              </select>
            </td>
            <td>
          </tr>
          <tr>
            <td class="trow2" width="20%" style="font-size: 15px">
            <strong>Tematica:</strong>
              <td class="trow2">
                <span class="smalltext">
                  <input type="checkbox" class="checkbox" name="matchusername" value="1"> Reporte
                  <input type="checkbox" class="checkbox" name="matchusername" value="2"> Bug
                  <input type="checkbox" class="checkbox" name="matchusername" value="3"> Queja
                </span>
              </td>
            </td>
          </tr>
          <tr>
            <td class="trow2" valign="top" style="font-size: 15px"><strong>Mensaje:</strong><br>
            </td>
            <td class="trow2">
              <textarea id="mensaje" name="mensaje" rows="20" cols="70" tabindex="2" style="width: 100%; background-color: #2E2D2D; color:#9F9C9C; font-size: 15px ;"></textarea>
            </td>
          </tr>
        </tbody>
      </table>
      <br>

      <div align="center">
        <input type="submit" class="button" name="submit" value="Crear Discusión" tabindex="3" accesskey="s">
      </div>
    </form>
  </div>
</div>
<?php getFooter($data, "footerForos")?>
