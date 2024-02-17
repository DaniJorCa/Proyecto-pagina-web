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