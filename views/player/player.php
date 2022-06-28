<?php
getHeader($data, "headerForos");
$data_user = $data['User'];
?>

<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <strong>Foro Riot Games</strong>
      <span class="nav-spacer">&rsaquo;</span>
      <strong class="active">Perfil de</strong>
    </div>
    <br/>

    <div style="height:200px;overflow:hidden;" class="radiused">
      <div class="profile_background2" style="background-image: url(<?= base_url() ?>assets/images/default_avatar.png);"></div>
    </div>

    <div class="profile-container profile-containter_extras">
      <div class="sidebar" style="margin-top:-30px;">
        <div class="left-sidebar">
          <div class="sidebar-container" style="background:none;">
            <div class="sidebar-inner">
              <center>
                <img src="<?= base_url() ?>assets/images/default_avatar.png" style="width:100px;height:100px;border-width:8px;" class="rounded-avatar avatar_white_border_transparent avatar_shadow">
                <h1> <span style="color: green;"><strong><em><?= $data_user['nombre_jugador'] ?></em></strong></span> </h1>
                <span class="smalltext" style="text-transform: uppercase;"><?= $data_user['rol'] ?></span>
              </center>
            </div>
          </div>
        </div>
      </div>

      <div class="forums">
        <div class="tabs-wrap" style="background:none;">
          <div id="tab-1" class="tab-content current radiused box_shadowed">
            <h2 style="margin-top:0px;">Informacion del usuario</h2>
            <div>

              <div class="profile-ctbox">
                <div><strong>Nombre de usuario:</strong></div>
                <div class="smalltext description">
                  <span class="online" style="font-weight: bold;"><?= $data_user['nombre_jugador'] ?></span>
                </div>
              </div>

              <div class="profile-ctbox">
                <div><strong>Correo:</strong></div>
                <div class="smalltext description"><?= $data_user['correo'] ?></div>
              </div>

              <?php
              if(isset($_SESSION['islogin'])) {
                  if($_SESSION['dataUser']['rol'] == "admin") {?>
              <div class="profile-ctbox">
                <a href="<?= base_url()?>block/blockuser/<?= $data_user['nombre_jugador'] ?>">
                  <div><strong>Banear usuario</strong></div>
                </a>
              </div>
              <?php } } ?>
            </div>
          </div>
        </div>
        <br/>
      </div>
    </div>
    <br clear="all">
  </div>
</div>
<?php getFooter($data, "footerForos") ?>
