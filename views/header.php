<!doctype html>
<html class="no-js" lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="x-ua-compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Veflix</title>
        <meta name="description" content="Bienvenidos a veflix,
        tus peliculas y series favoritas.">
        <link rel="shortcut icon" href="./public/img/veflix.png" type="image/x-icon"/>
        <link rel="stylesheet" href="./public/icons/foundation-icons.css">
        <link rel="stylesheet" href="./public/css/foundation-flex.css">
        <link rel="stylesheet" href="./public/css/veflix.css">
    </head>
<body>
  <header>
    <!-- Menu -->
<?php if ($_SESSION['ok']){ ?>
    <div id="header-container" class="row align-middle">
      <div class="small-12 large-4">
        <h1 class="text-center">VEFLIX</h1>
      </div>
      <div class="large-8">
        <ul class="menu medium-text-right">
          <li><a href="./">Inicio</a></li>
          <li><a href="movieseries">MovieSeries</a></li>
          <li><a href="users">Usuarios</a></li>
          <li><a href="status">status</a></li>
          <li><a href="index.php?r=salir">Salir</a></li>
        </ul>
      </div>
  </header>
    <!-- /menu -->
<?php }
else { ?>
  <div id="header-container" class="row align-middle">
    <div class="small-12">
      <h1 class="text-center">VEFLIX</h1>
  </div>
<?php };
?>
</div>
<div class="row align-center">