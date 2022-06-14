<?php getHeader($data, "headerForos"); ?>

<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <a href="<?= base_url() ?>">Foro Riot Games</a>
      <span class="nav-spacer">&rsaquo;</span>
      <span class="active">Administrador</span>
    </div>
    <br/>

    <a href="<?= base_url()?>admin/admin_delete_foro"> ELIMINAR FORO </a>

  </div>
</div>
<?php getFooter($data, "footerForos") ?>
