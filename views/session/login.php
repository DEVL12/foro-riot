<?php getHeader($data, "headerSession") ?>
<body id="registration_login_page">
  <!-- start: header -->
  <div class="header_before_gradient"></div>
  <div id="container">
    <div id="content">
      <div class="wrapper">
        <center>
          <a href="<?= base_url() ?>">
            <img src="<?= base_url() ?>assets/images/darko-logo-white.png" style="height:35px;width:auto;">
          </a>
          <br><br>
          <div id ="log_reg_table" class="log_reg_table_msg">

          </div>
          <br>
        </center>
        <form id = "formLogin">
          <table border="0" cellspacing="0" cellpadding="5" class="tborder" id="log_reg_table" style="padding:30px;padding-bottom:10px;">
            <tr>
              <td class="trow1" style="border:none;">
                <div class="smalltext login_text_titles">Nombre de usuario</div>
                <input type="text" class="textbox" name="username" id = "username" size="25" style="width: 100%;" value="" />
              </td>
            </tr>
            <tr>
              <td class="trow2">
                <div class="smalltext login_text_titles">Contraseña</div>
                <input type="password" class="textbox" name="password" id = "password" size="25" style="width: 100%;" value="" />
              </td>
            </tr>
            <tr>
              <td class="trow1" colspan="2" align="center">
                <div align="center"><input type="submit" class="button log_reg_btn" id = "btn_submit" name="submit" value="Iniciar sesión" />
                </div>
              </td>
            </tr>
          </table>
        </form>
        <br><br>
        <center>
          <div class="smalltext white_text">¿No tienes una cuenta? <a href="<?= base_url() ?>session/register" class="white_text" style="font-weight:600;">¡Registrate!</a>

            <br><br><a href="<?= base_url() ?>" class="white_text" style="font-weight:900"><i class="fas fa-backspace"></i>&nbsp; Home</a>
          </div>
        </center>
      </div>
    </div>
  </div>
  <script> const base_url = "<?= base_url(); ?>"; </script>
  <script src= "<?= base_url()?>assets/js/scripts/login.js" type="module"></script>
</body>

</html>
<!-- end: member_login -->
