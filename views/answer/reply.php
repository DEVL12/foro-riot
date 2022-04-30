<?php getHeader($data, "headerForos"); ?>
<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <a href="http://localhost/foro/index.php">Foro Riot Games</a><!-- start: nav_sep -->
      <span class="nav-spacer">›</span>
      <a href="forumdisplay.php?fid=1">Foros</a><!-- start: nav_sep -->
      <span class="nav-spacer">›</span>
      <a href="forumdisplay.php?fid=4">Valorant</a><!-- start: nav_sep -->
      <span class="nav-spacer">›</span>
      <a href="showthread.php?tid=3">Hola</a>
      <span class="nav-spacer">›</span>
      <span class="active">Enviar respuesta</span>
    </div>
    <br>

    <form>
      <table border="0" cellspacing="0" cellpadding="5" class="tborder">
        <tbody>
          <tr>
            <td class="thead" colspan="2"><strong>Enviar nueva respuesta</strong></td>
          </tr>

          <tr>
            <td class="tcat" colspan="2"><span class="smalltext"><strong>Respuesta al tema: Hola</strong></span></td>
          </tr>

          <tr>
            <td class="trow1" width="20%"><strong>Nombre de usuario:</strong></td>
            <td class="trow1"> Nautilus <span class="smalltext"></span></td>
          </tr>

          <tr>
            <td class="trow2" width="20%"><strong>Título del mensaje:</strong></td>
            <td class="trow2"><input type="text" class="textbox" name="subject" size="40" maxlength="85" placeholder="Escribe el titulo del mensaje" tabindex="1"></td>
          </tr>

          <tr>
            <td class="trow2" valign="top"><strong>Tu mensaje:</strong><br>
              <div style="margin:auto; width: 170px; margin-top: 20px;display:none;" id="show_smilies">
                <center><a href="javascript:void(0)" onclick="MyBB.popupWindow('/misc.php?action=smilies&amp;popup=true&amp;editor=MyBBEditor&amp;modal=1'); return false;">See All</a></center>
              </div>
            </td>
            <td class="trow2">
              <textarea id="message" name="message" rows="20" cols="70" tabindex="2" style="width: 100%; background-color: #BBB; color:black; font-size: 18px ;"></textarea>
            </td>
          </tr>

          <tr>
            <td><a href="#!" onclick="document.getElementById('newreply_options').style.display = 'table';"><br>+ More Options</a></td>
          </tr>
        </tbody>
      </table>
      <br>

      <table border="0" cellspacing="0" cellpadding="5" class="tborder" id="newreply_options" style="display:none;">
        <tbody>
          <tr>
            <td class="trow2" valign="top"><strong>Opciones del moderador:</strong></td>
            <td class="trow2">
              <span class="smalltext">
                <label>
                  <input type="checkbox" class="checkbox" name="modoptions[closethread]" value="1">&nbsp;
                  <strong>Cerrar tema:</strong> Evita futuros mensajes en este tema.
                </label><br>

                <label>
                  <input type="checkbox" class="checkbox" name="modoptions[stickthread]" value="1">&nbsp;
                  <strong>Tema importante:</strong>
                  Ubica este tema al principio de la lista de temas (A la vista de todos).
                </label>
              </span>
            </td>
          </tr>

          <tr>
            <td class="thead" colspan="3"><strong>Archivos adjuntos</strong></td>
          </tr>

          <tr>
            <td class="tcat smalltext" colspan="3">Tu cuota para archivos adjuntos es de Ilimitado.  </td>
          </tr>

          <tr>
            <td class="trow1" width="1"><img src="<?= base_url() ?>assets/images/paperclip.png" alt=""></td>
            <td class="trow1" style="white-space: nowrap">
              <strong>Nuevo archivo adjunto:</strong>
              <input type="file" name="attachments[]" size="30" class="fileupload" multiple="multiple">
            </td>
          </tr>
        </tbody>
      </table>
      <br>

      <div align="center">
        <input type="submit" class="button" name="submit" value="Enviar respuesta" tabindex="3" accesskey="s">
      </div>
    </form>

    <br>
    <table border="0" cellspacing="0" cellpadding="5" class="tborder tfixed">
      <tbody>
        <tr>
          <td class="thead" style="text-align: center;"><strong>Resumen del tema (Mensajes más nuevos primero)</strong></td>
        </tr>
        <!-- start: newreply_threadreview_post -->
        <tr>
          <td class="tcat"><span class="smalltext"><strong>Enviado por Nautilus - 04-06-2022, 03:24 PM</strong></span></td>
        </tr>
        <tr>
          <td class="trow1 scaleimages">
            Soy jose
          </td>
        </tr>
        <!-- end: newreply_threadreview_post -->
        <!-- start: newreply_threadreview_post -->
        <tr>
          <td class="tcat"><span class="smalltext"><strong>Enviado por Nautilus - 03-31-2022, 03:02 PM</strong></span></td>
        </tr>
        <tr>
          <td class="trow2 scaleimages">
            COMO ESTAS
          </td>
        </tr>

        <tr>
          <td class="tcat"><span class="smalltext"><strong>Enviado por Nautilus - 03-31-2022, 02:49 PM</strong></span></td>
        </tr>

        <tr>
          <td class="trow1 scaleimages"> :D HOLA :D </td>
        </tr>
      </tbody>
    </table>

    <br clear="all">
  </div>
</div>
<?php getFooter($data, "footerForos")?>
