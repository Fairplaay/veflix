<?php 
$user_controller=new UserController();
$users = $user_controller->get();
if (empty($users)) {
# si la tabla users esta vacia
	print('
	<div data-abide-error class="alert callout error-container">
    <p><i class="fi-alert"></i>No hay Usuarios para mostrar</p>
	</div>');
} else {
	$template_user='
	<h2 class="text-center">Gestion de Usuarios</h2>
	<div class="row align-left">
	<div class="small-12">
	<table id="tabla" class="responsive-card-table stack">
	  <thead>
	    <tr>
	      <th>Usuario</th>
	      <th>Correo</th>
	      <th>Nombre</th>
	      <th>Cumpleaños</th>
	      <th>Role</th>
	      <th colspan="2">
	      	<form action="" method="POST">
				<input type="hidden" name="r" value="user-add">
				<input type="submit" class="button" value="agregar"> 
	      	</form>
	      </th>
	    </tr>
	  </thead>
			<tbody>';
	  for ($n=0; $n < count($users) ; $n++) { 
	  	$template_user.=
	    '<tr>
	      <td data-label="user">'.$users[$n]['user'].'</td>
	      <td data-label="email">'.$users[$n]['email'].'</td>
	      <td data-label="name">'.$users[$n]['name'].'</td>
	      <td data-label="birthday">'.$users[$n]['birthday'].'</td>
	      <td data-label="role">'.$users[$n]['role'].'</td>
	      <td>
	      	<form action="" method="POST">
				<input type="hidden" name="r" value="user-edit">
				<input type="hidden" name="user" value="'.$users[$n]['user'].'">
				<input type="submit" class="button" value="Editar"> 
	      	</form>
	      </td>
	      <td>
	      	<form action="" method="POST">
				<input type="hidden" name="r" value="user-del">
				<input type="hidden" name="user" value="'.$users[$n]['user'].'">
				<input type="submit" class="button alert" value="Eliminar"> 
	      	</form>
	      </td>

	    </tr>'; 
	  }
	  $template_user .= '
	  		</tbody>
		</table>
		</div>
		</div>';
	print($template_user);
}
	#      <td data-label="pass">'.$users[$n]['pass'].'</td>
	     # <th>Contraseña</th>
