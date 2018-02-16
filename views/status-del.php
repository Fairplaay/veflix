<?php
  $status_controller=new StatusController();

if ($_POST['r'] == 'status-del' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
  #verificar si tiene privilegios de administrador y muestra formulario
  $status=$status_controller->get($_POST['status_id']);
  if (empty($status)) {
    $template=
'<div data-closable class="alert-box callout info small-6">
  <i class="fi fi-check"></i>No existe el status %s
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>
<script>
  window.onload = function () {
  reloadPage("status");
}
</script>';
printf($template, $_POST['status_id']);
  }else{
    $template='
<h2 class="small-12 text-center">Eliminar status <b>%s</b></h2>
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
      <input type="hidden" name="status_id" value="%s">
      <input type="hidden" name="r" value="status-del">
      <input type="hidden" name="crud" value="del">
    </div>
  </form>
</div>';
printf($template,
      $status[0]['status'],
      $status[0]['status_id']);
  }
}elseif ($_POST['r'] == 'status-del' && $_SESSION['role']== 'Admin' && $_POST['crud']=='del') {
  # vamos a programar la insercion en la base de datos
  $status=$status_controller->del($_POST['status_id']);
  $template='<div data-abide-error class="alert callout error-container">
        <p><i class="fi-alert"></i>Eliminado</p>
    </div>';
printf($template);
print('
<script>
  window.onload = function () {
  reloadPage("status");
}
</script>');

}else{
  #para generar vista de no autorizado
  $controlador=new viewController();
  $controlador->loadView('error401');
}
?>
