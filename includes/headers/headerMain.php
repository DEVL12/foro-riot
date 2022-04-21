<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="icon" href="<?=base_url()?>assets/images/riot.png">
    <title><?= $data['title']; ?></title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/css/bootstrap.min.css" integrity="sha384-rwoIResjU2yc3z8GV/NPeZWAv56rSmLldC3R/AZzGRnGxQQKnKkoFVhFQhNUwEyJ" crossorigin="anonymous">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Rubik:400,400i,500,500i,700,700i" rel="stylesheet">
    <link href="<?= base_url() ?>assets/css/theme.css" rel="stylesheet">
    <!-- Begin tracking codes here, including ShareThis/Analytics -->
    <!-- End tracking codes here, including ShareThis/Analytics -->
  </head>
<body class="layout-default">
  <!-- Begin Menu Navigation
================================================== -->
  <header class="navbar navbar-toggleable-md navbar-dark bg-black fixed-top mediumnavigation">
    <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarsWow" aria-controls="navbarsWow" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="container">
      <!-- Begin Logo -->
      <a class="navbar-brand" href="<?= base_url() ?>">
        <img src="<?= base_url() ?>assets/images/logo1.png" alt="Affiliates - Free Bootstrap Template">
      </a>
      <!-- End Logo -->
      <!-- Begin Menu -->
      <div class="collapse navbar-collapse" id="navbarsWow">
        <?php getNav($data); ?>
      </div>
    </div>
  </header>
  <!-- End Menu Navigation
================================================== -->
