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

boton_alta_articulo.addEventListener('click', () => window.location.href = 'index.php?view=_alta-articulo');





});