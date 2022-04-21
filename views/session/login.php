<!DOCTYPE html>
<html>
  <head>
    <title>Foro Riot Games - Iniciar sesión</title>
    <!-- start: headerinclude -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/themes/theme5/global.css"/>
		<link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/themes/theme5/css3.css"/>
		<link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/themes/theme5/extra.css"/>
		<link type="text/css" rel="stylesheet" href="<?= base_url()?>assets/css/themes/theme5/responsive.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <link rel="icon" href="<?=base_url()?>assets/images/riot.png">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">
  </head>

	<body id="registration_login_page">
		<!-- start: header -->
		<div class="header_before_gradient"></div>
		<div id="container">
			<div id="content">
				<div class="wrapper">
					<center>
						<a href="<?= base_url()?>">
							<img src="<?= base_url()?>assets/images/darko-logo-white.png" style="height:35px;width:auto;">
						</a>
						<br><br>
						<div id="log_reg_table"></div>
					</center>

					<form>
						<table border="0" cellspacing="0" cellpadding="5" class="tborder" id="log_reg_table"
							style="padding:30px;padding-bottom:10px;">
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
									<br><a href="<?= base_url()?>">¿Perdiste tu contraseña?</a>
								</td>
							</tr>
							<tr>
								<td class="trow1" colspan="2" align="center"><label
										title="Si lo marcas, tu inicio de sesión se recordará en este ordenador, en otro caso, se finalizará la sesión al cerrar el navegador."><input
											type="checkbox" class="checkbox" name="remember" checked="checked" value="yes" /> Recordarme</label>
									<br><br>
									<div align="center"><input type="submit" class="button log_reg_btn" name="submit" value="Iniciar sesión"/>
									</div>
								</td>
							</tr>
						</table>
					</form>
					<br>
					<center>
						<div class="smalltext white_text">Don't have an account? <a href="terminos.html" class="white_text"
								style="font-weight:600;">Sign Up</a>

							<br><br><a href="index.html" class="white_text" style="font-weight:900"><i
									class="fas fa-backspace"></i>&nbsp; Home</a>
						</div>
					</center>
				</div>
			</div>
		</div>
	</body>
</html>
<!-- end: member_login -->
