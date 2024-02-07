<?php
if(isset($_GET['info']) && $_GET['info'] === 'empty_fields'){
    echo "<h3 class='text-center' text-danger>Edicion no realizada</h3>";
    echo "<h3 class='text-center text-danger'>No se admiten campos vacios en el formulario</h3>";
}
?>
<h5 class="display-4 text-center">Tu perfil <?php echo $_SESSION['nombre_log'] ?></h5>
<h5 class="text-center mb-5">En este apartado puedes consultar y modificar tus datos personales</h5>

<form id="formulario_edit_datos_usuario" class="container-fluid" method="POST" action="index.php?view=_mod_datos_usuario">
    <div>
        
        <div class="row text-dark m-0 justify-content-center">
            <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 ">
                    <label for="exampleInputPassword1" class="form-label" >DNI</label>
                    <input name="dni_edit" type="text" class="editar_dni input-group-text" id="disabledTextInput" value= '<?php echo $_SESSION['dni_log']?>' readonly>
                </div>
                <div class="col-3 row align-items-center p-1">
                    <button class='editar_usuario btn btn-info' id="editar_dni"><i class="fa-solid fa-pen-to-square mx-2"></i>Editar</button>
                </div>
                </div>
                <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 ">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input name="email_edit" type="text" class="editar_email input-group-text" id="disabledTextInput" value= <?php echo $_SESSION['email_log'] ?>  readonly>
                </div>
                <div class="col-3 row align-items-center p-1r">
                    <button class='editar_usuario btn btn-info' id="editar_email"><i class="fa-solid fa-pen-to-square mx-2"></i>Editar</button>
                </div>
            </div>
        </div>
    
    
    
        <div class="row text-dark m-0 justify-content-center">
            <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8">
                    <label for="exampleInputEmail1" class="form-label">Nombre</label>
                    <input name="nombre_edit" type="text" class="editar_nombre input-group-text" id="disabledTextInput"  value= '<?php echo $_SESSION['nombre_log']?>'  readonly>
                </div>
                <div class="col-3 row align-items-center p-1">
                    <button class='editar_usuario btn btn-info' id="editar_nombre"><i class="fa-solid fa-pen-to-square mx-2"></i>Editar</button>
                </div>
                </div>
                <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8">
                    <label for="exampleInputPassword1" class="form-label" >Apellidos</label>
                    <input name="apellidos_edit" type="text" class="editar_apellidos input-group-text" id="disabledTextInput" value=" <?php echo $_SESSION['primer_apellido_log'].' '.$_SESSION['segundo_apellido_log']?>" readonly>
                </div>
                <div class="col-3 row align-items-center p-1">
                    <button class='editar_usuario btn btn-info' id="editar_apellidos"><i class="fa-solid fa-pen-to-square mx-2"></i>Editar</button>
                </div>
            </div>
        </div>


        

        <div class="row text-dark m-0 justify-content-center">
            <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 ">
                    <label for="exampleInputEmail1" class="form-label">Dirección</label>
                    <input name="direccion_edit" type="text" class="editar_direccion input-group-text" id="disabledTextInput" aria-describedby="emailHelp" value="<?php echo $_SESSION['direccion_log']?>"  readonly>
                </div>
                <div class="col-3 row align-items-center p-1">
                    <button class='editar_usuario btn btn-info' id="editar_direccion" ><i class="fa-solid fa-pen-to-square mx-2"></i>Editar</button>
                </div>
                </div>
                <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 ">
                    <label for="exampleInputPassword1" class="form-label" >Provincia</label>
                    <input name="provincia_edit" type="text" class="editar_provincia input-group-text" id="disabledTextInput" value="<?php echo $_SESSION['provincia_log']?>"  readonly>
                </div>
                <div class="col-3 row align-items-center p-1">
                    <button class='editar_usuario btn btn-info' id="editar_provincia" ><i class="fa-solid fa-pen-to-square mx-2"></i>Editar</button>
                </div>
            </div>
        </div>

        <div class="row text-dark m-0 justify-content-center">
            <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 m-0">
                    <label for="exampleInputEmail1" class="form-label">Población</label>
                    <input name="poblacion_edit" type="text" class="editar_poblacion input-group-text" id="disabledTextInput" aria-describedby="emailHelp" value="<?php echo $_SESSION['poblacion_log']?>"  readonly>
                </div>
                <div class="col-3 row align-items-center p-1">
                    <button class='editar_usuario btn btn-info' id="editar_poblacion" ><i class="fa-solid fa-pen-to-square mx-2"></i>Editar</button>
                </div>
                </div>
                <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 mr-0">
                    <label for="exampleInputPassword1" class="form-label" >Telefono</label>
                    <input name="telefono_edit" type="text" class="editar_telefono input-group-text" id="disabledTextInput" value="<?php echo $_SESSION['telefono_log']?>"  readonly>
                </div>
                <div class="col-3 row align-items-center p-1 ms-0">
                    <button type="button" class='editar_usuario btn btn-info' id="editar_telefono"><i class="fa-solid fa-pen-to-square mx-2"></i>Editar</button>
                </div>
            </div>
        </div>


        <div class="row text-dark ms-4 justify-content-start">
            <div class="row col-6 justify-content-center">
                <div class="mb-3 col-8 m-0">
                    <label for="exampleInputEmail1" class="form-label">Codigo Postal</label>
                    <input name="cod_postal_edit" type="text" class="editar_poblacion input-group-text" id="disabledTextInput" aria-describedby="emailHelp" value="<?php echo $_SESSION['cod_postal_log']?>"  readonly>
                </div>
                <div class="col-3 row align-items-center p-1">
                    <button class='editar_usuario btn btn-info' id="editar_poblacion" ><i class="fa-solid fa-pen-to-square mx-2"></i>Editar</button>
                </div>
                </div>
            </div>
        </div>

        <div class="row container-fluid justify-content-evenly my-4">
            <button type="submit" class="btn btn-dark col-12 col-md-4 m-2"><i class="fa-solid fa-check mx-2"></i>Validar Cambios</button>
            <button id="edit_passwd" type="submit" class="btn btn-danger col-12 col-md-4 m-2"><i class="fa-solid fa-key mx-2"></i>Modificar contraseña</button>
        </div>
    </div>
</form>


    <div id="form-mod-passwd" class="rounded border-dark-2 bg-success container row col-5">
            <h5 class="display-5 text-center justify-content-center">Modificar Contraseña</h5>
            <form class="formulario-edit-passwd row g-3 justify-content-center col-12" method="POST" action="index.php?view=_mod_datos_usuario">
                <div class="mb-3 col-11 m-0 justify-content-center">
                <label for="email">Email</label>
                <input name="email_edit" class="email_edit input-group-text text-dark" type="email" value= <?php echo $_SESSION['email_log'] ?>  readonly required>
                <label for="passwd">Contraseña</label>
                <input name="passwd_edit" class="passwd input-group-text text-dark" type="password" placeholder="Contraseña" autofocus required>
                <label for="re-passwd_edit">Reescribe la contraseña</label>
                <input name="re-passwd_edit" class="passwd input-group-text text-dark" type="password" placeholder="Contraseña" required>
                <button name="submit_edit_passwd" id="edit_passwd" type="submit" class="btn btn-danger col-11 m-2"><i class="fa-solid fa-key mx-2"></i>Aplicar</button>
                </div>
            </form>
        </div>
