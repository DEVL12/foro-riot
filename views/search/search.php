<?php getHeader($data, "headerForos"); ?>
<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <strong>Foro Riot Games</strong>
      <span class="nav-spacer">&rsaquo;</span>
      <strong class="active">Búsqueda</strong>
    </div>
    <br />

    <form id ="formSearch" autocomplete="off">
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
          <td class="tcat"><strong>Buscar en foro(s)</strong></td>
          <td class="tcat"><strong>Opciones de búsqueda</strong></td>
        </tr>

        <tr>
          <td class="trow1 no_bottom_border" rowspan="5">
            <select name="forum" size="20" multiple="multiple" style="height:auto;">
              <option value="all" selected="selected">Buscar en todos los foros</option>
              <option value="all">----------------------</option>
              <option value="1"> Foros</option>
              <option value="3">&nbsp;&nbsp;&nbsp;&nbsp; League of Legends</option>
              <option value="4">&nbsp;&nbsp;&nbsp;&nbsp; Valorant</option>
              <option value="5">&nbsp;&nbsp;&nbsp;&nbsp; League of Legends Wild Rift</option>
              <option value="6">&nbsp;&nbsp;&nbsp;&nbsp; Legends of Runaterra</option>
              <option value="7">&nbsp;&nbsp;&nbsp;&nbsp; Teamfight Tactics</option>
            </select>
          </td>

          <td class="trow1">
            <select name="findthreadst">
              <option value="1">Temas con un mínimo de</option>
              <option value="2">Temas con un máximo de</option>
            </select> <input type="number" class="textbox" id="numreplies" name="numreplies" size="2" value = "0" maxlength="4" />&nbsp;Respuestas<br /><br />

            <select name="postdate">
              <option value="0">Mensajes de cualquier fecha</option>
              <option value="1">Mensajes de ayer</option>
              <option value="7">Mensajes de hace 1 semana</option>
              <option value="14">Mensajes de hace 2 semanas</option>
              <option value="30">Mensajes de hace 1 mes</option>
              <option value="90">Mensajes de hace 3 meses</option>
              <option value="180">Mensajes de hace 6 meses</option>
              <option value="365">Mensajes de hace 1 año</option>
            </select>&nbsp;&nbsp;
            <input type="radio" class="radio" name="pddir" value="1"  />Y más nuevos
            <input type="radio" class="radio" name="pddir" value="0" checked="checked" />Y más antiguos<br /><br />
          </td>
        </tr>

        <tr>
          <td class="tcat"><strong>Tema</strong></td>
        </tr>

        <tr>
          <td class="trow1">
            <select name="topic">
            <option value="all">Todos</option>
              <option value="Bug">Bug</option>
              <option value="Creaciones de la comunidad">Creaciones de la comunidad</option>
              <option value="Eventos">Eventos</option>
              <option value="General">General</option>
              <option value="Jugabilidad">Jugabilidad</option>
              <option value="Memes">Memes</option>
              <option value="Problemas tecnicos">Problemas técnicos</option>
              <option value="Queja">Queja</option>
              <option value="Reclutamiento">Reclutamiento</option>
              <option value="Reporte a jugador">Reporte a jugador</option>
            </select>
        </tr>


        <tr>
          <td class="tcat"><strong>Opciones de organización</strong></td>
        </tr>

        <tr>
          <td class="trow1">
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

        <tr>
          <td class="tcat"><strong>Opciones de muestra</strong></td>
        </tr>

        <tr>
          <td class="trow1">
            Mostrar resultados como
            <input type="radio" class="radio" name="showresults" value="threads" checked="checked" />Temas
            <input type="radio" class="radio" name="showresults" value="posts" />Mensajes
          </td>
        </tr>
      </table>
      <div align="center"><br /><input type="submit" class="button" name="submit" value="Búsqueda" /></div>
    </form>
    <br clear="all">
  </div>
</div>
<?php getFooter($data, "footerForos") ?>
