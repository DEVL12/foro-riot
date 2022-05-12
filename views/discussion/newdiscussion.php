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
              <!--En este lugar no sabia sinceramente que poner porque en la BD salen respuestas que alguien pudo haber escrito no se si vamos a colocar un estandar y el administrador ira agregando etiquetas o no asi que es mejor lo dejo asi me dices luego XD-->
              <input type="text" class="textbox" id="tema" name="tema" size="45" maxlength="85" placeholder="Escribir el tipo de tema que es" tabindex="1">
              <!--solo validare el input de texto por si acaso-->
               <select name="Tema">
              <option value="0">Escojer el tipo de tema</option>
              <option value="1">Reporte</option>
              <option value="2">Bug</option>
              <option value="3">Queja</option>
            </select>
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
