<?php 
$status_controller=new StatusController();
$status=$status_controller->get();
if (empty($status)) {
# si la tabla status esta vacia
	print('
	<div data-abide-error class="alert callout error-container">
    <p><i class="fi-alert"></i>No hay Status</p>
	</div>');
} else {
	$template_status='
	<div class="small-12 medium-6">
	<h2 class="text-center">Gestion de status</h2>
	<table class="responsive-card-table unstriped">
	  <thead>
	    <tr>
	      <th>Status_id</th>
	      <th>Status</th>
	      <th colspan="2">
	      	<form action="" method="POST">
				<input type="hidden" name="r" value="status-add">
				<input type="submit" class="button" value="agregar"> 
	      	</form>
	      </th>
	    </tr>
	  </thead>
			<tbody>';
	  for ($n=0; $n < count($status) ; $n++) { 
	  	$template_status.=
	    '<tr>
	      <td data-label="Status_id">'.$status[$n]['status_id'].'</td>
	      <td data-label="Status">'.$status[$n]['status'].'</td>
	      <td>
	      	<form action="" method="POST">
				<input type="hidden" name="r" value="status-edit">
				<input type="hidden" name="status_id" value="'.$status[$n]['status_id'].'">
				<input type="submit" class="button" value="Editar"> 
	      	</form>
	      </td>
	      <td>
	      	<form action="" method="POST">
				<input type="hidden" name="r" value="status-del">
				<input type="hidden" name="status_id" value="'.$status[$n]['status_id'].'">
				<input type="submit" class="button alert" value="ELiminar"> 
	      	</form>
	      </td>

	    </tr>'; 
	  }
	  $template_status .= '
	  		</tbody>
		</table>
		</div>';
	print($template_status);
}
