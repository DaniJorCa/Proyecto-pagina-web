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



function marcar_selected_esBaja(data) {
    let datos = JSON.parse(data);
    let input_esBaja = document.getElementById('input-esBaja_articulo');
    let input_codigo = document.getElementById('cod_art-edit');
    const codigo = input_codigo.value;
    let estado_baja_articulo;

    for (let i in datos){
        if(datos[i].id_articulo === codigo){
            estado_baja_articulo = datos[i].esBaja;
        }
    }

    for (var i = 0; i < input_esBaja.options.length; i++) {
        var opcion = input_esBaja.options[i];
        console.log(opcion.value);
        console.log(estado_baja_articulo);
        if(opcion.value === estado_baja_articulo){
            input_esBaja.options[i].selected = true;
        }
    }

}

let boton_mtto_art = document.getElementById('btn-mtto-art');



getDataFromAPI('api/articulos.json', marcar_selected_esBaja);



});

