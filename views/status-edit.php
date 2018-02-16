<?php
  $status_controller=new StatusController();

if ($_POST['r'] == 'status-edit' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
  #verificar si tiene privilegios de administrador y muestra formulario
  $status=$status_controller->get($_POST['status_id']);
  if (empty($status)) {
    $template=
'<div data-closable class="alert-box callout info small-6">
  <i class="fi fi-check"></i>No existe el status %s solicitado
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
    $template='<div class="text-center">
  <form id="form" novalidate data-abide action="" method="POST">
      <div class="translucent-form-overlay">
<div data-abide-error class="alert callout error-container" 
style="display: none;">
        <p><i class="fi-alert"></i>Por favor llena los campos</p>
    </div>
    <div class="small-12">
      <label><i class"fi-plus"></i>Editar Status
        <input type="text" disabled placeholder="status_id" value="%s" required>
      </label>
    <input type="hidden" name="status_id" placeholder="status" value="%s" required>
    </div>
    <div class="small-12">
        <input type="text" name="status" placeholder="status" value="%s" required>
    </div>

   
    <button type="submit" class="alert button expanded" value="editar">
      Editar
    </button>
    <input type="hidden" name="r" value="status-edit">
    <input type="hidden" name="crud" value="set">
  </div>
</form>
</div>';
printf($template,
      $status[0]['status_id'],
      $status[0]['status_id'],
      $status[0]['status']);
  }
}elseif ($_POST['r'] == 'status-edit' && $_SESSION['role']== 'Admin' && $_POST['crud']=='set') {
  # vamos a programar la insercion en la base de datos
  $save_status=array(
    'status_id'=> $_POST['status_id'],
    'status'=> $_POST['status']
  );
  $status=$status_controller->set($save_status);
  $template='<div data-closable class="alert-box callout success small-6">
  <i class="fi fi-check"></i>Guardado Exitoso!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
  printf($template,$_POST['status']);
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
