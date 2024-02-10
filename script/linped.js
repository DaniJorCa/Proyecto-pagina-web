document.addEventListener('DOMContentLoaded', function() {
     
    let formEliminarLineasPedido = document.getElementById('form-eliminar');
    let botones_del_linped = document.getElementsByClassName('btn_del_linped');
    let capaBlur = document.getElementsByClassName('capaBlur');
    let img_del_linped = document.getElementById('img_del_linped');
    let btn_del_linped = document.getElementById('btn_del_linped');
    
    async function fetchJson() {
        let response = await fetch('api/articulos.json');
        let data = await response.json();
        return data;
    }

    fetchJson().then(data => {
    console.log(data);
    // Puedes trabajar con 'data' aquí
}).catch(error => {
    console.error('Error:', error);
});
    
    for(botonDelLinped of botones_del_linped)
        botonDelLinped.addEventListener('click', (e) => {
            console.log("pulsado el boton de eliminar linped");
            e.preventDefault();
            formEliminarLineasPedido.style.display = 'flex';
            capaBlur[0].style.display = 'flex';
            formEliminarLineasPedido.style.zIndex = '3';
            fetchJson().then(data => {
                for(datos of data){
                    if(datos.id_articulo === e.target.value){
                        img_del_linped.src = datos.img;
                        btn_del_linped.href = 'mis_pedidos.php?view=_del_linped&delLinped=' + e.target.value;
                    }
                }
                
            }).catch(error => {
                console.error('Error:', error);
            });

    });
    
    
    
    capaBlur[0].addEventListener('click', (e) => {
        let clickDentroCapaBlur = capaBlur[0].contains(e.target);
    
        if(clickDentroCapaBlur){
            formEliminarLineasPedido.style.zIndex = '4';
            capaBlur[0].style.display = "none";
            formEliminarLineasPedido.style.display = 'none';
        }
    
    });
    
    
    });