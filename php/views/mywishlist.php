<?php
if(empty($deseos)){
    echo '<p>No tienes ningun deseo?</p>';
}else{   
?>  

<div>
<table class="table-hover table-striped">
<tr>
<th>DNI</th>
<th>Deseo</th>
</tr>


<?php

    foreach ($deseos as $fila) {
    echo "<tr>";
    echo "<td>{$fila["dni_cliente"]}</td>"; 
    echo "<td>{$fila["id_articulo"]}</td>";
    echo "</tr>";   
    }
}
?>
</div>
</table>