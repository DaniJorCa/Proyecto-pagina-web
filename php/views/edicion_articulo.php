<div class="showGood">
    <div class="card-title-good">
      <h2>
<?php
echo isset($articulo_editar["nombre"]) ? $articulo_editar["nombre"] : 'Nombre no definido';
?></h2>  
    </div>
    <div class="card-img-descriptionpay">
        <div class="img-good-background">
            <img class="img--good-edit" style="height: 250px; width: 250px;" src='<?php echo $articulo_editar['img']; ?>'> 
        </div>
        <div class="description--pay">
            <div class="good-description">
                <h3>Descripcion Artículo</h3>
                <p class="description"><?php echo $articulo_editar['descripcion']?></p>
            </div>
        </div>
    </div>
</div>