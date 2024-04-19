document.addEventListener('DOMContentLoaded', function() {

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



function asignar_values_categorias(data) {
    let datos = JSON.parse(data);
    let cod_categoria_padre;
    

    while (desplegable_subcategoria.options.length > 0) {
        desplegable_subcategoria.remove(0);
    }
    
    if(contador === 0){
        contador++;
        opcionEnBlanco = document.createElement('option');
        opcionEnBlanco.value = '';
        opcionEnBlanco.innerText = 'Seleccionar subcategoría';
        desplegable_subcategoria.appendChild(opcionEnBlanco);
    }
        
    
    if(desplegable_categorias.value > 0){
        console.log(desplegable_categorias.value);
      for (let i in datos){
            if(datos[i].codigo.toString() === desplegable_categorias.value){
                cod_categoria_padre = datos[i].codigo;
                nombre_cat_padre = datos[i].nombre;
                console.log(cod_categoria_padre + ' codigo cat padre');  
            }
        }  
    }
    
    for (let j in datos){
        console.log(cod_categoria_padre + ' codigo cat padre');
        if(datos[j].cod_cat_padre !== null && datos[j].cod_cat_padre === cod_categoria_padre){
            // Crear un nuevo elemento option
            var nueva_option = document.createElement('option');

            // Asignar un valor y texto a la nueva opción
            nueva_option.value = datos[j].codigo;
            nueva_option.innerText = datos[j].nombre;

            // Agregar la nueva opción al final del select
            desplegable_subcategoria.appendChild(nueva_option);
        }
    }
}

const desplegable_categorias = document.getElementById('input-categoria_articulo');
const desplegable_subcategoria = document.getElementById('input-subcategoria_articulo');
let contador = 0;
let nombre_cat_padre;

getDataFromAPI('api/categorias.json', asignar_values_categorias);

desplegable_categorias.addEventListener('change',  () => {
        getDataFromAPI('api/categorias.json', asignar_values_categorias);
});




});