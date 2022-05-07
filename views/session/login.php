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
					<div id="log_reg_table">
						<div class="error">
							<p><em>Corrige los siguientes errores antes de continuar:</em></p>
								<ul>
									<li>
										Mensaje....
										HOLA EL CAMPO DEBE TENER TAL..
										Lorem ipsum, dolor sit amet consectetur adipisicing elit. Atque, iste!
									</li>
								</ul>
						</div>
						<br>
					</div>
				</center>
				<form>
					<table border="0" cellspacing="0" cellpadding="5" class="tborder" id="log_reg_table" style="padding:30px;padding-bottom:10px;">
						<tr>
							<td class="trow1" style="border:none;">
								<div class="smalltext login_text_titles">Username</div>
								<input type="text" class="textbox" name="username" size="25" style="width: 100%;" value="" />
							</td>
						</tr>
						<tr>
							<td class="trow2">
								<div class="smalltext login_text_titles">Password</div>
								<input type="password" class="textbox" name="password" size="25" style="width: 100%;" value="" />
								<br><a href="<?= base_url() ?>">¿Perdiste tu contraseña?</a>
							</td>
						</tr>
						<tr>
							<td class="trow1" colspan="2" align="center"><label title="Si lo marcas, tu inicio de sesión se recordará en este ordenador, en otro caso, se finalizará la sesión al cerrar el navegador."><input type="checkbox" class="checkbox" name="remember" checked="checked" value="yes" /> Recordarme</label>
								<br><br>
								<div align="center"><input type="submit" class="button log_reg_btn" name="submit" value="Iniciar sesión" />
								</div>
							</td>
						</tr>
					</table>
				</form>
				<br>
				<center>
					<div class="smalltext white_text">¿No tienes una cuenta? <a href="<?= base_url() ?>session/register" class="white_text" style="font-weight:600;">¡Registrate!</a>

						<br><br><a href="<?= base_url() ?>" class="white_text" style="font-weight:900"><i class="fas fa-backspace"></i>&nbsp; Home</a>
					</div>
				</center>
			</div>
		</div>
	</div>
	<script src= "<?= base_url()?>assets/js/scripts/login.js" type="module"></script>
</body>

</html>
<!-- end: member_login -->
