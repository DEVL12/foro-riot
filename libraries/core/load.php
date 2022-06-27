<?php
  $controllerFile = "controllers/".$controller.".php";
  require_once('controllers/block.php');
  session_start();

  if(file_exists($controllerFile)) {
    require_once($controllerFile);
    $controller = new $controller();

    (method_exists($controller,$method))
      ? $controller->{$method}($params)
      : require_once("controllers/errors.php");

  } else {
    require_once("controllers/errors.php");
  }
?>
