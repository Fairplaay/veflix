<?php
  $user_controller=new UserController();

if ($_POST['r'] == 'user-del' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
  #verificar si tiene privilegios de administrador y muestra formulario
  $user=$user_controller->get($_POST['user']);
  if (empty($user)) {
    $template=
'<div data-closable class="alert-box callout info small-6">
  <i class="fi fi-check"></i>No existe el Usuario %s
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>
<script>
  window.onload = function () {
  reloadPage("users");
}
</script>';
printf($template, $_POST['user']);
  }else{
    $template='
<h2 class="small-12 text-center">Eliminar Usuario <b>%s</b></h2>
<div class="text-center">
  <form id="form" novalidate data-abide action="" method="POST">
    <div class="small-12">
      </div>
      <button type="submit" class="alert button" value="SI">
        Eliminar 
      </button>
      <button type="button" class="primary button" value="NO" onclick="history.back()">
        Regresar
      </button>
      <input type="hidden" name="user" value="%s">
      <input type="hidden" name="r" value="user-del">
      <input type="hidden" name="crud" value="del">
    </div>
  </form>
</div>';
printf($template,
      $user[0]['user'],
      $user[0]['user']);
  }
}elseif ($_POST['r'] == 'user-del' && $_SESSION['role']== 'Admin' && $_POST['crud']=='del') {
  # vamos a programar la elminacion en la base de datos del usuario
  $user=$user_controller->del($_POST['user']);
  $template='<div data-abide-error class="alert callout error-container">
        <p><i class="fi-alert"></i>Eliminado</p>
    </div>';
printf($template);
print('
<script>
  window.onload = function () {
  reloadPage("users");
}
</script>');

}else{
  #para generar vista de no autorizado
  $controlador=new viewController();
  $controlador->loadView('error401');
}
?>
