<?php getHeader($data, "headerMain"); ?>
<div class="site-content">

  <section class="intro">
    <div class="wrapintro">
      <h1>BIENVENIDO A</h1>
      <h2 class="lead">Los foros de Riot Games, para mas información de los foros lee nuestra guia de uso</h2>
      <a  href="<?= base_url()?>home/guide" class="btn">Guia de Uso</a>
    </div>
  </section>

  <div class="container">
    <div class="main-content">
      <section class="featured-posts">
        <div class="section-title">
          <h2><span>Recomendaciones</span></h2>
        </div>
        <div class="row listfeaturedtag">
          <!-- begin post -->
          <div class="col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-md-5 wrapthumbnail">
                  <a href="<?= base_url() ?>discussion">
                    <div class="thumbnail" style="background-image:url(<?= base_url() ?>assets/images/1.jpg);">
                    </div>
                  </a>
                </div>
                <div class="col-md-7">
                  <div class="card-block">
                    <h2 class="card-title"><a href="<?= base_url() ?>discussion">Aquí estamos para divertirnos</a></h2>
                    <h4 class="card-text">Es un juego el cual posee como objetivo principal divertirse y pasarla bien, ssaber que no siempre se gana y aprender de las derrotas.</h4>
                    <div class="metafooter">
                      <div class="wrapfooter">
                        <span class="meta-footer-thumb">
                          <img class="author-thumb" src="<?= base_url() ?>assets/images/user.png" alt="Douglas Torrealba">
                        </span>
                        <span class="author-meta">
                          <span class="post-name"><a href="#!">Douglas Torrealba</a></span><br />
                          <span class="post-date">22 Marzo 2022</span>
                        </span>

                        <div class="clearfix">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end post -->
          <!-- begin post -->
          <div class="col-sm-6">
            <div class="card">
              <div class="row">
                <div class="col-md-5 wrapthumbnail">
                  <a href="<?= base_url() ?>discussion">
                    <div class="thumbnail" style="background-image:url(<?= base_url() ?>assets/images/4.jpg);">
                    </div>
                  </a>
                </div>
                <div class="col-md-7">
                  <div class="card-block">
                    <h2 class="card-title"><a href="<?= base_url() ?>discussion">Más alla de los videojuegos</a></h2>
                    <h4 class="card-text">Es notorio que Riot como empresa siempre nos da a los fanaticos de que hablar pero, tomemos en cuenta los valores que nos deja sus videojuegos y sus animaciones. </h4>
                    <div class="metafooter">
                      <div class="wrapfooter">
                        <span class="meta-footer-thumb">
                          <img class="author-thumb" src="<?= base_url() ?>assets/images/user.png" alt="Jose Pérez">
                        </span>
                        <span class="author-meta">
                          <span class="post-name"><a  href="#!">Jose Pérez</a></span><br />
                          <span class="post-date">22 Marzo 2022</span>
                        </span>

                        <div class="clearfix">
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- end post -->
        </div>
      </section>
      <!-- Posts Index
        ================================================== -->
      <section class="recent-posts row">
        <div class="col-sm-4">
          <div class="sidebar">
            <div class="sidebar-section">
              <h5><span>Consejos</span></h5>
              <ul style="list-style: none;">
                <li><a>Ser de mente abierta</a></li>
                <li><a>Ayudar aquellos jugadores nuevos</a></li>
                <li><a>Aportar datos interesantes</a></li>
                <li><a>Reportar errores</a></li>
                <li><a>Denunciar aquellos toxicos</a></li>
              </ul>
            </div>
            <div class="sidebar-section">
              <h5><span>Eventos</span></h5>
              <a title="Proximamente...">Proximamente...</a>
            </div>
          </div>
        </div>
        <div class="col-sm-8">
          <div class="section-title">
            <h2><span>All Stories</span></h2>
          </div>
          <div class="masonrygrid row listrecent">
            <!-- begin post -->
            <div class="col-md-6 grid-item">
              <div class="card">
                <a href="<?= base_url() ?>discussion">
                  <img class="img-fluid" src="<?= base_url() ?>assets/images/3.jpg" alt="Tree of Codes">
                </a>
                <div class="card-block">
                  <h2 class="card-title"><a href="<?= base_url() ?>discussion">Season 2022 League of Legends</a></h2>
                  <h4 class="card-text">Esta temporara 2022 trae nuevos eventos y muchas sorpresas de parte del equipo de Riot en especial para juegos como league o legends y Valorant</h4>
                  <div class="metafooter">
                    <div class="wrapfooter">
                      <span class="meta-footer-thumb">
                        <img class="author-thumb" src="<?= base_url() ?>assets/images/user.png" alt="Douglas Torrealba">
                      </span>
                      <span class="author-meta">
                        <span class="post-name"><a  href="#!">Douglas Torrealba</a></span><br />
                        <span class="post-date">22 Marzo 2022</span>
                      </span>
                      <div class="clearfix">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end post -->
            <!-- begin post -->
            <div class="col-md-6 grid-item">
              <div class="card">
                <a href="<?= base_url() ?>discussion">
                  <img class="img-fluid" src="<?= base_url() ?>assets/images/2.jpg" alt="Red Riding Hood">
                </a>
                <div class="card-block">
                  <h2 class="card-title"><a href="<?= base_url() ?>discussion">Campeonatos de Valorant</a></h2>
                  <h4 class="card-text">Cada vez son más los campeonatos de este juego los cuales buscan siempre ser el mejor pero eso está por verse en el nuevo camponato de LATAM de valorant</h4>
                  <div class="metafooter">
                    <div class="wrapfooter">
                      <span class="meta-footer-thumb">
                        <img class="author-thumb" src="<?= base_url() ?>assets/images/user.png" alt="José Díaz">
                      </span>
                      <span class="author-meta">
                        <span class="post-name"><a  href="#!">José Díaz </a></span><br />
                        <span class="post-date">22 Marzo 2022</span>
                      </span>
                      <div class="clearfix">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end post -->
            <!-- begin post -->
            <div class="col-md-6 grid-item">
              <div class="card">
                <a href="<?= base_url() ?>discussion"">
                  <img class="img-fluid" src="<?= base_url() ?>assets/images/5.jpg" alt="Is Intelligence Enough">
                </a>
                <div class="card-block">
                  <h2 class="card-title"><a href="<?= base_url() ?>discussion">Nuevos Personajes para Legends of Runaterra</a></h2>
                  <h4 class="card-text">Para esta temporada de Legends of Runaterra vendran nuevos campeones y mejoras en cartas desbalanceadas. Esperemos lo mejor de parte de Riot. </h4>
                  <div class="metafooter">
                    <div class="wrapfooter">
                      <span class="meta-footer-thumb">
                        <img class="author-thumb" src="<?= base_url() ?>assets/images/user.png" alt="Richellys Castillo">
                      </span>
                      <span class="author-meta">
                        <span class="post-name"><a href="#!">Richellys Castillo</a></span><br />
                        <span class="post-date">22 Marzo 2022</span>
                      </span>
                      <div class="clearfix">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end post -->
            <!-- begin post -->
            <div class="col-md-6 grid-item">
              <div class="card">
                <a href="<?= base_url() ?>discussion">
                  <img class="img-fluid" src="<?= base_url() ?>assets/images/6.jpg" alt="Markdown Example">
                </a>
                <div class="card-block">
                  <h2 class="card-title"><a href="<?= base_url() ?>discussion">Futuras Producciones Audiovisuales</a></h2>
                  <h4 class="card-text">Con el rotundo exito de Arcane se estima nuevas producciones en cuanto a Valorant hablamos ya que estas historias poseen un buen desarrollo.</h4>
                  <div class="metafooter">
                    <div class="wrapfooter">
                      <span class="meta-footer-thumb">
                        <img class="author-thumb" src="<?= base_url() ?>assets/images/user.png" alt="Gabriel Silva">
                      </span>
                      <span class="author-meta">
                        <span class="post-name"><a  href="#!">Gabriel Silva</a></span><br />
                        <span class="post-date">22 Marzo 2022</span>
                      </span>
                      <div class="clearfix">
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <!-- end post -->
          </div>
          <!-- Pagination -->
          <div class="bottompagination">
            <div class="navigation">
              <nav class="pagination">
                <span class="page-number"> &nbsp; &nbsp; Pagina 1 de 1 &nbsp; &nbsp; </span>
              </nav>
            </div>
          </div>
        </div>
      </section>
    </div>
  </div>
  <!-- /.container -->
  <!-- Before Footer
    ================================================== -->
  <div class="beforefooter">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-8">
          <h3>Que esperas para compartir estos foros llenos de información valiosa</h3>
          <p>
            Comparte en <span>tus redes sociales favoritas</span>, Bienvenido a todos y todas!
          </p>
        </div>
        <div class="col-md-4 text-right footersocial">
          <h5>Contacta con Nosotros</h5>
          <i class="fa fa-facebook"></i>
          <i class="fa fa-twitter"></i>
          <i class="fa fa-google"></i>
          <i class="fa fa-pinterest"></i>
          <i class="fa fa-github"></i>
        </div>
      </div>
    </div>
  </div>
  <?php getFooter($data, "footerMain");?>
