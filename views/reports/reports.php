<?php getHeader($data, "headerForos"); ?>

<div id="content">
  <div class="wrapper">
    <div class="navigation">
      <span style="font-weight:300">Navigation</span>: &nbsp;
      <span class="active">Foro Riot Games</span>
    </div>
    <br />

    <div id="welcomemsg" class="guestwelcomemsg">
      <h1>REPORTES </h1>
      <br><br>
    </div>

    <div class="forums" style="width: 100%;">
      <div class="tabs-wrap" style="background:none;">
        <ul class="tabs" style="margin-bottom:8px;">
          <li class="tab-link current" data-tab="tab-1">Reporte de discusiones</li>
          <li class="tab-link" data-tab="tab-2">Reporte de jugadores</li>
          <li class="tab-link" data-tab="tab-3">Reporte de Plataformas</li>
          <li class="tab-link" data-tab="tab-4">Reporte de temas</li>
          <li class="tab-link" data-tab="tab-5">Reporte de bloqueos</li>
          <li class="tab-link" data-tab="tab-6">Reporte de respuestas</li>
        </ul>

        <div id="tab-1" class="tab-content current radiused box_shadowed">
          <h2 style="margin-top:0px;">Informacion del usuario</h2>
          <div>
            <form action="<?= base_url() ?>reports/pdf_discussions" method="POST" target="_blank">
              <div class="row">
                <label>Generar reporte de Discusiones</label>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="min">Desde</label>
                    <input type="date" value="<?= date('Y-m-d'); ?>" name="desde" id="min">
                  </div>
                </div>
                <div class="col-md-3">
                  <div class="form-group">
                    <label for="min">Hasta</label>
                    <input type="date" value="<?= date('Y-m-d'); ?>" name="hasta" id="hasta">
                  </div>
                </div>

                <div class="col-md-3">
                  <div class="form-group">
                    <button type="submit" class="btn btn-danger">PDF Discusiones</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>

        <div id="tab-2" class="tab-content radiused box_shadowed">
          <form action="<?= base_url() ?>reports/pdf_player" method="POST" target="_blank">
            <div class="row">
              <label>Generar reporte de Jugadores</label>
              <div class="col-md-3">
                <div class="form-group">
                  <button type="submit" class="btn btn-danger">PDF Jugadores</button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div id="tab-3" class="tab-content radiused box_shadowed">
          <form action="<?= base_url() ?>reports/pdf_platforms" method="POST" target="_blank">
            <div class="row">
              <label>Generar reporte de Plataformas</label>
              <div class="col-md-3">
                <div class="form-group">
                  <button type="submit" class="btn btn-danger">PDF Plataformas</button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div id="tab-4" class="tab-content radiused box_shadowed">
          <form action="<?= base_url() ?>reports/pdf_Themes" method="POST" target="_blank">
            <div class="row">
              <label>Generar reporte de Temas</label>
              <div class="col-md-3">
                <div class="form-group">
                  <button type="submit" class="btn btn-danger">PDF Temas</button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div id="tab-5" class="tab-content radiused box_shadowed">
          <form action="<?= base_url() ?>reports/pdf_Bans" method="POST" target="_blank">
            <div class="row">
              <label>Generar reporte de Bloqueos</label>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="min">Desde</label>
                  <input type="date" value="<?= date('Y-m-d'); ?>" name="desde" id="min">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="min">Hasta</label>
                  <input type="date" value="<?= date('Y-m-d'); ?>" name="hasta" id="hasta">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <button type="submit" class="btn btn-danger">PDF Bloqueos</button>
                </div>
              </div>
            </div>
          </form>
        </div>

        <div id="tab-6" class="tab-content radiused box_shadowed">
          <form action="<?= base_url() ?>reports/pdf_answers" method="POST" target="_blank">
            <div class="row">
              <label>Generar reporte de Respuestas</label>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="min">Desde</label>
                  <input type="date" value="<?= date('Y-m-d'); ?>" name="desde" id="min">
                </div>
              </div>
              <div class="col-md-3">
                <div class="form-group">
                  <label for="min">Hasta</label>
                  <input type="date" value="<?= date('Y-m-d'); ?>" name="hasta" id="hasta">
                </div>
              </div>

              <div class="col-md-3">
                <div class="form-group">
                  <button type="submit" class="btn btn-danger">PDF Respuestas</button>
                </div>
              </div>
            </div>
          </form>
        </div>
      </div>
      <br />
    </div>

    <script src="<?= base_url() ?>assets/js/profileMenu.js"></script>
  </div>
</div>
<?php getFooter($data, "footerForos") ?>
