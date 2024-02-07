document.addEventListener('DOMContentLoaded', function() {

let botones = document.getElementsByClassName('editar_usuario');
let inputs = document.getElementsByClassName('input-group-text');

for(let boton of botones){
    boton.addEventListener('click' , (event) => {
        event.preventDefault();
        let valor_enlace = boton.id;
        for( let input of inputs){
            if(input.classList.contains(valor_enlace)){
                input.readOnly = false;
                input.classList.add('bg-light');
            }
        }

    });
}

let select_perfil = document.getElementById('select_perfil');
let boton_edit_perfil = document.getElementById('btn-edit-perfil');
console.log("Script cargado");
boton_edit_perfil.addEventListener('click', () =>{
    console.log("click en btn edit perfil");
    select_perfil.disabled = false;
});


console.log(inputs);

for (let input of inputs) {
    input.addEventListener('input', function () {
        let valorActual = this.value;
        console.log('Se está escribiendo en el campo de entrada. Nuevo valor:', valorActual);
        input.value = valorActual; // Modificar la propiedad 'value' directamente
    });
}



let formularioEditarPasswd = document.getElementById('form-mod-passwd');
let boton_editar_passwd = document.getElementById('edit_passwd');
let capaBlur = document.getElementsByClassName('capaBlur');

boton_editar_passwd.addEventListener('click', (e) => {
    e.preventDefault();
    formularioEditarPasswd.style.display = 'flex';
    capaBlur[0].style.display = 'flex';
    formularioEditarPasswd.style.zIndex = '3';
});



capaBlur[0].addEventListener('click', (e) => {
    let clickDentroCapaBlur = capaBlur[0].contains(e.target);

    if(clickDentroCapaBlur){
        formularioEditarPasswd.style.zIndex = '4';
        capaBlur[0].style.display = "none";
        formularioEditarPasswd.style.display = 'none';
    }

});


});