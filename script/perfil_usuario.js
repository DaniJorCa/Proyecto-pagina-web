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
    boton_edit_perfil.addEventListener('click', () =>{
        console.log("click en btn edit perfil");
        select_perfil.disabled = false;
    });

    for (let input of inputs) {
        input.addEventListener('input', function () {
            let valorActual = this.value;
            console.log('Se está escribiendo en el campo de entrada. Nuevo valor:', valorActual);
            input.value = valorActual;
        });
    }
 
});
