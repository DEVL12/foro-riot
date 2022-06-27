<?php
  session_start();
  $controllerFile = "controllers/".$controller.".php";

  if(file_exists($controllerFile)) {
    require_once($controllerFile);
    require_once('controllers/block.php');

    $check_bans = new block();
    $check_bans->Check_bans();
    $controller = new $controller();

    (method_exists($controller,$method))
      ? $controller->{$method}($params)
      : require_once("controllers/errors.php");

  } else {
    require_once("controllers/errors.php");
  }
?>
