<aside>
    <div class="aside--welcome">
        <h3>BIENVENIDO!!</h3>
        <h3>
<?php 
echo(isset($_SESSION['nombre_log']) ? $_SESSION['nombre_log'] : '' )
?>
</h3>
    </div>
    <div class="aside-options">
    <ul>
        <li><a href="mis_pedidos.php"><i class="fa-solid fa-gifts" style="color: #114B5F;"></i>Mis pedidos</a></li>
        <li><a href="perfil_usuario.php"><i class="fa-solid fa-address-card" style="color: #114B5F;"></i>Mi perfil</a></li>
        <li><a href="#"><i class="fa-solid fa-heart" style="color: #114B5F;"></i>Lista de deseos</a></li>
    </ul>
<?php 

    if(isset($_SESSION['logueado']) && isset($_SESSION['perfil_log']) && $_SESSION['perfil_log'] === 'admin')  { 

    include('menu_aside_master.html');
}?>

</div>
    


    <div class="aside-exit">
        <a href="exit.php" class="badge p-3 btn-exit"><i class="fa-solid fa-door-open" style="color: #114b5f;"></i>Salir</a>
    </div>
</aside>