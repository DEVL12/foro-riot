<?php getHeader($data, "headerMain"); ?>
<div class="site-content">
  <div class="container">
    <!-- Content
    ================================================== -->
    <div class="main-content">
      <section>
        <div class="section-title" style="text-align: center;">
          <h2><span style="font-size: 25px;">Bienvenidos a la guia de uso de los Foros de Riot Games</span></h2>
        </div>
        <div class="article-post">
          <p>
            <strong>Hola</strong> ¡Bienvenido al nuevo foro oficial de Riot Games! Este es el lugar 
            ideal para intercambiar ideas con la comunidad, hablar sobre mecánicas, esports, 
            cosplays, estrategias, pedir ayuda técnica si tenemos algún error y también un 
            lugar lleno de información oficial de todos los juegos de Riot Games.
          </p>
          <p>Acompáñame y te mostraré cómo funciona todo aquí en los nuevos foros:</p>
          <p>
              <div style="display: inline-flex;">
              <div>
            <strong>Antes que nada ¡Registrate en la página/Logueate en la página!</strong>
            ¿Como se hace esto? en la barra de navegación que se muestra en la parte superior de la 
            página, estan los botones: <a class="lnk" href="<?= base_url() ?>Session/register">Registrate</a> y 
            <a class="lnk" href="<?= base_url() ?>Session/login">Iniciar Sesión</a>, con que aparezcan estos dos
            quiere decir que no tienes tu sesión iniciada y sin esto no podras publicar, responder o
            puntuar discusiones.
        </div>
        <div>
            <img style="width: 1500px;" src = "<?=base_url()?>assets/images/reg-log.png" alt="affiliates free bootstrap template"/></div>
            </div>
          </p>
          <p>
            Entonces dandole click a esos botones nos llevara a una de las dos siguientes páginas
            <div style="display: inline-flex;">
            <div><img style="margin-left: 10px;" src="<?=base_url()?>assets/images/register.png" alt="Página de Registro">
            <p style="text-align: center;">Página de Registro</p>
            </div>
            <div><img style="margin-left: 20px;" src="<?=base_url()?>assets/images/login.png" alt="Página de Iniciar Sesion">
            <p style="text-align: center">Página de Iniciar Sesion</p>
            </div>
            </div>
          </p>
          <p>
            <div style="display: inline-flex;">
            <div>Luego de introducir tus datos e ingresar estaras en alguno de los foros de los juegos de Riot Games.
            <p><strong>Antes que nada: ¡busca antes de publicar!</strong></p>
            Simplemente debes hacer click en, "Comenzar un nuevo hilo", escojer en que foro de juego
            de Riot quieres publicarlo y listo ya puedes responder a lo que te respondan en tu discusion o
            responder a otras discusiones de jugadores, dandole click a la discusion que quieras observar.
            </div>
            <div><img src="<?=base_url()?>assets/images/foros.png" alt="foros">
            <p style="text-align: center">Página de las discusiones</p>
        </div>
        </div>
        <img src="<?=base_url()?>assets/images/discusiones.png" alt="discusiones">
        <p style="text-align: center">Discusiones</p>
        </p>
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

<?php getFooter($data, "footerMain"); ?>
