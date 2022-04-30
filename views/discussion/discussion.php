<?php getHeader($data, "headerForos") ?>

<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <span class="active">Foro Riot Games</span>
    </div>
    <br />

    <div id="welcomemsg" class="guestwelcomemsg">
      <h1> Bienvenido a los Foros de Riot Games </h1>
      TEXTO ......................................
      <br><br>
      <a href="<?php base_url() ?>session/login" style="color:#fff;">Login</a> &nbsp;&nbsp;
      <a href="<?php base_url() ?>session/login" style="color:#fff;width:auto;" class="button">Register</a>
    </div>

    <div class="sidebar">
      <h1 style="margin-bottom:5px;"> Categorias </h1>
      <div class="newthreadindex">
        <a href="#!" class="button btn_gradient" style="cursor:default !important;">Comenzar un nuevo hilo</a>
        <span class="newthreadindex_text">
          <center>
            <i class="fas fa-info-circle"></i>&nbsp;
            <span id="newthread_guest_text" style="display:none;">Primero deberá registrar una cuenta.</span>
            Elija una de las categorías a continuación para comenzar un nuevo hilo
          </center>
        </span>
      </div>

      <div id="category-list-index">
        <table border="0" cellspacing="0" cellpadding="5" class="tborder radiused">
          <tr>
            <td class="trow1 radiused">
              <!-- start: forumbit_depth1_cat -->
              <h3>Foros</h3>
              <ul class="category_ul">
                <!-- start: forumbit_depth2_forum -->
                <li style="list-style-type:none;">
                  <a href="forumdisplay.php?fid=3">
                    <div class="forum_status forum_on ajax_mark_read" title="Foro que contiene mensajes nuevos" id="mark_read_3">
                      <i class="far fa-comment-alt"></i>
                    </div>
                    &nbsp;&nbsp;League of Legends
                  </a>
                </li>

                <ul style="list-style-type:none;"></ul>

                <li style="list-style-type:none;">
                  <a href="forumdisplay.php?fid=4">
                    <div class="forum_status forum_on ajax_mark_read" title="Foro que contiene mensajes nuevos" id="mark_read_4">
                      <i class="far fa-comment-alt"></i>
                    </div>
                    &nbsp;&nbsp;Valorant
                  </a>
                </li>

                <ul style="list-style-type:none;"></ul>

                <li style="list-style-type:none;">
                  <a href="forumdisplay.php?fid=5">
                    <div class="forum_status forum_off ajax_mark_read" title="Foro que no contiene mensajes nuevos" id="mark_read_5">
                      <i class="far fa-comment-alt"></i>
                    </div>
                    &nbsp;&nbsp;League of Legends Wild Rift
                  </a>
                </li>

                <ul style="list-style-type:none;"></ul>

                <li style="list-style-type:none;">
                  <a href="forumdisplay.php?fid=6">
                    <div class="forum_status forum_off ajax_mark_read" title="Foro que no contiene mensajes nuevos" id="mark_read_6">
                      <i class="far fa-comment-alt"></i>
                    </div>&nbsp;&nbsp;Legends of Runaterra
                  </a>
                </li>

                <ul style="list-style-type:none;"></ul>

                <li style="list-style-type:none;">
                  <a href="forumdisplay.php?fid=7">
                    <div class="forum_status forum_off ajax_mark_read" title="Foro que no contiene mensajes nuevos" id="mark_read_7">
                      <i class="far fa-comment-alt"></i>
                    </div>&nbsp;&nbsp;Teamfight Tactics
                  </a>
                </li>

                <ul style="list-style-type:none;"></ul>
              </ul>
              <br>

              <span class="forum_status">
                <i class="far fa-comment-alt"></i> New Posts
              </span> &nbsp;&nbsp;
              <span class="forum_off">
                <i class="far fa-comment-alt"></i> No New
              </span>
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
                  <h1>Ultimos hilos</h1>
                  <br>
                  <?php for ($i = 0; $i < 5; $i++) { ?>
                    <!-- MOSTRAR LA CANTIDAD DE MENSAJES QUE QUIERAN A MODO DE PRUEBA -->
                    <table cellspacing="0" cellpadding="5" class="tborder radiused">
                      <tbody>
                        <tr>
                          <td class="trow1" style="padding:0px;">
                            <table border="0" cellpadding="5" class="tfixed" style="width: 100%;">
                              <tbody>
                                <tr>
                                  <td class="trow1 scaleimages no_bottom_border" valign="top">
                                    <img src="http://localhost/foro/images/default_avatar.png" class="rounded-avatar box_shadowed avatar_white_border" style="width:50px;height:50px;float:left;border-width:5px;margin-bottom:10px;margin-right:10px;margin-top:5px;">
                                    <a href="http://localhost/foro/showthread.php?tid=3">
                                      <h2 style="margin:0px;display:inline-block;">Hola</h2>
                                    </a><br>
                                    <h4>Valorant &nbsp;&nbsp; <i class="far fa-comment-alt"></i> 2 Replies </h4>
                                    <a href="#">Nautilus</a>, 03-31-2022, 02:49 PM
                                    <div class="border_sep" style="margin-top:10px;"></div>
                                    <p class="portal-message" style="max-height:300px;overflow:hidden;">
                                      <img src="http://localhost/foro/images/smilies/biggrin.png" alt="Big Grin" title="Big Grin" class="smilie smilie_4"> &nbsp;HOLA
                                      <img src="http://localhost/foro/images/smilies/biggrin.png" alt="Big Grin" title="Big Grin" class="smilie smilie_4">
                                    </p><br>
                                    <a href="<?= base_url()?>answer" style="padding:10px 0px;margin-right:18px;">
                                      <i class="fas fa-external-link-square-alt"></i>&nbsp; Open Thread
                                    </a>
                                    <a href="<?= base_url() ?>answer/reply/Talpublicacion"><button class="button"><i class="far fa-edit"></i>&nbsp; Reply</button></a>
                                  </td>
                                </tr>
                              </tbody>
                            </table>
                          </td>
                        </tr>
                      </tbody>
                    </table>
                    <br>
                  <?php } ?>
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
<?php getFooter($data, "footerForos")?>
