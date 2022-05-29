<?php
  function base_url() // retorna la base de la url
  {
    return BASE_URL;
  }

  function dep($data) //sirve para depurar los arreglos es util con los metodos POST
  {
    $format = print_r('<pre>');
    $format .= print_r($data);
    $format .= print_r('</pre>');
    return $format;
  }

  function strClean($strCadena)
  {
    $string = preg_replace(['/\s+/', '/^\s|\s$/'], [' ', ""], $strCadena);
    $string = trim($string);
    $string = stripslashes($string);
    $string = str_ireplace("<scrip>", "", $string);
    $string = str_ireplace("</scrip>", "", $string);
    $string = str_ireplace("<scrip src>", "", $string);
    $string = str_ireplace("<scrip type>", "", $string);
    $string = str_ireplace("SELECT * FROM", "", $string);
    $string = str_ireplace("DELETE FROM", "", $string);
    $string = str_ireplace("INSERT INTO", "", $string);
    $string = str_ireplace("SELECT COUNT(*) FROM", "", $string);
    $string = str_ireplace("DROP TABLE", "", $string);
    $string = str_ireplace("OR '1' = '1'", "", $string);
    $string = str_ireplace('OR "1" = "1"', "", $string);
    $string = str_ireplace('OR ´1´ = ´1´', "", $string);
    $string = str_ireplace("is NULL; --", "", $string);
    $string = str_ireplace("is NULL; --", "", $string);
    $string = str_ireplace("LIKE '", "", $string);
    $string = str_ireplace('LIKE "', "", $string);
    $string = str_ireplace("LIKE ´", "", $string);
    $string = str_ireplace("OR 'a' = 'a'", "", $string);
    $string = str_ireplace('OR "a" = "a', "", $string);
    $string = str_ireplace("OR ´a´ = ´a", "", $string);
    $string = str_ireplace("OR ´a´ = ´a", "", $string);
    $string = str_ireplace("--", "", $string);
    $string = str_ireplace("^", "", $string);
    $string = str_ireplace("[", "", $string);
    $string = str_ireplace("]", "", $string);
    $string = str_ireplace("==", "", $string);
    $string = str_ireplace("=", "", $string);
    return $string;
  }

  function getHeader($data = "", $document)
  {
    $include = "";
    switch($document) {
      case 'headerMain'    : $include = "includes/headers/headerMain.php"; break;
      case 'headerSession' : $include = "includes/headers/headerSession.php"; break;
      case 'headerForos'   : $include = "includes/headers/headerForos.php"; break;
    }
    require_once($include);
  }

  function getNav($data = "", $document)
  {
    $include = "";
    switch($document) {
      case 'navMain' : $include = "includes/navs/navMain.php"; break;
      case 'navForos': $include = "includes/navs/navForos.php"; break;
    }
    require_once($include);
  }

  function getFooter($data = "", $document)
  {
    $include = "";
    switch($document) {
      case 'footerMain' : $include = "includes/footers/footerMain.php"; break;
      case 'footerForos': $include = "includes/footers/footerForos.php"; break;
    }
    require_once($include);
  }
?>
