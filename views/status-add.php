<?php

if ($_POST['r'] == 'status-add' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
	#verificar si tiene privilegios de administrador y muestra formulario
	print(
'<div class="text-center">
	<form id="form" novalidate data-abide action="" method="POST">
  		<div class="translucent-form-overlay">
<div data-abide-error class="alert callout error-container" 
style="display: none;">
        <p><i class="fi-alert"></i>Por favor llena los campos</p>
    </div>
    <div class="small-12">
      <label><i class"fi-plus"></i>Agregar Status
        <input type="text" name="status" placeholder="Ingrese nuevo status" required>
        <span class="form-error">
          Campo requerido
        </span>
      </label>
    </div>
    <button type="submit" class="alert button expanded">
      Enviar
    </button>
    <input type="hidden" name="r" value="status-add">
    <input type="hidden" name="crud" value="set">


  </div>
</form>
</div>');
}elseif ($_POST['r'] == 'status-add' && $_SESSION['role']== 'Admin' && $_POST['crud']=='set') {
	# vamos a programar la insercion en la base de datos
	$status_controller=new StatusController();
	$new_status=array(
		'status_id'=>0,
		'status'=> $_POST['status']
	);
	$status=$status_controller->set($new_status);
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
