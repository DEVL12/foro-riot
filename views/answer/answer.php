<?php getHeader($data, "headerForos");
$islogin = isset($_SESSION['islogin']);
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
        <td class="honors">
          <?php if($islogin) { ?>
            <button class="add-positive-honor" name="AddHonor" value= "<?= $_SESSION['dataUser']['id_jugador']; ?>,<?= $i; ?>,discusion, 1">
          <?php } ?>

          <button class="view-honors" name="SeeHonors" id="<?= $i ?>"value="discusion">
            <span class ="total-honors"><?php echo DameElTotalDeHonoresDeEstaDiscusion($i); ?></span>
          </button>

          <?php if($islogin) { ?>
            <button class="add-negative-honor" name="AddHonor" value = "<?= $_SESSION['dataUser']['id_jugador']; ?>,<?= $i; ?>,discusion,-1">
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
