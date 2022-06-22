<?php getHeader($data, "headerForos");
$plataforms = $data['plataforms'];
$topic = $data['topic'];
?>

<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <strong>Foro Riot Games</strong><!-- start: nav_sep -->
      <span class="nav-spacer">›</span>
      <strong>Discusión</strong><!-- start: nav_sep -->
      <span class="nav-spacer">›</span>
      <strong >Crear nueva discusión</strong>
    </div>
    <br>

    <center>
      <div id ="log_reg_table" class="log_reg_table_msg" style="display: inline-block;"></div>
    </center>

    <form id="new-disc" autocomplete="off">
      <table border="0" cellspacing="0" cellpadding="5" class="tborder">
        <tbody>
          <tr>
            <td class="thead" colspan="2" style="text-align: center;"><h2>Crear una nueva Discusión</h2></td>
          </tr>
          <tr>
            <td class="trow1" style="font-size: 15px">
            <strong>Título de la discusión:</strong>
            <td class="trow1">
              <input type="text" class="textbox" id="titulo" name="titulo" size="50" maxlength="85" placeholder="Escribe el titulo de tu discusión" tabindex="1">
            </td>
            </td>
          </tr>
          <tr>
            <td class="trow1" valign="top" style="font-size: 15px">
            <strong>Videojuego:</strong>
            <?php if(is_array($plataforms)) { ?>
              <td class="trow1">
                <select id ="plataformas" name="plataformas">
                  <option value="" selected="selected" style="display: none;">Selecciona el juego correspondiente</option>
                  <?php for($i = 0; $i < count($plataforms); $i++) { ?>
                    <option value="<?=$plataforms[$i]['id_plataforma']?>"><?=$plataforms[$i]['nombre_plataforma']?></option>
                  <?php } ?>
                </select>
              </td>
            <?php } else { ?>
              <td class="trow1">
                <?= $plataforms ?>
              </td>
            <?php } ?>
            </td>
          </tr>
          <tr>
            <td class="trow1" valign="top" style="font-size: 15px">
            <strong>Tematica:</strong>
            <?php if(is_array($topic)) { ?>
              <td class="trow1">
                <select id ="tema" name="tema">
                <option value="" selected="selected" style="display: none;">Selecciona una tematica</option>
                  <?php for($i = 0; $i < count($topic); $i++) { ?>
                    <option value="<?=$topic[$i]['id_tema']?>"><?=$topic[$i]['nombre_tema']?></option>
                  <?php } ?>
                </select>
              </td>
            <?php } else { ?>
              <td class="trow1">
                <?= $topic ?>
              </td>
            <?php } ?>
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
        <input id ="submit_discusion" type="submit" class="button" name="submit" value="Crear Discusión" tabindex="3" accesskey="s">
      </div>
    </form>
  </div>
</div>
<?php getFooter($data, "footerForos")?>
