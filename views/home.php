<?php

$template='
<div class="row">
<div class="small-12 text-center">
<h2>Hola %s, BIenvenido a Veflix</h2>
<h3>Tus peliculas y series favoritas</3>
<h4>%s<h4>
<p>Tu email es %s <p>
<p>Tu cumpleaños es %s <p>
<p>Tu Perfil de usuario es %s <p>
</div>
</div>
';

printf
(
$template,
$_SESSION['user'],
$_SESSION['name'],
$_SESSION['email'],
$_SESSION['birthday'],
$_SESSION['role']);
?>

