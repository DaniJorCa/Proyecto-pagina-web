document.addEventListener('DOMContentLoaded', function() {

/* Selectores */

let hamburguer = document.getElementById('hamburguer');
let aside = document.getElementsByTagName('aside');
let main = document.getElementsByTagName('main');

hamburguer.style.display = 'block';

function estadoDisplayElemento(elemento){
    let estilos = getComputedStyle(elemento);
    let display = estilos.getPropertyValue('display');
    return display;
}

function extraeEstiloElemento (elemento, estilo){
    let estilos = getComputedStyle(elemento);
    estilo = estilos.getPropertyValue(`${estilo}`);
    return estilo;
}

function extraeTranslateX(elemento){
    estilos = getComputedStyle(elemento);
    let estiloTransform = estilos.getPropertyValue('transform');
    let valoresTransform = new DOMMatrix(estiloTransform);
    let translateX = valoresTransform.m41;
    return translateX;
}

/* Movimiento de Aside */

hamburguer.addEventListener('click', (e) => {

    displayAside = extraeEstiloElemento(aside[0], 'display');
    translateXAside = extraeTranslateX(aside[0]);
    aside[0].style.transition = 'transform 1s ease, opacity 1s ease';
    console.log(typeof translateXAside);
    
    if(translateXAside === 0 && displayAside != 'none'){
        aside[0].style.transform = 'translateX(-100%)';
        setTimeout(function(){
            aside[0].style.display = 'none';
            main[0].style.width = '100%';
        }, 700);
    }else{
        
        aside[0].style.display = 'flex'; 
        main[0].style.width = '70%';
        setTimeout(function(){
           aside[0].style.transform = 'translateX(0)'; 
        }, 10);
        
    }
});

/* Logica para implementar la clase a Body-Aside */

if (aside.length = 1){
    let contenedor = document.getElementsByTagName('body');
    let divAsideMain = document.createElement('div');
    divAsideMain.className = 'aside--main';

    contenedor[0].insertBefore(divAsideMain,aside[0]);
    divAsideMain.appendChild(aside[0]);
    divAsideMain.appendChild(main[0]);
}


let boton_alta_articulo = document.getElementById('btn-alta_articulo');
let boton_alta_categorias = document.getElementById('btn-alta_categorias');

boton_alta_articulo.addEventListener('click', () => window.location.href = 'registro_articulo.php');
boton_alta_categorias.addEventListener('click', () => window.location.href = 'registro_categorias.php');

let botones_master_edit_user = document.getElementsByClassName('btn-edit-datos-user');

for(botones_master_edit_user of boton_master){
    boton_master.addEventListener('click', () => { 
        boton_master.preventDefault();

    });
}

//capa blur delete subcat
let btnsEliminarSubcategoria = document.getElementsByClassName("del-subcat-btn");
let divDelSubcat = document.getElementById('del-subcat');
let capaBlur = document.getElementsByClassName('capaBlur');


for (const btnEliminarSubcategoria of btnsEliminarSubcategoria){
    btnEliminarSubcategoria.addEventListener('click', (e) => {
        console.log('pulsado boton');
        e.preventDefault();
        divDelSubcat.style.display = 'flex';
        capaBlur[0].style.display = 'flex';
        divDelSubcat.style.zIndex = '4';
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

});