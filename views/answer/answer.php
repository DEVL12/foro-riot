<?php getHeader($data, "headerForos");

function DameElTotalDeHonoresDeEstaDiscusion($id){
  //Esta es una función de prueba, esta función debería ser GetTotalDiscussionHonor($id) del HonorModel.php
  return 16;
}

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
      <span class="show_thread_stats">0 Replies, 2 Views</span>
      <div style="width:200px;"></div>
      <br>
    </center>

    <?php for ($i = 1; $i <= 3; $i++) { ?>
    <table border="0" cellspacing="0" cellpadding="5" class="tborder tfixed clear no-bs" style="background:none;">
      <tr style="display:flex;">
        <td style="width:10%; height:100%; display:flex; flex-direction:column; align-items:center; justify-content:center; margin:0px">
          <!-- Este botón es el de arriba, y debe llamar a la función AddHonor($id_del_jugador, $id_de_discusion, "discusion", 1)del HonorModel.php -->
          <button name="AddHonor" id=<?php echo $i; ?> text="discusion" value="1" style="width:35px;height:20px; -webkit-transform: scaleY(-1); margin:0; background-size:contain; background-repeat:no-repeat; background-color:rgba(0,0,0,0); background-image:url(<?= base_url()?>assets/images/down_arrow.png)">

          <!-- Este es el botón  que muestra el pop up con el desglose de todas las personas que han dado honor y qué tipo de honor dieorn-->
          <button name="SeeHonors" id=<?php echo $i; ?> value="discusion" style="width:70px;height:70px;float:left;border-width:5px; margin:10px 0px; background-size:contain; background-repeat:no-repeat; background-image:url(<?= base_url()?>assets/images/honor.png)">
            <span style="display:flex; align-items:center; justify-content:center; width:100%; height:100%; font-size:20px"><?php echo DameElTotalDeHonoresDeEstaDiscusion($i); ?></span>
          </button>
          <!-- Este botón es el de abajo, y debe llamar a la función AddHonor($id_del_jugador, $id_de_discusion, "discusion", -1)del HonorModel.php -->
          <button name="AddHonor" id=<?php echo $i?> text="discusion" value="-1" style="width:35px;height:20px; margin:0; background-size:contain; background-color:rgba(0,0,0,0); background-repeat:no-repeat; background-image:url(<?= base_url()?>assets/images/down_arrow.png)">
        </td>
        <td style="width:90%"id="posts_container">
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
                            <em>Nautilus</em>
                          </strong>
                        </span>
                      </a>
                    </h2>
                    <a title="Sin conexión">
                      <div class="postbit_status offline"></div>
                    </a>
                    &nbsp;
                    <small style="color:#999;" class="mobile_line_break">03-29-2022, 03:09 PM</small>
                    <div class="smalltext description">
                      Administrator<br/>
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
                  SEASON 2022 - NEW
                </div>

                <div class="post_meta" id="post_meta_1">
                  <div class="float_right"></div>
                </div>

                <span class="post_edit" id="edited_by_1">
                  <span class="edited_post">(Última modificación: 03-29-2022, 03:09 PM por
                    <a href="<?= base_url()?>player/profile/talUsuario">
                      Nautilus
                    </a>.)
                  </span>
                </span>
              </div>

              <div class="post_controls">
                <div class="postbit_buttons post_management_buttons">
                  <ul>
                    <li>
                      <br>
                      <a href="<?= base_url() ?>answer/reply/Talpublicacion" title="Cita este mensaje en tu respuesta" class="postbit_quote postbit_mirage"><span>Responder</span></a>
                    </li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </td>
      </tr>
    </table>
    <?php } ?>
    <br/>
    <br clear="all">
  </div>
</div>
<?php getFooter($data, "footerForos") ?>
