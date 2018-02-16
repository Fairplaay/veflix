<?php

if ($_POST['r'] == 'user-add' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
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
      <label><i class"fi-plus"></i>Alias:
        <input type="text" name="user" placeholder="Tu @alias" required>
        <span class="form-error">
          Campo requerido
        </span>
      </label>
      <label><i class"fi-plus"></i>Correo:
        <input type="email" name="email" placeholder="Tu@correo.com" required>
        <span class="form-error">
          Campo requerido
        </span>
      </label>
      <label><i class"fi-plus"></i>Nombre:
        <input type="text" name="name" placeholder="Tu nombre" required>
        <span class="form-error">
          Campo requerido
        </span>
      </label>
      <label><i class"fi-plus"></i>Cumpleaños:
        <input type="text" name="birthday" placeholder="Tu Cumpleaños" required>
        <span class="form-error">
          Campo requerido
        </span>
      </label>
      <label><i class"fi-plus"></i>Contraseña:
        <input type="password" name="pass" placeholder="Ingresa tu contraseña" required>
        <span class="form-error">
          Campo requerido
        </span>
      </label>
      <label><i class"fi-plus"></i>Role:
        <input type="radio" name="role" value="User" id="usuario" checked><label for="usuario">User</label>
        <input type="radio" name="role" value="Admin" id="admin"><label for="admin">Admin</label>
        <span class="form-error">
          Campo requerido
        </span>
      </label>

    </div>
    <button type="submit" class="alert button expanded">
      Enviar
    </button>
    <input type="hidden" name="r" value="user-add">
    <input type="hidden" name="crud" value="set">


  </div>
</form>
</div>');
}elseif ($_POST['r'] == 'user-add' && $_SESSION['role']== 'Admin' && $_POST['crud']=='set') {
	# vamos a programar la insercion en la base de datos
	$user_controller=new UserController();
	$new_user=array(
		'user'=> $_POST['user'],
		'email'=> $_POST['email'],
    'name' => $_POST['name'],
    'birthday' => $_POST['birthday'],
    'pass' => $_POST['pass'],
    'role' => $_POST['role']
	);
	$user=$user_controller->set($new_user);
	$template='<div data-closable class="alert-box callout success small-6">
  <i class="fi fi-check"></i>Guardado %s Exitoso!
  <button class="close-button" aria-label="Dismiss alert" type="button" data-close>
    <span aria-hidden="true">&CircleTimes;</span>
  </button>
</div>';
	printf($template,$_POST['user']);
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
