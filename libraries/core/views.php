<?php
  class views
  {
    function getViews($controller, $views, $data="")
    {
      $controller = get_class($controller);
      if($controller == "home")
      {
        $views = "views/".$views.".php";
      }
      else
      {
        $views = "views/".$controller."/".$views.".php";
      }

      require_once($views);
    }
  }
?>
