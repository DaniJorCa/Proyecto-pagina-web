<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="UTF-8">
        <link href="styles/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="styles/header&footer.css">
        <link rel="stylesheet" href="styles/bodyMain.css">
        <link rel="stylesheet" href="styles/aside.css">
        <link rel="stylesheet" href="styles/body_index.css">
        <link rel="stylesheet" href="styles/slideshowArea.css">
        <link rel="stylesheet" href="styles/showGoods.css">
        <link rel="stylesheet" href="styles/genericBody.css">
        <link rel="stylesheet" href="styles/mis_pedidos.css">
        <script type="text/javascript" src="script/jsMain.js"></script>
        <script type="text/javascript" src="script/perfil_usuario.js"></script>
        <script type="text/javascript" src="script/registro_articulos.js"></script>
        <script type="text/javascript" src="script/edicion_articulos.js"></script>
        <script type="text/javascript" src="script/index.js"></script>
    </head>
<div class="capaBlur" id="capaBlur"></div>    
<?php

ob_start();
if (session_status() !== PHP_SESSION_ACTIVE) {
    session_start();
}
include_once('php/security/security.php');
include_once('php/views/header.php'); 
include_once('php/views/aside.php');
require "php/controllers/articulos_controller.php";
require "php/controllers/usuarios_controller.php";
require "php/controllers/categorias_controller.php";
require "php/controllers/generic_controller.php";
require "php/controllers/pedidos_controller.php";
require "php/controllers/lista_deseos_controller.php";

//mandar esto a algun aside
echo "<body>";
echo "<main class='row'>";

if(isset($_GET['info']) || isset($_GET['info-mod'])){
    show_messages($_GET);
}


$mostrar = isset($_GET['view']) ? $_GET['view'] : '_mas-vendidos';

            switch ($mostrar){

                case '_mas-vendidos':
                    consultar_art_mas_vendidos();
                    break;
                case '_mantenimiento-art':
                    consultar_mantenimiento_articulos();
                    break;
                case '_edicion-art':
                    edicion_informacion_articulo($_POST['id']);
                    break;
                case '_edit_good':
                    check_and_edit_good($_POST);
                    break;
                case '_delete-art':
                    eliminar_articulo($_POST['id']);
                    break; 
                case '_alta-articulo':
                    formulario_alta();
                    consultar_art_mas_vendidos();
                    break;
                case '_mant-arts':
                    mostrar_articulos();
                    break;     
                case '_alta-categoria':
                    formulario_alta_categorias();
                    break;
                case '_mod_datos_usuario':
                    modificar_usuario_controller();           
                    break;
                case '_mod_datos_user_master':
                    mostrar_datos_edit_master();           
                    break;    
                case '_mostrar_art_por_categoria':
                    busqueda_selectiva_por_categoria();
                    break;
                case '_mostrar_art_por_subcategoria':
                    busqueda_selectiva_por_subcategoria();
                    break;
                case '_mant-perm':
                    despliegue_usuarios();
                    break;
                case '_add_cart':
                    insertar_articulos_carrito();
                    break;
                case '_good-card':
                    show_good_card();
                    break;
                case '_add-wishlist':
                    add_goods_wishlist();
                    break;
                case '_show-wishlist':
                    mostrar_lista_deseos();
                    break;
                case '_del-line-wishlist':
                    delete_line_wishtlist();
                    break;
                case '_edit_cat':
                    despliegue_categorias();
                    break;
                case '_del_subcat':
                    eliminar_subcategoria();
                    break;
                case '_del_cat':
                    eliminar_categoria();
                    break;           
                default:
                    consultar_art_mas_vendidos();
                    break;

            }

echo "</main>";
?>

    

<?php 
include ('php/views/footer.html');

?>
<script src="styles/js/bootstrap.bundle.min.js"></script>
<script>
    //capa blur delete subcat
let btnsEliminarSubcategoria = document.getElementsByClassName("del-subcat-btn");
let divDelSubcat = document.getElementById('del-subcat');
let btnsEliminarCategoria = document.getElementsByClassName("del-cat-btn");
let capaBlur = document.getElementsByClassName('capaBlur');
let btnConfirmDelSubcat = document.getElementById('confirm-del-subcat');


for (const btnEliminarSubcategoria of btnsEliminarSubcategoria){
    btnEliminarSubcategoria.addEventListener('click', (e) => {
        console.log('pulsado boton');
        e.preventDefault();
        divDelSubcat.style.display = 'flex';
        capaBlur[0].style.display = 'flex';
        divDelSubcat.style.zIndex = '4';
        let codSubcat = e.target.getAttribute('cod_subcat');
        let url = 'index.php?view=_del_subcat&cod_subcat=' + codSubcat;
        btnConfirmDelSubcat.href = url;
    });

}

for (const btnEliminarCategoria of btnsEliminarCategoria){
    btnEliminarCategoria.addEventListener('click', (e) => {
        console.log('pulsado boton');
        e.preventDefault();
        divDelSubcat.style.display = 'flex';
        capaBlur[0].style.display = 'flex';
        divDelSubcat.style.zIndex = '4';
        let codCat = e.target.getAttribute('cod_cat');
        let url = 'index.php?view=_del_cat&cod_cat=' + codCat;
        btnConfirmDelSubcat.href = url;
    });

}



capaBlur[0].addEventListener('click', (e) => {
    let clickDentroCapaBlur = capaBlur[0].contains(e.target);

    if(clickDentroCapaBlur){
        divDelSubcat.style.zIndex = '3';
        capaBlur[0].style.display = "none";
        divDelSubcat.style.display = 'none';
    }

});


</script>
    </body>
</html>