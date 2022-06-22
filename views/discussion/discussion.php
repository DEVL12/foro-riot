<?php getHeader($data, "headerForos");
$discusiones = $data['discussion'];
$honors = $data['honors'];
$plataforms = $data['plataforms'];
$islogin = isset($_SESSION['islogin']);

?>

<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <span class="active">Foro Riot Games</span>
    </div>
    <br />

    <div id="welcomemsg" class="guestwelcomemsg">
      <h1>Bienvenido a los Foros de <?= $data['name_plataform'] ?> </h1>
      <?php
        if ($islogin) echo "¡HOLA! " . $_SESSION['dataUser']['nombre_jugador'] . " es un gusto volverte a ver. ¿Deseas compartir algo con nosotros?";
        else echo "Inicia sesion para que puedas compartir con nosotros :P.";
      ?>
      <br><br>
      <?php
      if (!$islogin) { ?>
        <a href="<?= base_url() ?>session/login" style="color:#fff;">Login</a> &nbsp;&nbsp;
        <a href="<?= base_url() ?>session/register" style="color:#fff;width:auto;" class="button">Register</a>
      <?php } ?>
    </div>

    <div class="sidebar">
      <h1 style="margin-bottom:5px;"> Categorias </h1>
      <div class="newthreadindex">
        <?php
        if (!$islogin) { ?>
          <a href="<?= base_url() ?>discussion" class="button btn_gradient" style="cursor:default !important;">Comenzar un nuevo hilo</a>
          <span class="newthreadindex_text">
            <center>
              <i class="fas fa-info-circle"></i>&nbsp;
              <span id="newthread_guest_text" style="display:none;">Primero deberás iniciar sesión.</span> <br><br>
            </center>
          </span>
        <?php
        } else { ?>
          <a href="<?= base_url() ?>discussion/newdiscussion" class="button btn_gradient" style="cursor:default !important;">Comenzar un nuevo hilo</a>
        <?php } ?>
      </div>

      <div id="category-list-index">
        <table border="0" cellspacing="0" cellpadding="5" class="tborder radiused">
          <tr>
            <td class="trow1 radiused">
              <h3>Foros</h3>
              <ul class="category_ul">
                <?php
                if (is_array($plataforms)) {
                  for ($i = 0; $i < count($plataforms); $i++) { ?>
                    <li style="list-style-type:none;">
                      <a href="<?= base_url() . 'discussion/foro/' . $plataforms[$i]['nombre_plataforma'] ?>">
                        <div class="forum_status forum_off ajax_mark_read" id="mark_read_3">
                          <i class="far fa-comment-alt"></i>
                        </div>
                        &nbsp;&nbsp; <?= $plataforms[$i]['nombre_plataforma']; ?>
                      </a>
                    </li>
                <?php
                  }
                } else echo $plataforms;
                ?>
              </ul>
              <br>
            </td>
          </tr>
        </table>
      </div>
      <br>
    </div>

    <div class="forums">
      <div id="new-projects">
        <div id="portal_threads">
          <table width="100%" cellspacing="0" cellpadding="5" border="0" align="center">
            <tbody>
              <tr>
                <td valign="top">
                  <h1>Ultimos hilos <?php (($data['name_plataform']) != "Riot Games") ? print("de: " . $data['name_plataform']) : print("publicados") ?></h1>
                  <br>
                  <?php
                  if (is_array($discusiones)) {
                    for ($i = 0; $i < count($discusiones); $i++) { ?>
                      <table cellspacing="0" cellpadding="5" class="tborder radiused">
                        <tbody>
                          <tr>
                            <td>
                              <span class="view-honors">
                                <span class="total-honors"><?php echo $honors[$i]; ?></span>
                              </span>
                            </td>
                            <td class="trow1" style="padding:0px;">
                              <table border="0" cellpadding="5" class="tfixed" style="width: 100%;">
                                <tbody>
                                  <tr>
                                    <td class="trow1 scaleimages no_bottom_border" valign="top">
                                      <img src="<?= base_url()?>assets/images/default_avatar.png" class="rounded-avatar box_shadowed avatar_white_border" style="width:50px;height:50px;float:left;border-width:5px;margin-bottom:10px;margin-right:10px;margin-top:5px;">
                                      <a href="<?= base_url().'answer/answers_for/'.$discusiones[$i]['id_discusion'] ?>">
                                        <h2 style="margin:0px;display:inline-block;"> <?= $discusiones[$i]['titulo'] ?> </h2>
                                      </a><br>

                                      <h4> <?= $discusiones[$i]['nombre_plataforma'] ?> &nbsp;&nbsp; <i class="far fa-comment-alt"></i> 2 Replies </h4>
                                      <a href="<?= base_url().'player/profile/'.$discusiones[$i]['nombre_jugador'] ?>"><?= $discusiones[$i]['nombre_jugador'] ?></a>, <?= $discusiones[$i]['fecha_discusion'] ?>
                                      <div class="border_sep" style="margin-top:10px;"></div>

                                      <p class="portal-message" style="max-height:300px;overflow:hidden;"><?= $discusiones[$i]['contenido_discusion'] ?>
                                      </p><br>

                                      <a href="<?= base_url() . 'answer/answers_for/' . $discusiones[$i]['id_discusion'] ?>" style="padding:10px 0px;margin-right:18px;">
                                        <i class="fas fa-external-link-square-alt"></i>&nbsp; Ver respuestas
                                      </a>

                                      <a href="<?= base_url() . 'answer/reply/' . $discusiones[$i]['id_discusion'] ?>">
                                        <?php
                                        if ($islogin) { ?>
                                          <button class="button"><i class="far fa-edit"></i>&nbsp; Responder</button>
                                        <?php } ?>
                                      </a>
                                    </td>
                                  </tr>
                                </tbody>
                              </table>
                            </td>
                          </tr>
                        </tbody>
                      </table>
                      <br>
                  <?php
                    }
                  } else echo $discusiones;
                  ?>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
    <br class="clear" />
    <br clear="all">
  </div>
</div>
<?php getFooter($data, "footerForos") ?>
