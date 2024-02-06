
document.addEventListener('DOMContentLoaded', function() {

let menusDesplegables = document.getElementsByClassName('item-show');

Array.from(menusDesplegables).forEach(function(menuDesplegable) {
    menuDesplegable.addEventListener('mouseenter', setClass);
    menuDesplegable.addEventListener('mouseleave', unsetClass);
});

function setClass() {
    let hijoflecha = this.querySelector('a i.fa-angle-down');
    let menuDropdown = this.querySelector('.menu-dropdown');

    if (hijoflecha) {
        hijoflecha.classList.add('despliega');
    }
    if (menuDropdown) {
        menuDropdown.style.display = "block";
        menuDropdown.classList.add('recubre');
        menuDropdown.classList.remove('menu-dropdown');
    }


}

function unsetClass() {
    let hijoflecha = this.querySelector('a i.fa-angle-down');
    let menuRecubre = this.querySelector('.recubre');

    if (hijoflecha) {
        hijoflecha.classList.remove('despliega');
    }
    if(menuRecubre){
        setTimeout(function(){
            menuRecubre.style.display = "none";
            menuRecubre.classList.add('menu-dropdown');
        }, 10);
        
        menuRecubre.classList.remove('recubre');
    }
}



let btnsRegistrarUsuario = document.getElementsByClassName("login");
let ventanaRegistro = document.getElementById('form-registro');
let capaBlur = document.getElementsByClassName('capaBlur');
let formularioRegistro = document.querySelector('#form-registro');
console.log(formularioRegistro);


for (const btnRegistrarUsuario of btnsRegistrarUsuario){
    btnRegistrarUsuario.addEventListener('click', (e) => {
        e.preventDefault();
        ventanaRegistro.style.display = 'flex';
        capaBlur[0].style.display = 'flex';
        formularioRegistro.style.zIndex = '4';
    });

}

capaBlur[0].addEventListener('click', (e) => {
    let clickDentroCapaBlur = capaBlur[0].contains(e.target);

    if(clickDentroCapaBlur){
        formularioRegistro.style.zIndex = '3';
        capaBlur[0].style.display = "none";
        ventanaRegistro.style.display = 'none';
    }

});

function getDataFromAPI(url, callback) {

    const xhr = new XMLHttpRequest();
    xhr.open('GET', url);
    xhr.onload = function () {
        if (xhr.status === 200) {
            callback(this.response);
        } else {
            console.log("Se ha producido un error " + xhr.status + ": " + xhr.statusText);
        }
    };
    xhr.onerror = function () {
        console.log("Se ha producido un error " + xhr.status + ": " + xhr.statusText);
    };
    xhr.send();

}

function obtenerDatosArticuloAEditar(data, idArticulo){
    let datos = JSON.parse(data);

    for (let i in datos){
        if(datos[i].id_articulo === idArticulo){
            return datos[i];
        }
    }

}




//Capa blur edicion articulo

let btnsEditarArticulo = document.getElementsByClassName("btn-edit-articulo");
let ventanaEdicionArticulo = document.getElementById('div-form-edit-articulo');
let idArticuloEdit = document.getElementById('id-edit');
let imgArticuloEdit = document.getElementById('img-edit-articulo');
let formulario_edicion_articulo = document.getElementById('formulario_edicion_articulo');

console.log(btnsEditarArticulo);


for (const btnEditarArticulo of btnsEditarArticulo){
    btnEditarArticulo.addEventListener('click', (e) => {
        e.preventDefault();
        console.log("pulsado boton editar");
        formularioRegistro.style.display = 'flex';
        capaBlur[0].style.display = 'flex';
        formularioRegistro.style.zIndex = '4';
        idArticuloEdit.value = e.currentTarget.value;
        console.log(idArticuloEdit.value);
        let urlAPI = 'api/articulos.json' 
        getDataFromAPI(urlAPI, function(response) {
            let arrayArticulo = obtenerDatosArticuloAEditar(response, idArticuloEdit.value);
            if (arrayArticulo) {
                imgArticuloEdit.src = arrayArticulo.img;
                console.log(arrayArticulo);
            } else {
                console.log("No se encontró el artículo con ID: " + idArticuloEdit.value);
            }
        });
    });
}

capaBlur[0].addEventListener('click', (e) => {
    let clickDentroCapaBlur = capaBlur[0].contains(e.target);

    if(clickDentroCapaBlur){
        formularioRegistro.style.zIndex = '3';
        capaBlur[0].style.display = "none";
        formularioRegistro.style.display = 'none';
    }

});

  
/* Funciones Y Calculo de distancias de SlideShow*/  

const articulos = document.getElementsByClassName('articulo');
let divArticulos = document.getElementsByClassName('articulos');
let anchoTotalArticulo = calcularAnchoTotalArticulo('articulos' , '.articulo');
let anchoTotalDivArticulos = calcularDimensionDivArticulos(articulos, anchoTotalArticulo);
let anchoVisibleDivArticulos = divArticulos[0].clientWidth;
let desplazamientoTotalLateralMaximo = desplazamientoLateralMaximo(articulos, anchoTotalArticulo, anchoVisibleDivArticulos);



  function calcularDimensionDivArticulos(articulos, anchoTotalArticulo){
    anchoTotal = ((articulos.length * anchoTotalArticulo) + ((articulos.length - 2) * 20));
    return anchoTotal;
  }

  function calcularAnchoTotalArticulo(claseDivParent, claseDivChild){
    let estilosArticulo = extraerEstilosDivChild(`${claseDivParent}`, `${claseDivChild}`);
    let anchoArticulo = parseFloat(estilosArticulo.width) + parseFloat(estilosArticulo.marginLeft) + parseFloat(estilosArticulo.marginRight);
    return anchoArticulo;
  }

  function extraerEstilosDivChild (claseDivParent, claseDivChild){
    let div = document.getElementsByClassName(`${claseDivParent}`);
    let estilos = getComputedStyle(div[0].querySelector(`${claseDivChild}`));
    return estilos;
  }

  function desplazamientoLateralMaximo(articulos, anchoTotalArticulo, anchoVisibleDivArticulos){
    desplazamientoMaximo = (((articulos.length * anchoTotalArticulo) + ((articulos.length -2) * 20)) - anchoVisibleDivArticulos)/2;
    return desplazamientoMaximo;
}

    desplazamientoLateralMaximo(articulos, anchoTotalArticulo, anchoVisibleDivArticulos);
    console.log('Parte visible Div articulos ' + anchoVisibleDivArticulos);
    console.log('Ancho total Div Articulos ' + anchoTotalDivArticulos);
    console.log('Ancho total articulo ' + anchoTotalArticulo);
    console.log ('Desplazamiento Total lateral Maximo ' + desplazamientoTotalLateralMaximo);


  function actualizarDimensiones(){
    let anchoTotalArticulo = calcularAnchoTotalArticulo('articulos' , '.articulo');
    let anchoTotalDivArticulos = calcularDimensionDivArticulos(articulos, anchoTotalArticulo);
    let anchoVisibleDivArticulos = divArticulos[0].clientWidth;
    let desplazamientoTotalLateralMaximo = desplazamientoLateralMaximo(articulos, anchoTotalArticulo, anchoVisibleDivArticulos);
    console.log('Parte visible Div articulos ' + anchoVisibleDivArticulos);
    console.log('Ancho total Div Articulos ' + anchoTotalDivArticulos);
    console.log('Ancho total articulo ' + anchoTotalArticulo);
    console.log ('Desplazamiento Total lateral Maximo ' + desplazamientoTotalLateralMaximo);
  }
  
  window.addEventListener('resize', function() {
    actualizarDimensiones();
  });


/* Parte Funcional SlideShow */

let estilos = extraeEstilos('articulos', '.articulo');

function calculoTiempoDesplazamiento(espacioPorRecorrer){
    let time = (espacioPorRecorrer * 4) / 900;
    if(time > 2){
        time == 2;
    }
    return time;
}

function extraeEstilos(claseDivParent, claseDivChild){
    let estilosArticulo = extraerEstilosDivChild(`${claseDivParent}`, `${claseDivChild}`);
    return estilosArticulo;
}

function extraeTranslateX(estilos){
    let estiloTransform = estilos.getPropertyValue('transform');
    let valoresTransform = new DOMMatrix(estiloTransform);
    let translateX = valoresTransform.m41;
    return translateX;
}


function espacioPorRecorrer(articulos , articulo, desplazamientoTotalLateralMaximo){
    let estilos = extraeEstilos(`${articulos}`, `${articulo}`);
    let estiloTransform = estilos.getPropertyValue('transform');
    let valoresTransform = new DOMMatrix(estiloTransform);
    let translateX = valoresTransform.m41; // Valor de translateX
    let espacioARecorrer = desplazamientoTotalLateralMaximo - translateX;
    return espacioARecorrer; 
}

  let cardsArticulos = document.getElementsByClassName('articulo');
  let botonDesplazamientoIzq = document.getElementById('button-slideshow-left');
  let botonDesplazamientoDer = document.getElementById('button-slideshow-right');



  function desplazarIzquierda() {
    let espacioARecorrer = espacioPorRecorrer('articulos','.articulo', desplazamientoTotalLateralMaximo);
    if(espacioARecorrer){
        let tiempoNecesarioParaRecorrer = calculoTiempoDesplazamiento(espacioARecorrer);
        for (articulo of cardsArticulos) {
            console.log(tiempoNecesarioParaRecorrer + ' tiempo izquierda');
            articulo.style.transitionProperty = 'transform';
            articulo.style.transitionDuration = `${tiempoNecesarioParaRecorrer}s`;
            articulo.style.transitionTimingFunction = 'linear';
            articulo.style.transform = `translateX(-${desplazamientoTotalLateralMaximo}px)`;
        } 
    }else{
        for (articulo of cardsArticulos) {
            articulo.style.transitionProperty = 'transform';
            articulo.style.transitionDuration = `3s`;
            articulo.style.transitionTimingFunction = 'linear';
            articulo.style.transform = `translateX(-${desplazamientoTotalLateralMaximo}px)`;
        }  
    }
    
      posicionExacta = setInterval(function () {
        posX = extraeTranslateX(estilos);
        }, 1);
  }
  
  function desplazarDerecha() {
    let espacioARecorrer = espacioPorRecorrer('articulos','.articulo', desplazamientoTotalLateralMaximo);
    if(espacioARecorrer){
        let tiempoNecesarioParaRecorrer = calculoTiempoDesplazamiento(espacioARecorrer);
        for (articulo of cardsArticulos) {
            console.log(tiempoNecesarioParaRecorrer + ' tiempo derecha');
            articulo.style.transitionProperty = 'transform';
            articulo.style.transitionDuration = `${tiempoNecesarioParaRecorrer}s`;
            articulo.style.transitionTimingFunction = 'linear';
            articulo.style.transform = `translateX(${desplazamientoTotalLateralMaximo}px)`;
        } 
    }else{
        for (articulo of cardsArticulos) {
            articulo.style.transitionProperty = 'transform';
            articulo.style.transitionDuration = `3s`;
            articulo.style.transitionTimingFunction = 'linear';
            articulo.style.transform = `translateX(${desplazamientoTotalLateralMaximo}px)`;
        }  
    }
      
      posicionExacta = setInterval(function () {
        posX = extraeTranslateX(estilos);
      }, 1);
  }


  function pausarAnimacionDer() {
      clearInterval(posicionExacta);
      for (articulo of cardsArticulos) {
          articulo.style.transition = 'none';
          articulo.style.transform = `translateX(${posX}px)`;
      }
  }

  function pausarAnimacionIzq() {
    clearInterval(posicionExacta);
    for (articulo of cardsArticulos) {
        articulo.style.transition = 'none';
        articulo.style.transform = `translateX(${posX}px)`;
    }
}
  botonDesplazamientoIzq.addEventListener('mouseenter', desplazarIzquierda);
  botonDesplazamientoIzq.addEventListener('mouseleave', pausarAnimacionIzq);
  
  botonDesplazamientoDer.addEventListener('mouseenter', desplazarDerecha);
  botonDesplazamientoDer.addEventListener('mouseleave', pausarAnimacionDer);


}); 

