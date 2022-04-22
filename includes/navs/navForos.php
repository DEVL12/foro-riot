<div id="header">
  <div id="panel">
    <div class="upper">
      <div class="wrapper">
        <!-- start: header_welcomeblock_guest -->
        <div class="float_right" id="guest_info_header">
          <a href="<?= base_url() ?>session/login" class="login"> <i class="fas fa-key"></i> &nbsp; Iniciar sesión</a>
          <a href="<?= base_url() ?>session/register" class="register">Regístrate</a>
        </div>

        <div class="title-img title-img-guest">
          <a href="<?= base_url() ?>">
            <img src="<?= base_url() ?>assets/images/roundo-darko-logo.png" id="header_logo">
          </a>
        </div>
        <ul class="menu top_links float_left">
          <li><a href="<?= base_url() ?>">Inicio</a></li>
          <li><a href="foro.html">Foros</a></li>
          <li><a href="search.html">Búsqueda</a></li>
          <li><a href="memberlist.html">Lista de miembros</a></li>
          <li><a href="help.html" class="help">Ayuda</a></li>
          <li><a href="busqueda.html">Nuevas Publicaciones</a></li>
        </ul>
      </div>
    </div>
  </div>

  <script>
    $(document).ready(function() {
      $("#welcomemsg").css("display", "block");
      $("#newthread_guest_text").css("display", "inline-block");
    });
  </script>

  <div class="mobile_header mobile_only">
    <center>
      <div class="show_hide_mobile_header"><i class="fas fa-bars" style="font-size:10px;"></i>Menu</div>
      <script>
        $('.show_hide_mobile_header').click(function() {
          $('#mobile_header_links').slideToggle();
        });
      </script>
    </center>

    <div id="mobile_header_links" style="display:none;">
      <a href="<?= base_url() ?>"><i class="fas fa-inicio fa-fw"></i>Inicio</a>
      <a href="foro.html"><i class="fas fa-home fa-fw"></i>Foros</a>
      <a href="search.html"><i class="fas fa-search fa-fw"></i>Buscar</a>
      <a href="memberlist.html"><i class="fas fa-users fa-fw"></i>Miembros</a>
      <a href="help.html"><i class="fas fa-info-circle fa-fw"></i>Ayuda</a>
      <a href="busqueda.html" style="border-bottom:none;"><i class="fas fa-comments fa-fw"></i>Nuevas Publicaciones</a>
    </div>
  </div>
</div>
