<div class="showGood">
    <div class="card-title-good">
      <h2><?php echo $articulo[0]['nombre']?></h2>  
    </div>
    <div class="card-img-descriptionpay">
        <div class="img-good-background">
            <img class="img--good" src="<?php echo $articulo[0]['img'];?>"> 
        </div>
        <div class="description--pay">
            <div class="good-description">
                <h3>Descripcion Artículo</h3>
                <p class="description"><?php echo $articulo[0]['descripcion'];?></p>
            </div>
            <div class="good-pay">
                <button id="button-heart">
                <a href="index.php?view=_add_cart&id=<?php echo $articulo[0]['id_articulo']; ?>">
                    <div class="card-good-button-cart">
                        <i class="fa-solid fa-cart-shopping fa-cart"></i>
                        <p>Comprar</p>
                        <p class="h4"><?php echo $articulo[0]['precio'] . " €"?></p>
                    </div>
                </a>

                    </button>
                    <button id="button-heart">
                        <div class="card-good-button-heart">
                            <i class="fa-solid fa-heart-circle-plus fa-heart"></i>
                            <p>+ Lista de deseos</p>
                        </div>
                    </button>
            </div>
        </div>
    </div>
</div>