document.addEventListener('DOMContentLoaded', function() {

let input_subcategoria = document.getElementById('input-nombre_sub');
let input_cat_padre = document.getElementById('form-categoria_padre');
let input_nombre_categoria = document.getElementById('input-nombre_categoria'); 
let input_oculto = document.getElementById('input_oculto');


input_subcategoria.addEventListener('input', () => {
    if(input_subcategoria.value != ''){
        input_cat_padre.disabled = false;
    }else{
        input_cat_padre.disabled = true;
    }
    
});

input_subcategoria.addEventListener('input', valores_input_form_cat);
input_nombre_categoria.addEventListener('input', valores_input_form_cat);
input_oculto.style.display = 'none';

function valores_input_form_cat(){
    let value_categoria = input_nombre_categoria.value;
    let value_subcategoria = input_subcategoria.value;
    console.log('cambio en boton');
    console.log(value_subcategoria);

    if(value_categoria !== '' && value_subcategoria !== ''){
        input_oculto.style.display = 'block';
        input_cat_padre.style.display = 'none';
        input_oculto.readOnly = true;
        input_oculto.value = value_categoria;
        input_oculto.innerText = value_categoria;
    }else{
        input_oculto.style.display = 'none';
        input_cat_padre.style.display = 'block';
        input_cat_padre.options[0].innerText = '';
        input_cat_padre.options[0].value = '';
    }
}

});