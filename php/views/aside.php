<aside>
    <div class="aside--welcome">
        <h3>BIENVENIDO!!</h3>
        <h3>
<?php 
echo(isset($_SESSION['nombre_log']) ? $_SESSION['nombre_log'] : '' )
?>
</h3>
    </div>
    <ul>
        <li><a href="#"><i class="fa-solid fa-gifts" style="color: #114B5F;"></i>Mis pedidos</a></li>
        <li><a href="#"><i class="fa-solid fa-address-card" style="color: #114B5F;"></i>Mi perfil</a></li>
        <li><a href="#"><i class="fa-solid fa-heart" style="color: #114B5F;"></i>Lista de deseos</a></li>
    </ul>
    <div class="aside--master">
        <ul>
            <li><a href="index.php?view=_mant-arts"><i class="fa-solid fa-parachute-box" style="color: #114B5F;"></i>Mantenimiento de articulos</a></li>
            <li><a href="#"><i class="fa-solid fa-unlock" style="color: #114B5F;"></i>Mantenimiento de permisos</a></li>
            <li><a href="#"><i class="fa-solid fa-cash-register" style="color: #114B5F;"></i>Mantenimiento de cobros</a></li>
            <li><a href="#"><i class="fa-solid fa-hand-holding-dollar" style="color: #114B5F;"></i>Mantenimiento de devoluciones</a></li>
        </ul>
    </div>
</aside>