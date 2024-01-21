document.addEventListener('DOMContentLoaded', function() {

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

hamburguer.addEventListener('click', (e) => {

    displayAside = extraeEstiloElemento(aside[0], 'display');
    translateXAside = extraeTranslateX(aside[0]);
    aside[0].style.transition = 'transform 3s ease, opacity 1s ease';
    console.log(typeof translateXAside);
    
    if(translateXAside === 0 && displayAside != 'none'){
        aside[0].style.transform = 'translateX(-100%)';
        setTimeout(function(){
            aside[0].style.display = 'none';
            main[0].style.width = '100%';
        }, 2000);
    }else{
        
        aside[0].style.display = 'flex'; 
        main[0].style.width = '70%';
        setTimeout(function(){
           aside[0].style.transform = 'translateX(0)'; 
        }, 10);
        
    }
});



});