<!DOCTYPE html><!-- start: index -->
<html>

<head>
  <title><?= $data['title'] ?></title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/themes/theme5/global.css" />
  <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/themes/theme5/css3.css" />
  <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/themes/theme5/extra.css" />
  <link type="text/css" rel="stylesheet" href="<?= base_url() ?>assets/css/themes/theme5/responsive.css" />
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
  <link rel="icon" href="<?= base_url() ?>assets/images/riot.png">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Varela+Round&display=swap" rel="stylesheet">

  <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/jquery.plugins.min.js"></script>
  <script type="text/javascript" src="<?= base_url() ?>assets/js/general.js"></script>
  <script type="text/javascript"> var cookieSecureFlag = "0"; var use_xmlhttprequest = "1"; </script>
</head>

<body>
  <!-- start: header -->
  <div class="header_before_gradient"></div>
  <div id="container">
    <?php getNav($data, "navForos"); ?>
