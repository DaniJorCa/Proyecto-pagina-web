<form method="POST" class="row form-control-sm" action="index.php?view=_registro">
    <h2 class="display-4 text-center">Formulario Registro</h2>
    <p class="text-center text-danger m-0"><?php echo (isset($_GET['dni']) && $_GET['dni'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
    <p class="text-center text-danger m-0"><?php echo (isset($_GET['dni']) && $_GET['dni'] == 'already-exist') ? "El DNI ya esta registrado" : ''; ?></p>
    <p class="text-center text-danger m-0"><?php echo (isset($_GET['dni']) && $_GET['dni'] == 'incorrect') ? "El DNI debe de ser formato 8 números y 1 letra" : ''; ?></p>
    <div class="mb-3 col-5 ">
      <label for="input-dni" class="form-label">DNI</label>
      <input name="dni" type="text" class="form-control form-control-sm" id="input-dni" value=>
    </div>
    <p class="text-center text-danger m-0"><?php echo (isset($_GET['password']) && $_GET['password'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
    <div class="mb-3 col-5">
      <label for="input-password" class="form-label">Password</label>
      <input name="password" type="password" class="form-control form-control-sm" id="input-password">
    </div>
    <p class="text-center text-danger m-0"><?php echo (isset($_GET['nombre']) && $_GET['nombre'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
    <div class="mb-3 col-5">
        <label for="input-nombre" class="form-label">Nombre</label>
        <input name="nombre" type="text" class="form-control form-control-sm" id="input-nombre">
      </div>
      <p class="text-center text-danger m-0"><?php echo (isset($_GET['primer_apellido']) && $_GET['primer_apellido'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
      <div class="mb-3 col-5">
        <label for="input-prim_apellido" class="form-label">Primer Apellido</label>
        <input name="primer_apellido" type="text" class="form-control form-control-sm" id="input-prim_apellido">
      </div>
      <p class="text-center text-danger m-0"><?php echo (isset($_GET['segundo_apellido']) && $_GET['segundo_apellido'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
      <div class="mb-3 col-5">
        <label for="input-seg_apellido" class="form-label">Segundo Apellido</label>
        <input name="segundo_apellido" type="text" class="form-control form-control-sm" id="input-seg_apellido">
      </div>
      <p class="text-center text-danger m-0"><?php echo (isset($_GET['direccion']) && $_GET['direccion'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
      <div class="mb-3 col-5">
        <label for="input-direccion" class="form-label">Dirección</label>
        <input name="direccion" type="text" class="form-control form-control-sm" id="input-direccion">
      </div>
      <p class="text-center text-danger m-0"><?php echo (isset($_GET['provincia']) && $_GET['provincia'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
      <div class="mb-3 col-5">
        <label for="input-provincia" class="form-label">Provincia</label>
        <input name="provincia" type="text" class="form-control form-control-sm" id="input-provincia">
      </div>
      <p class="text-center text-danger m-0"><?php echo (isset($_GET['poblacion']) && $_GET['poblacion'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
      <div class="mb-3 col-5">
        <label for="input-poblacion" class="form-label">Población</label>
        <input name="poblacion" type="text" class="form-control form-control-sm" id="input-poblacion">
      </div>
      <p class="text-center text-danger m-0"><?php echo (isset($_GET['cod_postal']) && $_GET['cod_postal'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
      <div class="mb-3 col-5">
        <label for="input-cod_postal" class="form-label">Código Postal</label>
        <input name="cod_postal" type="text" class="form-control form-control-sm" id="input-cod_postal">
      </div>
      <p class="text-center text-danger m-0"><?php echo (isset($_GET['telefono']) && $_GET['telefono'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
      <div class="mb-3 col-5">
        <label for="input-telefono" class="form-label">Teléfono</label>
        <input name="telefono" type="text" class="form-control form-control-sm" id="input-telefono">
      </div>
      <p class="text-center text-danger m-0"><?php echo (isset($_GET['email']) && $_GET['email'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
      <p class="text-center text-danger m-0"><?php echo (isset($_GET['email']) && $_GET['email'] == 'incorrect') ? "Campo Obligatorio" : ''; ?></p>
      <div class="mb-3 col-5">
        <label for="input-email" class="form-label">Email</label>
        <input name="email" type="text" class="form-control form-control-sm" id="input-email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">No compartimos correos a terceros.</div>
      </div>

<?php if(isset($_SESSION['perfil']) && $_SESSION['perfil'] === 'admin'){
    echo '<p class="text-center text-danger m-0">';
    echo (isset($_GET['perfil']) && $_GET['perfil'] == 'err') ? "Campo Obligatorio" : '';
    echo '</p>';
    echo '<div class="mb-3 col-5">';  
    echo '<label for="input-perfil" class="form-label">Perfil Usuario</label>';   
    echo '<input type="text" class="form-control form-control-sm" id="input-perfil">';    
    echo '</div>';
}
?>
        
    <div class="mb-3 form-check col-5">
      <input type="checkbox" class="form-check-input" id="check-terminos">
      <label class="form-check-label" for="exampleCheck1">Acepto los terminos y condiciones</label>
    </div>
    <button type="submit" class="btn btn-primary col-5">Submit</button>
  </form>