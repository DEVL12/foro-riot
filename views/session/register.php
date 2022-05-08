<?php getHeader($data, "headerSession") ?>
<body id="registration_login_page">
  <div class="header_before_gradient"></div>
  <div id="container">
    <div id="content">
      <div class="wrapper">
        <center>
          <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/darko-logo-white.png" ; style="height:35px;width:auto;"></a>
          <br><br>
					<div id ="log_reg_table" class="log_reg_table_msg">

					</div>
        </center><br>

        <form id = "formRegister" autocomplete="off">
          <table border="0" cellspacing="0" cellpadding="5" class="tborder" id="log_reg_table">
            <tr>
              <td width="100%" class="trow1" valign="top">
                <fieldset class="trow2">
                  <table cellspacing="0" cellpadding="5" width="100%">
                    <tr>
                      <td colspan="2">
                        <div class="smalltext login_text_titles"><label for="username">Nombre de usuario</label></div>
                        <input type="text" class="textbox" name="username" id="username" style="width: 100%" value="" />
                      </td>
                    </tr>
                    <tr>
                      <td width="50%" valign="top">
                        <div class="smalltext login_text_titles">Contraseña</div>
                        <input type="password" class="textbox" name="password" id="password" style="width: 100%" />
                      </td>
                      <td width="50%" valign="top">
                        <div class="smalltext login_text_titles">Confirmar contraseña</div>
                        <input type="password" class="textbox" name="password2" id="password2" style="width: 100%" />
                      </td>
                    </tr>
                    <tr>
                      <td width="50%" valign="top">
                        <div class="smalltext login_text_titles"><label for="email">Correo</label></div>
                        <input type="text" class="textbox" name="email" id="email" style="width: 100%" maxlength="50" value="" />
                      </td>
                      <td width="50%" valign="top">
                        <div class="smalltext login_text_titles"><label for="email2">Confirmar Correo</label></div>
                        <input type="text" class="textbox" name="email2" id="email2" style="width: 100%" maxlength="50" value="" />
                      </td>
                    </tr>
                  </table>
                </fieldset>

                <center>
                  <br />
                  <legend><strong>Pregunta de seguridad</strong></legend>
                  <table cellspacing="0" cellpadding="5">
                    <tr>
                      <td colspan="2"><span class="smalltext">Por favor, responde a la pregunta. Este proceso se utiliza para evitar registros automáticos.</span></td>
                    </tr>
                    <tr>
                      <td colspan="2"><br /><span class="smalltext" id="question" style="font-weight:bold;">Cuanto es 2 + 2?</span></td>
                    </tr>
                    <tr>
                      <td width="60%">
                        <input type="text" class="textbox" name="answer" value="" id="answer" style="width: 70%;" />
                      </td>
                    </tr>
                  </table>
                  <br>

                  <div>
                    <input type="submit" class="button log_reg_btn" name="regsubmit" value="Crear cuenta" />
                  </div>
                </center>
              </td>
            </tr>
          </table>
        </form>
        <br>
        <center>
          <div class="smalltext white_text">
            ¿Ya posees una cuenta?
            <a href="<?= base_url() ?>session/login" style="color:#fff;font-weight:600;">Login</a> <br><br>
            <a href="<?= base_url() ?>" class="white_text" style="font-weight:900"> <i class="fas fa-backspace"></i>&nbsp; Home </a>
          </div>
        </center>
      </div>
    </div>
  </div>
	<script src= "<?= base_url()?>assets/js/scripts/register.js" type="module"></script>
</body>
</html>
