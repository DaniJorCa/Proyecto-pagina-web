<form method="POST" class="row form-control-sm justify-content-center" action="main.php?view=_registro_min">
    <h2 class="display-4 text-center">Date de alta</h2>
    <h2 class="display-6 text-center">Y empieza a comprar</h2>
    <p class="text-center text-danger m-0"><?php echo (isset($_GET['dni']) && $_GET['dni'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
    <p class="text-center text-danger m-0"><?php echo (isset($_GET['dni']) && $_GET['dni'] == 'already-exist') ? "El DNI ya esta registrado" : ''; ?></p>
    <p class="text-center text-danger m-0"><?php echo (isset($_GET['dni']) && $_GET['dni'] == 'incorrect') ? "El DNI debe de ser formato 8 números y 1 letra" : ''; ?></p>
    <div class="mb-3 col-5 ">
      <label for="input-dni" class="form-label">DNI</label>
      <input name="dni" type="text" class="form-control form-control-sm" id="input-dni">
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
      <p class="text-center text-danger m-0"><?php echo (isset($_GET['email']) && $_GET['email'] == 'err') ? "Campo Obligatorio" : ''; ?></p>
      <p class="text-center text-danger m-0"><?php echo (isset($_GET['email']) && $_GET['email'] == 'incorrect') ? "Campo Obligatorio" : ''; ?></p>
      <div class="mb-3 col-5">
        <label for="input-email" class="form-label">Email</label>
        <input name="email" type="text" class="form-control form-control-sm" id="input-email" aria-describedby="emailHelp">
        <div id="emailHelp" class="form-text">No compartimos correos a terceros.</div>
      </div>
        
    <div class="mb-3 form-check col-12 justify-content-center">
      <input type="checkbox" class="form-check-input" id="check-terminos">
      <label class="form-check-label" for="exampleCheck1">Acepto los terminos y condiciones</label>
    </div>
    <button type="submit" class="btn btn-primary col-5">Submit</button>
  </form>