document.addEventListener('DOMContentLoaded', function() {

    let formularioEditarPasswd = document.getElementById('form-mod-passwd');
    let capaBlur = document.getElementsByClassName('capaBlur');
    let boton_edit_password = document.getElementsByClassName('modify_passwd');

    boton_edit_password[0].addEventListener('click', (e) => {
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