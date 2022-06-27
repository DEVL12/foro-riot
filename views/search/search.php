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
                    <input type="radio" class="radio" name="postthread" value="1" checked="checked" /> Buscar en el contenido <br />
                    <input type="radio" class="radio" name="postthread" value="2" /> Buscar solo en los títulos
                  </span>
                </td>
              </tr>
            </table>
          </td>

          <td class="trow1">
            <input type="text" class="textbox" id="author" name="author" size="35" maxlength="30" /><br />
            <span class="smalltext">
              <input type="checkbox" class="checkbox" name="matchusername" value="1"/>Igualar el nombre de usuario
            </span>
          </td>
        </tr>

        <tr>
          <td class="tcat"><strong>Videojuego</strong></td>
          <td class="tcat" width="50%"><strong>Tema</strong></td>
        </tr>

        <tr>
          <td valign="top" style="font-size: 15px">
            <?php if (is_array($plataforms)) { ?>
              <select id="plataforms" name="plataforms">
                <option value="" selected="selected">Cualquier juego</option>
                <?php for ($i = 0; $i < count($plataforms); $i++) { ?>
                  <option value="<?= $plataforms[$i]['id_plataforma'] ?>"><?= $plataforms[$i]['nombre_plataforma'] ?></option>
                <?php } ?>
              </select>
            <?php
            } else {
              echo $plataforms;
            } ?>
          </td>

          <td valign="top" style="font-size: 15px">
            <?php if (is_array($topic)) { ?>
              <select id="topic" name="topic">
                <option value="" selected="selected">Cualquier tematica</option>
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
        </tr>
      </table>
      <div align="center"><br /><input type="submit" class="button" name="submit" value="Búsqueda" /></div>
    </form>

    <div id="results"></div>

    <br clear="all">
  </div>
</div>
<?php getFooter($data, "footerForos") ?>
