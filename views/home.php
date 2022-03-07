<?php getHeader($data); getNav($data); ?>
  <main>
    <h1>Datos extraidos de la tabla "TEMAS Y MOSTRADO EN LA VISTA HOME"</h1>
    <ol>
    <?php
      for($i = 0; $i < count($data['temas']); $i++)
      {
        echo "<li>";
        dep($data['temas'][$i]); // el dep es una funcion creada en helpers que nos servira para observar los arreglos de manera mas detallada
        echo "</li>";
      }
      ?>
    </ol>
  </main>
<?php getFooter($data);?>

