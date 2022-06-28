 <!-- Begin Menu -->
 <ul class="navbar-nav ml-auto">
   <li class="nav-item">
     <a class="nav-link" href="<?= base_url() ?>">Inicio</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="<?= base_url() ?>discussion">Foros</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="<?= base_url()?>home/guide">Guia De Uso</a>
   </li>
   <li class="nav-item">
     <a class="nav-link" href="<?= base_url()?>home/aboutUs">Sobre Nosostros</a>
   </li>
   <?php if(!isset($_SESSION['islogin'])) { ?>
   <li class="nav-item">
     <a class="nav-link highlight" href="<?= base_url() ?>Session/register">Registrate</a>
   </li>
   <li class="nav-item">
     <a class="nav-link highlight" href="<?= base_url() ?>Session/login">Iniciar Sesión</a>
   </li>
   <?php } ?>
 </ul>
 <!-- End Menu -->
