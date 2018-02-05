<form novalidate data-abide action="" method="POST">
  <div class="translucent-form-overlay">
    
    <h3>Ingresar</h3>
<?php 
if(isset($_GET['error'])){ ?>
    <div small-12 data-abide-error class="alert callout error-container">
        <p><i class="fi-alert"></i><?php echo $_GET['error']; ?></p>
    </div>
  
<?php } 
?>

    <div data-abide-error class="alert callout error-container" style="display: none;">
        <p><i class="fi-alert"></i>Por favor llena los campos</p>
    </div>


    <div class="small-12">
      <label>Usuario
        <input type="text" name="user" placeholder="Usuario" required>
        <span class="form-error">
          Usuario es requerido
        </span>
      </label>
    </div>

    <div class="small-12">
      <label>Contraseña
        <input type="password" id="password" required name="pass">
        <span class="form-error">
          Es requerida la contraseña
        </span>
      </label>
      <p class="help-text">Entra tu contraseña por favor</p>
    </div>
    <button type="submit" class="alert button expanded">
      Enviar
    </button>

  </div>
</form>


  



