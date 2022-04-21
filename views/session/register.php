<!DOCTYPE html>
  <html lang="en">

  <head>
    <title><?= $data['title'] ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/themes/theme5/global.css" />
    <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/themes/theme5/global.css"/>
    <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/themes/theme5/css3.css"/>
    <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/themes/theme5/extra.css"/>
    <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/themes/theme5/responsive.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="preconnect" href="">
    <link rel="shortcut icon" href="/foro/images/riot.ico" />
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  </head>

  <body id="registration_login_page">
    <div class="header_before_gradient"></div>
    <div id="container">
      <div id="content">
        <div class="wrapper">
          <center>
            <a href="<?= base_url() ?>"><img src="<?= base_url() ?>assets/images/darko-logo-white.png" ; style="height:35px;width:auto;"></a>
          </center><br>
          <form>
            <table border="0" cellspacing="0" cellpadding="5" class="tborder" id="log_reg_table">
              <tr>
                <td width="100%" class="trow1" valign="top">
                  <fieldset class="trow2">
                    <table cellspacing="0" cellpadding="5" width="100%">
                      <tr>
                        <td colspan="2">
                          <div class="smalltext login_text_titles"><label for="username">Username</label></div>
                          <input type="text" class="textbox" name="username" id="username" style="width: 100%" value="" />
                        </td>
                      </tr>
                      <!-- start: member_register_password -->
                      <tr>
                        <td width="50%" valign="top">
                          <div class="smalltext login_text_titles">Password</div>
                          <input type="password" class="textbox" name="password" id="password" style="width: 100%" />
                        </td>
                        <td width="50%" valign="top">
                          <div class="smalltext login_text_titles">Confirm Password</div>
                          <input type="password" class="textbox" name="password2" id="password2" style="width: 100%" />
                        </td>
                      </tr>
                      <tr>
                        <td width="50%" valign="top">
                          <div class="smalltext login_text_titles"><label for="email">Email</label></div>
                          <input type="text" class="textbox" name="email" id="email" style="width: 100%" maxlength="50" value="" />
                        </td>
                        <td width="50%" valign="top">
                          <div class="smalltext login_text_titles"><label for="email2">Confirm Email</label></div>
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
                        <td colspan="2"><span class="smalltext">Por favor, responte a la pregunta. Este proceso se utiliza para evitar registros automáticos.</span></td>
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
                    <!-- end: member_register_question -->

                  <br>
                  <div>
                    <input type="submit" class="button log_reg_btn" name="regsubmit" value="Crear cuenta"/>
                  </div>
                  </center>
                </td>
              </tr>
            </table>
          </form>
          <br>
          <center>
            <div class="smalltext white_text">
              Already have an account?
              <a href="login.html" style="color:#fff;font-weight:600;">Login</a> <br><br>
              <a href="index.html" class="white_text" style="font-weight:900"> <i class="fas fa-backspace"></i>&nbsp; Home </a>
            </div>
          </center>
        </div>
      </div>
    </div>
  </body>

</html>
<!-- end: member_register -->
