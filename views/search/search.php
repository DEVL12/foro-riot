<?php getHeader($data, "headerForos");
$plataforms = $data['plataforms'];
$topic = $data['topic'];
?>
<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <strong>Foro Riot Games</strong>
      <span class="nav-spacer">&rsaquo;</span>
      <strong class="active">Búsqueda</strong>
    </div>
    <br />

    <form id="formSearch" autocomplete="off">
      <table border="0" cellspacing="0" cellpadding="5" class="tborder">
        <tr>
          <td colspan="2" class="thead"><strong>Búsqueda</strong></td>
        </tr>

        <tr>
          <td class="tcat" width="50%"><strong>Buscar por palabra clave</strong></td>
          <td class="tcat" width="50%"><strong>Buscar por nombre de usuario</strong></td>
        </tr>

        <tr>
          <td class="trow1">
            <table>
              <tr>
                <td valign="top"><input type="text" class="textbox" name="keywords" id="keywords" size="35" maxlength="250" /></td>
              </tr>
              <tr>
                <td>
                  <span class="smalltext">
                    <input type="radio" class="radio" name="postthread" value="1" hecked="checked" /> Buscar en todo el mensaje <br />
                    <input type="radio" class="radio" name="postthread" value="2" /> Buscar solo en los títulos
                  </span>
                </td>
              </tr>
            </table>
          </td>

          <td class="trow1">
            <input type="text" class="textbox" id="author" name="author" size="35" maxlength="30" /><br />
            <span class="smalltext">
              <input type="checkbox" class="checkbox" name="matchusername" value="1" checked="checked" />Igualar el nombre de usuario
            </span>
          </td>
        </tr>

        <tr>
          <td class="tcat"><strong>Videojuego</strong></td>
          <td class="tcat"><strong>Opciones de búsqueda</strong></td>
        </tr>

        <tr>
          <td valign="top" style="font-size: 15px">
            <?php if (is_array($plataforms)) { ?>

              <select id="plataformas" name="plataformas">
                <option value="" selected="selected" style="display: none;">Selecciona el juego correspondiente</option>
                <?php for ($i = 0; $i < count($plataforms); $i++) { ?>
                  <option value="<?= $plataforms[$i]['id_plataforma'] ?>"><?= $plataforms[$i]['nombre_plataforma'] ?></option>
                <?php } ?>
              </select>
            <?php
            } else {
              echo $plataforms;
            } ?>
          </td>

          <td>
            <select name="findthreadst">
              <option value="1">Temas con un mínimo de</option>
              <option value="2">Temas con un máximo de</option>
            </select> <input type="number" class="textbox" id="numreplies" name="numreplies" size="2" value="0" maxlength="4" />&nbsp;Respuestas<br /><br />
          </td>
        </tr>

        <tr>
          <td class="tcat" width="50%"><strong>Tema</strong></td>
          <td class="tcat" width="50%"><strong>Opciones de organización</strong></td>
        </tr>

        <tr>
          <td class="trow1" valign="top" style="font-size: 15px">
            <?php if (is_array($topic)) { ?>
              <select id="plataformas" name="plataformas">
                <option value="" selected="selected" style="display: none;">Selecciona el juego correspondiente</option>
                <?php for ($i = 0; $i < count($topic); $i++) { ?>
                  <option value="<?= $topic[$i]['id_tema'] ?>"><?= $topic[$i]['nombre_tema'] ?></option>
                <?php } ?>
              </select>
            <?php } else { ?>
          <td>
            <?= $topic ?>
          </td>
          <?php } ?>
          </td>
          <td>
            <select name="sortby">
              <option value="lastpost">Resultados por fecha</option>
              <option value="starter">Resultados por autor</option>
              <option value="forum">Resultados por foro</option>
              <option value="views">Resultados por visitas</option>
              <option value="replies">Resultados por respuestas</option>
            </select> En orden
            <input type="radio" class="radio" name="sortordr" value="asc" />Ascendente
            <input type="radio" class="radio" name="sortordr" value="desc" checked="checked" />Descendente
          </td>
        </tr>
      </table>
      <div align="center"><br /><input type="submit" class="button" name="submit" value="Búsqueda" /></div>
    </form>
    <br clear="all">
  </div>
</div>
<?php getFooter($data, "footerForos") ?>
