<?php getHeader($data, "headerForos"); ?>

<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <span class="active">Foro Riot Games</span>
      <span class="nav-spacer">&rsaquo;</span>
      <a href="<?= base_url() ?>discussion">Foros</a>
      <span class="nav-spacer">›</span>
      <span class="active">Plataformas</span>
    </div>
    <br />

    <div id="welcomemsg" class="guestwelcomemsg">
      <i>
        <h1> Plataformas </h1>
      </i>
      <br><br>
    </div>


    <form id="platform-riot" autocomplete="off">
      <table border="0" cellspacing="0" cellpadding="5" class="tborder">
        <tbody>
          <tr>
            <td class="thead" colspan="2" style="text-align: center;"><h2>Crear una nueva plataforma</h2></td>
          </tr>
          <tr>
            <td class="trow2" width="20%"><strong>Nombre de la Plataforma:</strong></td>
            <td class="trow2"><input type="text" class="textbox" id="subject" name="subject" size="40" maxlength="85" placeholder="Escribe el nombre de la plataforma" tabindex="1"></td>
          </tr>
        </tbody>
      </table>
      <br>

      <div align="center">
        <input type="submit" class="button" name="submit" value="Crear Plataforma" tabindex="3" accesskey="s">
      </div>
      <br>
    </form>
  </div>


  <?php getFooter($data, "footerForos") ?>
