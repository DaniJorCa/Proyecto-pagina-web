document.addEventListener('DOMContentLoaded', function () {

let btnEndOrder = document.getElementById('end_order');
let divPayOrder = document.getElementById('div-pay_order');

btnEndOrder.addEventListener('click', function (event){
    event.preventDefault();
    console.log('pulsado el boton');
    divPayOrder.style.display = 'block';
});


});

