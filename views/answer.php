<?php getHeader($data, "headerForos");
$data_answer = $data['data_answers'];
$honors = $data['honors'];
$discussion = $data['discussion'];
//en el $honors[0][0] está el honor de la discusión
$islogin = isset($_SESSION['islogin']);


?>

<div id="PopUp" class="disabled" style="left:40vw; top:25%; display:flex; flex-direction:column; align-items:center; justify-content:flex-start; width:20vw; height:auto; background:#1b1c22; border:2px solid rgba(186, 51, 64, 1); position:fixed; z-index:9; border-radius:8px">

</div>

<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <a href="foro.html">Foro Riot Games</a>
      <span class="nav-spacer">&rsaquo;</span>
      <a href="forumdisplay.php?fid=1">Foros</a>
      <span class="nav-spacer">&rsaquo;</span>
      <a href="forumdisplay.php?fid=3">League of Legends</a>
      <span class="nav-spacer">&rsaquo;</span>
      <span class="active">Season 2022</span>
    </div>
    <br/>

    <center>
      <span style="font-size:14px;font-weight:300;"></span>
      <h1>Season 2022</h1>
      <span class="show_thread_stats"><?php echo count($data_answer); ?> Respuestas</span>
      <div style="width:200px;"></div>
      <br>
    </center>

    <table border="0" cellspacing="0" cellpadding="5" class="tborder tfixed clear no-bs" style="background:none;">
      <tr style="display:flex;">
        <td class="honors">
          <?php if($islogin) { ?>
            <button class="add-positive-honor" name="AddHonor" value= "<?= $_SESSION['dataUser']['id_jugador']; ?>,<?=  $discussion['id_discusion']?>,discusion,1">
          <?php } ?>

          <button class="view-honors" name="SeeHonors" id="<?= $discussion['id_discusion']?>" value="discusion">
            <span class ="total-honors" id="d<?php echo $discussion['id_discusion']; ?>" name="<?php echo $honors[0][0]; ?>"><?php echo $honors[0][0]; ?></span>
          </button>

          <?php if($islogin) { ?>
              <button class="add-negative-honor" name="AddHonor" value = "<?= $_SESSION['dataUser']['id_jugador']; ?>,<?= $discussion['id_discusion']?>,discusion,-1">
            <?php }?>
            
        </td>
        <td style="width:150%" id="posts_container">
          <div id="posts">
            <a name="pid1" id="pid1"></a>
            <div class="postbit_avatar_margins">
              <a href="<?= base_url()?>player/profile/talUsuario">
                <img src="<?= base_url()?>assets/images/default_avatar.png" class="rounded-avatar box_shadowed avatar_white_border postbit_avatar" style="width:55px;height:55px;border-width:4px;" />
              </a>
            </div>

            <div class="post  box_shadowed" id="post_1">
              <div class="post_content">
                <div class="post_author default_postbit">
                  <div class="author_information" style="display:inline-block;">
                    <h2 style="margin:0px;display:inline-block;">
                      <a href="<?= base_url()?>player/profile/talUsuario">
                        <span style="color: green;">
                          <strong>
                            <em><?php echo $discussion[0]['nombre_jugador']; ?></em>
                          </strong>
                        </span>
                      </a>
                    </h2>
                    <a title="Sin conexión">
                      <div class="postbit_status offline"></div>
                    </a>
                    &nbsp;
                    <small style="color:#999;" class="mobile_line_break"><?php echo $discussion['fecha_discusion']; ?></small>
                    <div class="smalltext description">
                      <?php echo $discussion[0]['rol']; ?><br/>
                    </div>
                  </div>

                  <div class="post_head" style="float:right;">
                    <div class="float_right" style="vertical-align: top">
                      
                    </div>
                  </div>
                </div>

                <div class="border_sep"></div>
                <div class="post_body scaleimages" id="pid_1" style="min-height: auto;">
                  <?php echo $discussion['contenido_discusion']; ?>
                </div>

                <div class="post_meta" id="post_meta_1">
                  <div class="float_right"></div>
                </div>

                <span class="post_edit" id="edited_by_1">
                  <span class="edited_post">(Última modificación: 03-29-2022, 03:09 PM por
                    <a href="<?= base_url()?>player/profile/talUsuario">
                      <?php echo $discussion[0]['nombre_jugador']; ?>
                    </a>.)
                  </span>
                </span>
              </div>

              <div class="post_controls">
                <div class="postbit_buttons post_management_buttons">
                  <ul>
                    <li>
                      <br>
                      <a href="<?= base_url() ?>answer/reply/<?php echo $discussion['id_discusion']; ?>" title="Cita este mensaje en tu respuesta" class="postbit_quote postbit_mirage"><span>Responder</span></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
    </table>


    <?php
    if(is_array($data_answer)) {
      for ($i = 0; $i < count($data_answer); $i++) { ?>
      <table border="0" cellspacing="0" cellpadding="5" class="tborder tfixed clear no-bs" style="background:none;">
        <tr style="display:flex;">
          <td class="honors">
            <?php if($islogin) { ?>
              <button class="add-positive-honor" name="AddHonor" value= "<?= $_SESSION['dataUser']['id_jugador']; ?>,<?= $data_answer[$i]['id_respuesta']?>,respuesta,1">
            <?php } ?>

            <button class="view-honors" name="SeeHonors" id="<?= $data_answer[$i]['id_respuesta']?>" value="respuesta">
              <span class ="total-honors" id="r<?php echo $data_answer[$i]['id_respuesta']; ?>" name="<?php echo $honors[1][$i]; ?>"><?php echo $honors[1][$i]; ?></span>
            </button>

            <?php if($islogin) { ?>
              <button class="add-negative-honor" name="AddHonor" value = "<?= $_SESSION['dataUser']['id_jugador']; ?>,<?= $data_answer[$i]['id_respuesta']?>,respuesta,-1">
            <?php }?>
          </td>
          <td style="width:90%" id="posts_container">
            <div id="posts">
              <a name="pid1" id="pid1"></a>
              <div class="postbit_avatar_margins">
                <a href="<?= base_url()?>player/profile/talUsuario">
                  <img src="<?= base_url()?>assets/images/default_avatar.png" class="rounded-avatar box_shadowed avatar_white_border postbit_avatar" style="width:55px;height:55px;border-width:4px;" />
                </a>
              </div>

              <div class="post  box_shadowed" id="post_1">
                <div class="post_content">
                  <div class="post_author default_postbit">
                    <div class="author_information" style="display:inline-block;">
                      <h2 style="margin:0px;display:inline-block;">
                        <a href="<?= base_url()?>player/profile/talUsuario">
                          <span style="color: green;">
                            <strong>
                              <em><?= $data_answer[$i]['nombre_jugador']?></em>
                            </strong>
                          </span>
                        </a>
                      </h2>
                      &nbsp;
                      <span>Fecha de publicación:</span>
                      <small style="color:#999;" class="mobile_line_break"> <?= $data_answer[$i]['fecha_respuesta']?> </small>
                      <div class="smalltext description">
                        Rol: <span style="text-transform: uppercase;"><?= $data_answer[$i]['rol']?></span>
                        <br/>
                      </div>
                    </div>

                    <div class="post_head" style="float:right;">
                      <div class="float_right" style="vertical-align: top">
                        <strong><?= '#'.$i ?></strong>
                      </div>
                    </div>
                  </div>

                  <div class="border_sep"></div>
                  <div class="post_body scaleimages" id="pid_1" style="min-height: auto;">
                    <?= $data_answer[$i]['contenido_respuesta']?>
                  </div>

                  <div class="post_meta" id="post_meta_1">
                    <div class="float_right"></div>
                  </div>

                   <!-- <span class="post_edit" id="edited_by_1">
                    <span class="edited_post">(Última modificación: 03-29-2022, 03:09 PM por
                      <a href="<?= base_url()?>player/profile/talUsuario">
                        Nautilus
                      </a>.)
                    </span>
                  </span> LUEGO SE AGREGA -->
                </div>

                <!-- <div class="post_controls">
                  <div class="postbit_buttons post_management_buttons">
                    <ul>
                      <li>
                        <br>
                        <a href="<?= base_url() ?>answer/reply/Talpublicacion" title="Cita este mensaje en tu respuesta" class="postbit_quote postbit_mirage"><span>Responder</span></a>
                      </li>
                    </ul>
                  </div>
                </div> Luego se agrega x2 xd-->
              </div>
            </div>
          </td>
        </tr>
      </table>
    <?php
      }
    } else echo $data_answer; ?>
    <br/>
    <br clear="all">
  </div>
</div>
<?php getFooter($data, "footerForos") ?>