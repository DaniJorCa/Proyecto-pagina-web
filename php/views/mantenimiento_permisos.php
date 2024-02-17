<div class='row container-fluid justify-content-end align-middle mb-4'>
<div class= 'col-12 align-middle d-flex justify-content-end'>
    <select class="custom-select custom-select-sm col-2">
        <option value='dni' selected>DNI</option>
        <option value='nombre'>Nombre</option>
        <option value='primer_apellido'>Primer Apellido</option>
        <option value='telefono'>Teléfono</option>
        <option value='email'>Email</option>
    </select>
    <input class='col-2 mx-2 bg-white border border-success align-middle' id='search' placeholder='¿Buscas algo en concreto?'>
    <a id='btn_search' class='btn btn-primary col-2 align-middle mx-1'>Búsqueda Selectiva</a>
    <a id='btn_search' class='btn btn-primary col-2 align-middle mx-1s' href='index.php?view=_mant-arts'>Mostrar Todos</a>
</div>
</div>

<?php
if(empty($usuarios)){
    echo '<p>No hay Usuarios que mostrar</p>';
}else{   
?>  

<div>
<table class="table-hover table-striped">
<tr>
<th>DNI</th>
<th>Nombre</th>
<th>Primer Apellido</th>
<th>Segundo Apellido</th>
<th>Direccion</th>
<th>Provincia</th>
<th>Poblacion</th>
<th>Codigo Postal</th>
<th>Teléfono</th>
<th>Email</th>
<?php

if(isset($_SESSION['perfil_log']) && $_SESSION['perfil_log'] === 'admin'){
    echo "<th>Perfil</th>";
    echo "<th>Baja</th>";
}
?>
<th>Editar<th>
</tr>


<?php

    foreach ($usuarios as $fila) {
    if($fila['dni'] !== $_SESSION['dni_log']){
        echo "<tr>";
        echo "<td>{$fila["dni"]}</td>"; 
        echo "<td>{$fila["nombre"]}</td>";
        echo "<td class='td-wrap'>{$fila["primer_apellido"]}</td>";
        echo "<td>{$fila["segundo_apellido"]}</td>";
        echo "<td>{$fila["direccion"]}</td>";
        echo "<td>{$fila["provincia"]}</td>";
        echo "<td>{$fila["poblacion"]}</td>";
        echo "<td>{$fila["cod_postal"]}</td>";
        echo "<td>{$fila["telefono"]}</td>"; 
        echo "<td>{$fila["email"]}</td>";
        if(isset($_SESSION['perfil_log']) && $_SESSION['perfil_log'] === 'admin'){
            echo "<td>{$fila["perfil"]}</td>";
            echo "<td>{$fila["esBaja"]}</td>";
        }
        echo "<td><a href='edicion_usuarios_master.php?user={$fila['dni']}'><button class='btn btn-warning btn-edit-datos-user'><i class='fa-solid fa-pen-to-square'></i></button></a></td>";
        echo "</tr>";
        }
    }
}
?>
</div>
</table>