<?php
  $user_controller=new UserController();

if ($_POST['r'] == 'user-edit' && $_SESSION['role'] == 'Admin' && !isset($_POST['crud'])) {
  #verificar si tiene privilegios de administrador y muestra formulario
  $user=$user_controller->get($_POST['user']);
  if (empty($user)) {
    $template=
'<div data-closable class="alert-box callout info small-6">
  <i class="fi fi-check"></i>No existe el usuario %s solicitado
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
    $role_admin=($user[0]['role']=='Admin')? 'checked' : '';
    $role_user=($user[0]['role']=='User')? 'checked' : '';
    $template='<div class="text-center">
    <h3>Editar usuario</h3>
  <form id="form" novalidate data-abide action="" method="POST">
      <div class="translucent-form-overlay">
<div data-abide-error class="alert callout error-container" 
style="display: none;">
        <p><i class="fi-alert"></i>Por favor llena los campos</p>
    </div>
    <div class="small-12">
      <label><i class"fi-plus"></i>Alias
        <input type="text" disabled placeholder="usuario" value="%s" required>
      </label>
    <input type="hidden" name="user" placeholder="user" value="%s" required>
    </div>
    <div class="small-12">
        <input type="email" name="email" placeholder="Tu@correo.com" value="%s" required>
    </div>
    <div class="small-12">
        <input type="text" name="name" placeholder="Nombre" value="%s" required>
    </div>
    <div class="small-12">
        <input type="text" name="birthday" placeholder="Cumpleaños" value="%s" required>
    </div>
    <div class="small-12">
        <input type="password" name="pass" placeholder="Contraseña" value="" required>
    </div>
      <label><i class"fi-plus"></i>Role:
        <input type="radio" name="role" value="User" id="usuario" %s required><label for="usuario">User</label>

        <input type="radio" name="role" value="Admin" id="admin" %s required><label for="admin">Admin</label>

        <span class="form-error">
          Campo requerido
        </span>
      </label>

   
    <button type="submit" class="alert button expanded" value="editar">
      Editar
    </button>
    <input type="hidden" name="r" value="user-edit">
    <input type="hidden" name="crud" value="set">
  </div>
</form>
</div>';
printf($template,
      $user[0]['user'],
      $user[0]['user'],
      $user[0]['email'],
      $user[0]['name'],
      $user[0]['birthday'],
      $role_user,
      $role_admin);
  }
}elseif ($_POST['r'] == 'user-edit' && $_SESSION['role']== 'Admin' && $_POST['crud']=='set') {
  # vamos a programar la insercion en la base de datos
  $save_user=array(
    'user'    => $_POST['user'],
    'email'   => $_POST['email'],
    'name'    => $_POST['name'],
    'birthday'=>$_POST['birthday'],
    'pass'    => $_POST['pass'],
    'role'    => $_POST['role']
  );
  $user=$user_controller->set($save_user);
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
