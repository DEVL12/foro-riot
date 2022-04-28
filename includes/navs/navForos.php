<div id="header">
  <div id="panel">
    <div class="upper">
      <div class="wrapper">
      <?php $InicioSession = true; // esta variable va a servir para comprobar si hay un session abierta o no, luego eso se manejara con $SESSION

        if($InicioSession) { // AQUI SE COMPRUEBA EL LOGIN ?>
        <div class="float_right" id="member_info_header"> <!--ESTO IRA CUANDO SE Usen variables de login-->
          <a href="" id="dropmenu"><span><img src="<?= base_url()?>assets/images/default_avatar.png" class="rounded-avatar" style="width:30px;height:30px;margin-bottom:-9px;"></span></a>
        </div>

      <?php } else { ?>
        <div class="float_right" id="guest_info_header">
          <a href="<?= base_url() ?>session/login" class="login"> <i class="fas fa-key"></i> &nbsp; Iniciar sesión</a>
          <a href="<?= base_url() ?>session/register" class="register">Regístrate</a>
        </div>
      <?php } ?>

        <div class="title-img title-img-guest">
          <a href="<?= base_url() ?>">
            <img src="<?= base_url() ?>assets/images/roundo-darko-logo.png" id="header_logo">
          </a>
        </div>
        <ul class="menu top_links float_left">
          <li><a href="<?= base_url() ?>">Inicio</a></li>
          <li><a href="<?= base_url() ?>discussion">Foros</a></li>
          <li><a href="<?= base_url() ?>search">Búsqueda</a></li>
          <li><a href="<?= base_url() ?>memberList">Lista de miembros</a></li>

          <?php if($InicioSession) {?>
          <li><a href="" id="moremenu"><span>Publicaciones</span> <i class="fa fa-caret-down"></i></a></li>
          <?php } else { ?>
            <li><a href="<?= base_url() ?>discussion">Nuevas Publicaciones</a></li>
          <?php } ?>

          <li><a href="help.html" class="help">Ayuda</a></li>
        </ul>
      </div>
    </div>
  </div>

  <?php if($InicioSession) {?>
  <div id="moremenu_popup" class="popup_menu pedit--adj" style="position: absolute; top: 65px; left: 825.203px; display:none;">
    <div class="popup_item_container"><a href="#" class="popup_item">Mis Publicaciones</a></div>
    <div class="popup_item_container"><a href="#" class="popup_item">Ver nuevas publicaciones</a></div>
    <div class="popup_item_container"><a href="#" class="popup_item">Ver las publicaciones de hoy</a></div>
  </div>

  <div id="dropmenu_popup" class="popup_menu pedit--adj" style="position: absolute; top: 41px; left: 1159.31px; display:none;">
    <div class="popup_item_container"><a href="<?= base_url()?>player/profile/UsuarioTAL" class="popup_item"><span>Ver perfil</span></a></div>
    <div class="popup_item_container"><a href="#" class="popup_item"><span>Editar Avatar</span></a></div>
    <div class="popup_item_container"><a href="#" class="popup_item"><span>Cerrar sesión!</span></a></div>
  </div>
  <?php } ?>

  <div class="mobile_header mobile_only">
    <center> <div class="show_hide_mobile_header"><i class="fas fa-bars" style="font-size:10px;"></i>Menu</div> </center>

    <div id="mobile_header_links" style="display:none;">
      <a href="<?= base_url() ?>"><i class="fas fa-inicio fa-fw"></i>Inicio</a>
      <a href="<?= base_url() ?>discussion"><i class="fas fa-home fa-fw"></i>Foros</a>
      <a href="<?= base_url() ?>search"><i class="fas fa-search fa-fw"></i>Búsqueda</a>
      <a href="<?= base_url() ?>memberList"><i class="fas fa-users fa-fw"></i>Lista de miembros</a>
      <a href="<?= base_url() ?>discussion" style="border-bottom:none;"><i class="fas fa-comments fa-fw"></i>Nuevas Publicaciones</a>
      <a href="#"><i class="fas fa-info-circle fa-fw"></i>Ayuda</a>
    </div>
  </div>
</div>

<script src="<?= base_url()?>assets/js/navForos.js"></script>
