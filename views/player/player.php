<?php getHeader($data, "headerForos"); ?>

<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <a href="<?= base_url() ?>">Foro Riot Games</a>
      <span class="nav-spacer">&rsaquo;</span>
      <span class="active">Perfil de Nautilus</span>
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
                <h1> <span style="color: green;"><strong><em>Nautilus</em></strong></span> </h1>
                <span class="smalltext">Administrator</span>
                <br>

                <button class="button btn_gradient">
                  <i class="fas fa-user-plus"></i>&nbsp; Dar Hono
                </button><br><br>

                <div class="profile_stats_a_bg">
                  <a href="<?= base_url() ?>discussion" class="profile_stats_a">
                    <h3>6</h3>
                    <span class="smalltext">Posts</span>
                  </a>
                  <a href="<?= base_url() ?>discussion" class="profile_stats_a">
                    <h3>3</h3>
                    <span class="smalltext">Threads</span>
                  </a>
                  <a href="#!" class="profile_stats_a" style="margin-right:0px;border:none;">
                    <h3>
                      <strong class="reputation_neutral">0</strong>
                    </h3>
                    <span class="smalltext">Ratings</span>
                  </a>
                </div>
                <br>
              </center>
            </div>
          </div>
        </div>
      </div>

      <div class="forums">
        <div class="tabs-wrap" style="background:none;">
          <ul class="tabs" style="margin-bottom:8px;">
            <li class="tab-link current" data-tab="tab-1">Información</li>
            <li class="tab-link" data-tab="tab-2">Información adicional</li>
            <li class="tab-link" data-tab="tab-3">Calificaciones</li>
            <li class="tab-link" data-tab="tab-4">Firma</li>
            <li class="tab-link" data-tab="tab-5">Contacto</li>
          </ul>

          <div id="tab-1" class="tab-content current radiused box_shadowed">
            <h2 style="margin-top:0px;">Informacion del usuario</h2>
            <div>
              <div class="profile-ctbox">
                <b>Ingresó:</b><br>
                03-29-2022
              </div>

              <div class="profile-ctbox">
                <div><strong>Estado:</strong></div>
                <div class="smalltext description">
                  <span class="online" style="font-weight: bold;">En línea</span> (Viendo perfil de Nautilus @ 06:18 PM)
                </div>
              </div>

              <div class="profile-ctbox">
                <div><strong>Última visita:</strong></div>
                <div class="smalltext description">Hace 2 minutos</div>
              </div>

              <div class="profile-ctbox">
                <div><strong>Tiempo en línea:</strong></div>
                <div class="smalltext description">3 Horas, 33 Minutos, 30 Segundos</div>
              </div>

              <tr>
                <td class="trow2"><strong>Nivel de advertencia:</strong></td>
                <td class="trow2">
                  <a href="#!">
                    <span class="normal_warning">0%</span>
                  </a>
                  [<a href="#!">Advertencia</a>]
                </td>
              </tr>

              <div class="profile-ctbox">
                <a href="<?= base_url()?>block">
                  <div><strong>Reportar usuario</strong></div>
                </a>
              </div>

              <div class="profile-ctbox">
                <a href="<?= base_url()?>">
                  <div><strong>Banear usuario</strong></div>
                </a>
              </div>
            </div>
          </div>

          <div id="tab-2" class="tab-content radiused box_shadowed">
            <h2 style="margin-top:0px;">Información adicional</h2>
            <div class="profile-ctbox">
              <div><strong>Mensajes totales:</strong></span></div>
              <div class="smalltext description">6 (0.2 mensajes por día | 100 &#37; del total)
                <span class="smalltext description">[<a href="#!">Buscar sus mensajes</a>]</span>
              </div>
            </div>

            <div class="profile-ctbox">
              <div><strong>Temas totales:</strong></div>
              <div class="smalltext description">3 (0.1 temas por día | 100 &#37; del total)
                <!-- start: member_profile_findthreads -->
                <span class="smalltext description">[<a href="#!">Buscar sus temas</a>]</span>
                <!-- end: member_profile_findthreads -->
              </div>
            </div>

            <div class="profile-ctbox"> <b>Miembros recomendados:</b><br>0 </div>

            <div class="profile-ctbox">
              <div><strong>Opciones de moderador:</strong></div><br/>
              <div>
                <div>&bull;&nbsp;
                  <a href="#!">Editar en el panel de moderación</a>
                </div>

                <div>&bull;&nbsp;
                  <a href="#!">Suspender en el panel de moderación</a>
                </div>
              </div>

              <div><br/>
                Actualmente no hay notas sobre este usuario.<br/>
                <a href="#!">Editar notas en el panel de moderación</a>
              </div>
            </div>

            <div class="profile-ctbox">
              <div><strong>IP de registro:</strong> 127.0.0.1</div>
              <div><strong>Última IP conocida:</strong> ::1</div>
            </div>

            <div class="profile-ctbox">
              <div><strong>Opciones administrador:</strong></div><br />
              <div>
                <div>&bull;&nbsp; <a href="#!">Editar en el panel de administración</a></div>
                <div>&bull;&nbsp; <a href="#!">Suspender en el panel de administración</a></div>
              </div>
            </div>
          </div>

          <div id="tab-3" class="tab-content radiused box_shadowed">
            <h2 style="margin-top:0px;margin-bottom:0px;">Ratings</h2>
            <style>
              .hideonprofile {
                display: none;
              }

              #reputationlist {
                box-shadow: none !important;
              }
            </style>

            <span class="smalltext">Here's what users think of Nautilus</span><br>
            <div id="show_rep_profile"><img src="images/roundo/spinner_big.gif" id="jquery_spinner_load"></div>
            <script> $("#show_rep_profile").load("reputation.php?uid=1 #reputationlist");</script>
          </div>

          <div id="tab-4" class="tab-content radiused box_shadowed"><h2 style="margin-top:0px;">Signature</h2></div>
          <div id="tab-5" class="tab-content radiused box_shadowed"><h2 style="margin-top:0px;">Contact</h2></div>
        </div>
        <br/>
      </div>
    </div>

    <script src="<?= base_url()?>assets/js/profileMenu.js"></script>
    <br clear="all">
  </div>
</div>
<?php getFooter($data, "footerForos") ?>
