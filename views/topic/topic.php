<?php getHeader($data); getNav($data); ?>
  <main>
    <h1>Vista de los temas </h1>
    <p><?= $data['contenido']; ?></p>
  </main>
<?php getFooter($data);?>