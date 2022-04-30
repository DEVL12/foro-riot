<?php getHeader($data, "headerForos") ?>

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
      <tr>
        <td id="posts_container">
          <div id="posts">
            <a name="pid1" id="pid1"></a>
            <div class="postbit_avatar_margins">
              <a href="member.php?action=profile&amp;uid=1">
                <img src="http://localhost/foro/images/default_avatar.png" class="rounded-avatar box_shadowed avatar_white_border postbit_avatar" style="width:55px;height:55px;border-width:4px;" />
              </a>
            </div>

            <div class="post  box_shadowed" id="post_1">
              <div class="post_content">
                <div class="post_author default_postbit">
                  <div class="author_information" style="display:inline-block;">
                    <h2 style="margin:0px;display:inline-block;">
                      <a href="http://localhost/foro/member.php?action=profile&amp;uid=1">
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
                      <strong><a href="showthread.php?tid=1&amp;pid=1#pid1" title="Season 2022"><?= '#'.$i ?></a></strong>
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
                    <a href="#">
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
