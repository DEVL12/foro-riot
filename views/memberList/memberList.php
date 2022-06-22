<?php getHeader($data, "headerForos"); ?>
  <div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <strong>Foro Riot Games</strong>
      <span class="nav-spacer">&rsaquo;</span>
      <strong class="active">Lista de miembros</strong>
    </div>
    <br/>

    <center>
      <h1> Lista de miembros </h1>
      <div class="white_bg radiused box_shadowed" style="display:inline-block;padding:10px;">
        <form id = "formMemberList">
          <input type="submit" class="button" name="submit" value="Buscar" style="padding:6.5px 15px;float:right;margin-top:4px;margin-left:8px;" />
          <input type="text" class="textbox memberlist_search_width" name="username" id="username" style="width: 500px; margin-top: 4px;" value="" />
        </form>
      </div>
      <br><br>

      <?php for($i = 1; $i <= 20; $i++) { ?>
      <div class="radiused box_shadowed white_bg memberlist_card">
        <center>
          <div class="profile_background" style="background-image: url(<?= base_url() ?>assets/images/default_avatar.png);height:90px;filter: blur(40px);"></div>

          <div class="memberlist_card_content">
            <img src="<?= base_url() ?>assets/images/default_avatar.png" alt="" class="rounded-avatar avatar_white_border_transparent avatar_shadow" style="border-width:8px;width:100px;height:100px;" />
            <br>
            <h1>
              <a href="<?= base_url()?>player/profile/talUsuario"><span style="color: green;"><strong><em>Persona <?= $i ?></em></strong></span></a>
            </h1>

            <div class="smalltext" style="margin-bottom:5px;">Administrator</div>

            <div class="memberlist_stat_box_wrap">
              <a href="<?= base_url() ?>answer" class="stat_box_href">
                <div class="profile-stat-boxes">
                  <h2>2</h2>
                  <span class="smalltext">Posts</span>
                </div>
              </a>

              <a href="<?= base_url() ?>answer" class="stat_box_href">
                <div class="profile-stat-boxes">
                  <h2>2</h2>
                  <span class="smalltext">Threads</span>
                </div>
              </a>

              <a href="#!" class="stat_box_href">
                <div class="profile-stat-boxes">
                  <h2>0</h2>
                  <span class="smalltext">Rating</span>
                </div>
              </a>
            </div>
            <br>

            <div class="border_sep"></div>
            <small class="light_text">Visited 03-31-2022, 01:03 AM</b></small>
          </div>
        </center>
      </div>
      <?php } ?>
    </center>
  </div>
</div>
<br>
<?php getFooter($data, "footerForos"); ?>
